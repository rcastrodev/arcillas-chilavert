<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    public function content()
    {
        $categories = Category::orderBy('order', 'ASC')->get();
        return view('administrator.sub-category.content', compact('categories'));
    }

    public function store(SubCategoryRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image'))            
            $data['image'] = $request->file('image')->store('images/sub-categories','custom');
    
        SubCategory::create($data);

        return response()->json(['tableReload' => true],201);
    }

    public function update(SubCategoryRequest $request)
    {
        $element = SubCategory::find($request->input('id'));
        $data = $request->all();

        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/sub-categories','custom');
        }

        $element->update($data);
        
        return response()->json(['tableReload' => true],200);
    }

    public function findContent($id)
    {
        return response()->json(['content' => SubCategory::find($id)]);
    }

    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $subCategories = SubCategory::orderBy('order', 'ASC');
        return DataTables::of($subCategories)
        ->editColumn('image', function($subCategory){
            return '<img src="'.asset($subCategory->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('category', function($subCategory){
            return $subCategory->category->name;
        })
        ->addColumn('actions', function($subCategory) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$subCategory->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$subCategory->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
