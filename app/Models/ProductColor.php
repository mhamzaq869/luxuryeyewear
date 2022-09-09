<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $guarded=[];
   

  
  
      public function getproduct_color(){
	return $this->hasOne(Product::class,'id','product_color');
}
  
   
}

