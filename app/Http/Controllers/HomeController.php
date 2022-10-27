<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\HomeRequest;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'inicio')->first();
    }

    /**
     * @author Raul castro
     */

    public function index()
    {
        return view('home');
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        $page       = $this->page;
        $section2   = $page->sections()->where('name', 'section_2')->first()->contents()->first();
        return view('administrator.home.content', compact('section2'));
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function store(HomeRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/home', 'custom');

        if ($request->hasFile('content_1')) 
            $data['content_1'] = $request->file('content_1')->store('images/home', 'custom');
        
        $content = Content::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function update(HomeRequest $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/home','custom');
        }  
        
        if($request->hasFile('content_1')){
            if(Storage::disk('custom')->exists($element->content_1))
                Storage::disk('custom')->delete($element->content_1);
            
            $data['content_1'] = $request->file('content_1')->store('images/home','custom');
        }  

        $element->update($data);
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/home','custom');
        }        
        
        $element->update($data);

        return back();
    }

    public function destroy($id)
    {
        $element = Content::find($id);

        if ($element->image) {
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
        }

        if ($element->content_1) { 
            if(Storage::disk('custom')->exists($element->content_1))
                Storage::disk('custom')->delete($element->content_1);  
        }

        $element->delete();
        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $sectionSlider = $this->page
            ->sections()
            ->where('name', 'section_1')
            ->first();

        $sliders = $sectionSlider->contents()
            ->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_1', function($slider){
            return '<img src="'.asset($slider->content_1).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_1'])
        ->make(true);
    }
}



