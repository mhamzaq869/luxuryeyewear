<?php
namespace App\Models;

use App\ColorImage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use Dompdf\Css\Color;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;
use Cviebrock\EloquentSluggable\Sluggable;
use AmrShawky\LaravelCurrency\Facade\Currency;


class Product extends Model
{

    protected $guarded=[];
    protected $append=['admin_product_price'];

    public function cat_info(){
        return $this->belongsTo('App\Models\Category','cat_id','id');
    }

    public function sub_cat_info(){
        return $this->hasOne('App\Models\Category','id','child_cat_id');

    }
    public static function getAllProduct(){
        return Product::with(['cat_info','sub_cat_info'])->orderBy('id','ASC')->get();
    }

    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->orderBy('id','DESC')->limit(8);
    }

    public function getReview(){
        return $this->hasMany('App\Models\ProductReview','product_id','id')->with('user_info')->where('status','active')->orderBy('id','DESC');
    }

    public static function getProductBySlug($slug){
        $product = Product::with(['cat_info','rel_prods','getReview','get_lens'])->where('slug',$slug)->first();
        return $product;
    }

    public static function countActiveProduct(){
        $data=Product::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function carts(){
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }


    public function colorImages(){
        return $this->hasMany(ColorImage::class);
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }



    public function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }




    public function type_name(){
        return $this->hasOne(Attribute::class,'id','type');
    }

      public function frametype(){
        return $this->hasOne(Attribute::class,'id','frame_type');
    }


    public function get_gender(){
        return $this->hasOne(Attribute::class,'id','product_for');
    }
    public function get_shape(){
        return $this->hasOne(Attribute::class,'id','shape');
    }
    public function get_lens(){
        return $this->hasOne(Attribute::class,'id','lense_type');
    }

    public function get_product_material(){
        return $this->hasOne(Attribute::class,'id','product_material');
    }
    public function attribute(){
        return $this->belongsTo(Attribute::class,'product_for','id');
    }

    public function color(){
        return $this->belongsTo(ProductColor::class,'type','id');
    }
    public static function femaleEyeglasses(){
        $products = DB::table('products')->join('categories','products.cat_id','=','categories.id')->join('brands','products.brand_id','=','brands.id')
        ->select('products.*','categories.frame_type','brands.title as brandName')->where('products.status','active')->where('categories.frame_type',32)->whereIn('products.product_for', [28,30])->where('products.is_featured',1)->limit(6)->get();
        foreach($products as $product){
            $product->variant = DB::table('products')->where('cat_id', $product->cat_id)->where('status','active')->get(['id','title','slug','price','photo']);
        }
        return $products;
    }
    public static function maleEyeglasses(){
        $products = DB::table('products')->join('categories','products.cat_id','=','categories.id')->join('brands','products.brand_id','=','brands.id')
                        ->select('products.*','categories.frame_type','brands.title as brandName')->where('products.status','active')
                    ->where('categories.frame_type',32)->whereIn('products.product_for', [27,30])->where('products.is_featured',1)->limit(6)->get();

         foreach($products as $product){
            $product->variant = DB::table('products')->where('cat_id', $product->cat_id)->where('status','active')->get(['id','title','slug','price','photo']);
        }

        return $products;
    }
    public static function femaleSunglasses(){
        $products = DB::table('products')->join('categories','products.cat_id','=','categories.id')->join('brands','products.brand_id','=','brands.id')
                        ->select('products.*','categories.frame_type','brands.title as brandName')->where('products.status','active')
                    ->where('categories.frame_type',31)->whereIn('products.product_for', [28,30])->where('products.is_featured',1)->limit(6)->get();

        foreach($products as $product){
            $product->variant = DB::table('products')->where('cat_id', $product->cat_id)->where('status','active')->get(['id','title','slug','price','photo']);
        }
        return $products;
    }
    public static function maleSunglasses(){
        $products = DB::table('products')->join('categories','products.cat_id','=','categories.id')->join('brands','products.brand_id','=','brands.id')
                        ->select('products.*','categories.frame_type','brands.title as brandName')->where('products.status','active')
                    ->where('categories.frame_type',31)->whereIn('products.product_for', [27,30])->where('products.is_featured',1)->limit(6)->get();

        foreach($products as $product){
            $product->variant = DB::table('products')->where('cat_id', $product->cat_id)->where('status','active')->get(['id','title','slug','price','photo']);
        }
        return $products;
    }

    // public function setSlugAttribute($value) {

    //     if (static::whereSlug($slug = \Str::slug($value))->exists()) {

    //         $slug = $this->incrementSlug($slug);
    //     }

    //     $this->attributes['slug'] = $slug;
    // }

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public static function Variant($id, array $gender)
    {
        $location = Location::get(request()->ip());
        $location = Location::get('111.119.187.50');

        $products = Product::where('cat_id',$id)->where('status','active')->where('frame_type',31)->whereIn('product_for', $gender)->get();
        foreach($products as $detail){
            $detail->frame_type_name = $detail->frametype->name ?? '';
            $detail->shape_name = $detail->get_shape != null ? $detail->get_shape->name : '';
            $detail->material_name = Attribute::find($detail->product_material)->name ?? '';
            $detail->typename = $detail->type_name != null ? $detail->type_name->name : '';
            $detail->gender_name = $detail->get_gender != null ? $detail->get_gender->name : '';
            $detail->brand_name = Brand::find($detail->brand_id)->title ?? '';
            $detail->cat_name = Category::find($detail->cat_id)->title ?? '';

            $imgs = [];
            $imgs = array_merge($imgs, array($detail->p_f));
            $imgs = array_merge($imgs, array($detail->p_b));
            $imgs = array_merge($imgs, array($detail->g_image_1));
            $imgs = array_merge($imgs, array($detail->g_image_2));
            $imgs = array_merge($imgs, array($detail->g_image_3));


            $detail->all_imgs = $imgs;


            if($location){
                $countryCode = $location->countryCode;

                $extra = Extra::whereRaw('FIND_IN_SET(?, countries)', [$countryCode])->where('status','active')->first();
                if($extra != null && $extra->count() > 0){
                        $detail->extra_amount = $extra->price ?? 0;
                }else{
                    $detail->extra_amount = 0;
                }


                if(str_contains($detail->dispatch_from,$countryCode)){
                    $detail->price = $detail->price + ($detail->extra != null ? $detail->extra : 0) + $detail->extra_amount;
                }else{
                    $detail->price = $detail->price + $detail->extra_amount;
                }

            }

        }
        return $products;
    }

    public function getAdminProductPriceAttribute()
    {
        return number_format(DB::table('products')->where('id',$this->id)->first()->price,2);
    }


    // public function getPriceAttribute($price)
    // {
    //     // dd($this,$price);
    //     $location = Location::get(request()->ip());
    //     $location = Location::get('111.119.187.50');

    //     if($location){
    //         if(str_contains($this->dispatch_from,$location->countryCode)){
    //             $total = $price + ($this->extra != null ? $this->extra : 0) + $product_detail->extra_cost;
    //         }else{
    //             $total = $price;
    //         }
    //     }else{
    //         $total = $price;
    //     }

    //      return price($total);
    // }
}

