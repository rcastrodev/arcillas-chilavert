<?php

namespace App;

use App\Color;
use App\SubCategory;
use App\ProductPicture;
use App\VariableProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sub_category_id', 'name', 'info', 'description', 'weight', 'order', 'extra', 'outstanding'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }
}
