<?php

namespace App;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ColorImage extends Model
{

    protected $fillable = ['product_id','path'];


    public function product(){
        return $this->belongsTo(Product::class);
    }
}
