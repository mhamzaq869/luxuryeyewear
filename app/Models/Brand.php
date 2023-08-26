<?php



namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Model;



class Brand extends Model

{

    protected $guarded=[];


    public function category(){
        return $this->hasMany(Category::class);
    }

    public function banner(){
        return $this->hasMany(Banner::class);
    }

    public function products(){

        return $this->hasMany('App\Models\Product','brand_id','id')->where('status','active');

    }

    public static function getProductByBrand($slug){

        return Brand::with('products')->where('slug',$slug)->first();


    }

}

