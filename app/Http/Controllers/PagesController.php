<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setDescription($this->data->description);

        /** Secciones de página */
        $sections = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get(); // sliders
        $section2  = $sections->where('name', 'section_2')->first()->contents()->first();
        $categories = Category::orderBy('order', 'ASC')->get(); 
        $products = Product::where('outstanding', 1)->orderBy('order', 'ASC')->take(3)->get();
        return view('paginas.index', compact('section1s', 'categories', 'products', 'section2'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        SEO::setTitle('empresa');
        SEO::setDescription($this->data->description);
        /** Secciones de página */
        $sections   = $page->sections;
        $sliders    =  $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get(); //sliders
        $company    =  $sections->where('name', 'section_2')->first()->contents()->first(); // contenido empresa
        return view('paginas.empresa', compact('sliders', 'company'));
    }

    public function productos(Request $request)
    {
        if(! $request->get('b')){
            $categories = Category::orderBy('order', 'ASC')->get();
            $products = collect([]);
        }else{
            $products = Product::where('name', 'like', "%{$request->get('b')}%")->orderBy('order', 'ASC')->get(); 
            $categories = collect([]);
        }

        if (count($categories) or count($products)) {
            SEO::setTitle("productos");
            SEO::setDescription($this->data->description);   
        }
        
        return view('paginas.productos', compact('categories', 'products'));
    }

    public function productFilter($category_id)
    {
        $category = Category::findOrFail($category_id);
        return response()->json(['products' => Product::whereIn('sub_category_id', $category->subCategories()->pluck('id'))->get()], 200);
    }
    
    public function categoria($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::whereIn('sub_category_id', $category->subCategories()->pluck('id'))->get(); 
        $categories = Category::all();
        
        return view('paginas.productos-por-categoria', compact('category', 'categories', 'products'));
    }

    public function producto(Request $request, Product $product)
    {
        $categories = Category::all();
        if ($product) {
            SEO::setTitle($product->name);
            SEO::setDescription($product->description);
        }
        $relatedProducts = $product->subCategory->products()->where('id', '<>', $product->id)->inRandomOrder()->get();
        if(count($relatedProducts) > 2)
            $relatedProducts = $relatedProducts->take(2);
            

        return view('paginas.producto', compact('product', 'categories', 'relatedProducts'));
    }

    public function solicitudDePresupuesto()
    {
        $page = Page::where('name', 'solicitud de presupuesto')->first();
        SEO::setTitle("solicitud de presupuesto");
        SEO::setDescription($this->data->description);
        return view('paginas.cotizacion');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto");
        SEO::setDescription($this->data->description);       
        return view('paginas.contacto');
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        if (Storage::disk('custom')->exists($producto->extra)) {
            return Response::download($producto->extra);  
        }else{
            return back();
        }
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->extra))
            Storage::disk('public')->delete($product->extra);

        $product->extra = null;
        $product->save();

        return response()->json([], 200);
    }
}
