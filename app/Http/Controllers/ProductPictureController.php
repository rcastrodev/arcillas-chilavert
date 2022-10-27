<?php

namespace App\Http\Controllers;

use App\ProductPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPictureController extends Controller
{
    public function destroy($id){
        $productPicture = ProductPicture::find($id);
        
        if(Storage::disk('custom')->exists($productPicture->image))
            Storage::disk('custom')->delete($productPicture->image);

        $productPicture->delete();
    }
}
