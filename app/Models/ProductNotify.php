<?php
namespace App\Models;

use App\ColorImage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use Dompdf\Css\Color;

class ProductNotify extends Model
{
    protected $guarded=[];

    function products(){
        return $this->hasMany(Product::class);
    }

}

