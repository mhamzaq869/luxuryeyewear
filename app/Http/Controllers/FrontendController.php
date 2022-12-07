<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Brand;
use App\Models\Attribute;
use App\Models\Extra;
use App\Models\ProductNotify;
use App\Models\Shipping;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Newsletter;
use Stevebauman\Location\Facades\Location;

class FrontendController extends Controller
{

    protected $gender_filter="";
    protected $shape_filter="";
    protected $frame_filter="";
    protected $material_filter="";
    protected $brand_filter="";
    protected $color_filter="";
    protected $ip_country;
    protected $admin_data;

    // public function __construct(){
    //     $ip = \Request::ip();
    //     // $ip = '1.32.239.255';
    //     $location = Location::get('111.119.187.50');
    //     $this->ip_country = $location->countryCode;
    //     //$this->ip_country="India";
    // }


    public function index(Request $request)
    {
        return redirect()->route($request->user()->role);
    }

    public function home()
    {
        // $productWithColor = Product::where('products.status', 'active')
        //     ->leftJoin('categories', function ($join) {
        //         $join->on('categories.id', '=', 'products.cat_id');
        //     })->leftJoin('brands', function ($join) {
        //         $join->on('brands.id', 'products.brand_id');
        //     })->get();

            // dd( Product::variant(1,[27,30]));
        // $attribute = Attribute::get();
        $data['female_eyeglasses'] = Product::femaleEyeglasses();
        $data['male_sunglasses'] = Product::maleSunglasses();
        $data['female_sunglasses'] = Product::femaleSunglasses();
        $data['male_eyeglasses'] = Product::maleEyeglasses();

        // $data['featured'] = DB::table('products')->where('status', 'active')->where('is_featured', 1)->orderBy('price', 'DESC')->limit(2)->get();

        $data['posts'] = DB::table('posts')->where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        $data['banners'] = DB::table('banners')->join('brands','banners.brand_id','=','brands.id')
                            ->select('banners.*','brands.slug as brandSlug')
                            ->where('banners.status', 'active')->limit(3)->orderBy('banners.id', 'DESC')->get();

        // return $banner;

        // $data['products'] = DB::table('products')->where('status', 'active')->orderBy('id', 'DESC')->limit(8)->get();

        $data['category'] = DB::table('categories')->where('status', 'active')->where('is_parent', 1)->orderBy('title', 'ASC')->get();

        // return $category;
        $data['brand_img'] =  DB::table('brands')->where('status', 'active')->orderBy('title')->get();

        $product_variant = DB::table('products')->where('status', 'active')->orderBy('id', 'DESC')->get(['id','slug','price','cat_id','title','photo','dispatch_from','extra','product_for']);

        $data['product_variant'] = $product_variant;

        return view('frontend.index', $data);
    }


    // eyeglasses
    public function frontend_eyeglass($type=null,$for=null)
    {
        $eyeglasses = DB::table('products')->join('categories','products.cat_id','=','categories.id')
                        ->join('brands','products.brand_id','=','brands.id')
                        ->select('products.*','categories.frame_type','brands.title as brandName')
                        ->where('products.status', 'active')
                        ->where('categories.frame_type', 32);

        if($type == 'women'){
            $eyeglasses->whereIn('products.product_for', [28,30]);
            if($for != null){
                $attribute = Attribute::where('name',$for)->first()->id ?? '';
                $eyeglasses->where('products.shape', $attribute);
            }
        }else if($type == 'men'){
            $eyeglasses->whereIn('products.product_for', [27,30]);
            if($for != null){
                $attribute = Attribute::where('name',$for)->first()->id ?? '';
                $eyeglasses->where('products.shape', $attribute);
            }
        }

        $data['eyeglasses'] = $eyeglasses->simplePaginate(20);
        $data['type'] = 'eyelass_pro_price_';
        // if($type == null ){
        //     $data['type'] = 'eyelass_pro_price_';
        // }elseif($type == 'women'){
        //     $data['type'] = 'eyelass_pro_price_';
        // }
        $data['products_count'] = $eyeglasses->count();
        $data['eyeglasses'] = $eyeglasses->simplePaginate(20);
        $product_variant = DB::table('products')->select('id','slug','price','title','cat_id','photo','product_for','dispatch_from','extra')->where('status', 'active')->orderBy('id', 'DESC')->get();
        $data['product_variant'] = $product_variant;


        $data['product_for'] = '';
        $data['glass_type'] = '';
        $data['frame_type'] = '';
        $data['search_product'] = "";
        $data['order_filter'] = "";
        $data['min_price'] = "";
        $data['max_price'] = "";
        $data['gender_array'] = "";
        $data['shape_array'] = "";
        $data['frame_array'] = "";
        $data['material_array'] = "";
        $data['brand_array'] = "";
        $data['color_array'] = "";


        return view('frontend.pages.eyeglass', $data);
    }

    //Load more eyeglass on scroll page
    public function load_more_eyeglasses($frame=null,$type=null,$for=null){
        $products = DB::table('products')->join('categories','products.cat_id','=','categories.id')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->select('products.*','categories.frame_type','brands.title as brandName')
                    ->where('products.status', 'active')
                    ->where('categories.frame_type', 32);


        if($type == 'women'){
            $products->whereIn('products.product_for', [28,30]);
            if($for != null){
                $attribute = Attribute::where('name',$for)->first()->id ?? '';
                $products->where('products.shape', $attribute);
            }
        }else if($type == 'men'){
            $products->whereIn('products.product_for', [27,30]);
            if($for != null){
                $attribute = Attribute::where('name',$for)->first()->id ?? '';
                $products->where('products.shape', $attribute);
            }
        }

        $products = $products->simplePaginate(20);
        $ip_country = $this->ip_country ?? '';
        $product_variant = DB::table('products')->select('id','slug','price','title','cat_id','photo','product_for','dispatch_from','extra')->where('status', 'active')->orderBy('id', 'DESC')->get();
        $data['products'] = $products;
        $data['product_variant'] = $product_variant;
        $data['ip_country'] = $ip_country;

        $view = view('frontend.pages.section.load_more_products',$data)->render();
        return response()->json(['status'=>1, 'more_data'=>$products->count(), 'html'=>$view]);
    }


    // sunglasses
    public function frontend_sunglass($type=null,$for=null)
    {
            $sunglasses = DB::table('products')->join('categories','products.cat_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.frame_type','brands.title as brandName')
            ->where('products.status', 'active')
            ->where('categories.frame_type', 31);

        if($type == 'women'){
            $sunglasses->whereIn('products.product_for', [28,30]);
            if($for != null){
                $attribute = Attribute::where('name',$for)->first()->id ?? '';
                $sunglasses->where('products.shape', $attribute);
            }
        }else if($type == 'men'){

            $sunglasses->whereIn('products.product_for', [27,30]);
            if($for != null){
                $attribute = Attribute::where('name',$for)->first()->id ?? '';

                $sunglasses->where('products.shape', $attribute);
            }
        }

        $data['products_count'] = $sunglasses->count();
        $data['sunglasses'] = $sunglasses->simplePaginate(20);
        $product_variant = DB::table('products')->select('id','slug','price','title','cat_id','photo','product_for','dispatch_from','extra')->where('status', 'active')->orderBy('id', 'DESC')->get();
        $data['product_variant'] = $product_variant;
        $data['type'] = 'sunglass_pro_price_';

        $data['product_for'] = '';
        $data['glass_type'] = '';
        $data['frame_type'] = '';
        $data['search_product'] = "";
        $data['order_filter'] = "";
        $data['min_price'] = "";
        $data['max_price'] = "";
        $data['gender_array'] = "";
        $data['shape_array'] = "";
        $data['frame_array'] = "";
        $data['material_array'] = "";
        $data['brand_array'] = "";
        $data['color_array'] = "";

        return view('frontend.pages.sunglass', $data);
    }


    //Load more sunglass on scroll page
    public function load_more_sunglass($frame=null,$type=null,$for=null){
        $products = DB::table('products')->join('categories','products.cat_id','=','categories.id')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->select('products.*','categories.frame_type','brands.title as brandName')
                    ->where('products.status', 'active')
                    ->where('categories.frame_type', 31);

        if($type == 'women'){
            $products->whereIn('products.product_for', [28,30]);
            if($for != null){
                $attribute = Attribute::where('name',$for)->first()->id ?? '';
                $products->where('products.shape', $attribute);
            }
        }else if($type == 'men'){

            $products->whereIn('products.product_for', [27,30]);
            if($for != null){
                $attribute = Attribute::where('name',$for)->first()->id ?? '';

                $products->where('products.shape', $attribute);
            }
        }

        $products = $products->simplePaginate(20);
        $ip_country = $this->ip_country ?? '';
        $product_variant = DB::table('products')->select('id','slug','price','title','cat_id','photo','product_for','dispatch_from','extra')->where('status', 'active')->orderBy('id', 'DESC')->get();
        $data['products'] = $products;
        $data['product_variant'] = $product_variant;
        $data['ip_country'] = $ip_country;

        $view = view('frontend.pages.section.load_more_products',$data)->render();
        return response()->json(['status'=>1, 'more_data'=>$products->count(), 'html'=>$view]);
    }


    public function productBrand(Request $request)
    {

        $brand_id = DB::table('brands')->where('slug',$request->slug)->first()->id ?? 0;
        $products = DB::table('products')->join('brands','products.brand_id','=','brands.id')
        ->select('products.id','products.slug','products.dispatch_from','products.extra','products.price','products.title','products.cat_id','products.photo','products.product_for','brands.title as brandName')
        ->where('products.status', 'active')->where('products.brand_id', $brand_id)->simplePaginate(20);

        $data['products_count'] = 0;
        $data['products'] = $products;
        $product_variant = DB::table('products')->select('id','slug','price','title','cat_id','photo','product_for','dispatch_from','extra')->where('status', 'active')->orderBy('id', 'DESC')->get();
        $data['product_variant'] = $product_variant;
        $data['brand_id'] = $brand_id;
        $data['type'] = 'sunglass_pro_price_';

        $data['product_for'] = '';
        $data['glass_type'] = '';
        $data['frame_type'] = '';
        $data['search_product'] = "";
        $data['order_filter'] = "";
        $data['min_price'] = "";
        $data['max_price'] = "";
        $data['gender_array'] = "";
        $data['shape_array'] = "";
        $data['frame_array'] = "";
        $data['material_array'] = "";
        $data['brand_array'] = "";
        $data['color_array'] = "";

        return view('frontend.pages.product-brand',$data);
    }

     //Load more sunglass on scroll page
    public function load_more_brands($brand)
    {
        $products = DB::table('products')->join('brands','products.brand_id','=','brands.id')
        ->select('products.id','products.slug','products.price','products.title','products.cat_id','products.photo','products.product_for','brands.title as brandName')
        ->where('products.status', 'active')->where('products.brand_id', $brand)->simplePaginate(20);

        $product_variant = DB::table('products')->select('id','slug','price','title','cat_id','photo','product_for','dispatch_from','extra')->where('status', 'active')->orderBy('id', 'DESC')->get();

        $products = $products;
        $ip_country = $this->ip_country ?? '';
        $data['products'] = $products;
        $data['product_variant'] = $product_variant;
        $data['ip_country'] = $ip_country;

        $view = view('frontend.pages.section.load_more_products',$data)->render();
        return response()->json(['status'=>1, 'more_data'=> $products->count(), 'html'=> $view]);
    }


    public function filter_product_for(Request $request)
    {

        $product_for = $request->product_for;
        $glass_type = $request->glass_type;
        $frame_type = $request->frame_type;
        // $top_products = DB::table('categories')->where('status', 'Active')->get();
        $ip_country = $this->ip_country ?? '';
        $search = "";
        $order_filter = "";
        $min_price = "";
        $max_price = "";
        $gender_array = "";
        $shape_array = "";
        $frame_array = "";
        $material_array = "";
        $brand_array = "";

        $arr = DB::table('products')->where('products.status', 'Active')
                        ->select('products.id','products.slug','products.title','products.photo','products.price',
                        'products.product_for','products.shape','products.type', 'products.product_material','products.dispatch_from','products.extra',
                        'products.brand_id','products.cat_id','products.status','products.created_at',
                        'categories.frame_type','brands.title as brandName')
                        ->join('categories','products.cat_id','=','categories.id')
                        ->join('brands','products.brand_id','=','brands.id');


        $attribute = new Attribute();


        if (!empty($glass_type)) {
            $glass_type_id = $attribute->where('name',$glass_type)->first()->id ?? 0;
            $arr->where('frame_type', $glass_type_id);
        }


        if (!empty($request->order_filter)) {
            $order_filter = $request->order_filter;
            if ($order_filter == "Latest") {
                $arr->latest();
            } else if ($order_filter == "Low") {
                $arr->orderBy('price', 'ASC');
            } else if ($order_filter == "High") {
                $arr->orderBy('price', 'DESC');
            } else if ($order_filter == "Sort_ASC") {
                $arr->orderBy('title', 'ASC');
            } else if ($order_filter == "Sort_DESC") {
                $arr->orderBy('title', 'DESC');
            }
        }


        if (!empty($request->min_price) && !empty($request->max_price)) {
            $min_price = $request->min_price;
            $max_price = $request->max_price;
            $arr->whereBetween('products.price', [$min_price, $max_price]);
        }


        if(!empty($request->search_product)) {
            $search = $request->search_product;
            $arr->where('products.title', 'LIKE', '%' . $search . '%');
        }


        // Condition for Gender Filter
        if(!empty($request->gender_array)) {
            $gender_array = $request->gender_array;
            $this->gender_filter = explode(',', $request->gender_array);
        }else{
            $this->gender_filter = "";
        }


        if (!empty($this->gender_filter)) {
            $arr->where(function ($q) use($attribute) {
                $attribute_gender_first =  $attribute->where('id',$this->gender_filter[0])->first()->id ?? 0;
                $q->where('product_for', $attribute_gender_first);
                $q->orWhere('product_for', 30);


                for ($i = 1; $i < count($this->gender_filter); $i++) {
                    $attribute_gender_all =  $attribute->where('id',$this->gender_filter[$i])->first()->id ?? 0;
                    $q->orWhere('product_for', $attribute_gender_all);
                }

            });
        }
        // dd($arr->get(),$request->all(),!empty($this->gender_filter));
        // Condition for Shape Filter
        if (!empty($request->shape_array)) {
            $shape_array = $request->shape_array;
            $this->shape_filter = explode(',', $request->shape_array);
        }else{
            $this->shape_filter = "";
        }

        // dd($request->all(),$arr);

        if(!empty($this->shape_filter)){
            $arr->where(function ($q) use($attribute){
                $attribute_shape_first =  $attribute->where('id',$this->shape_filter[0])->first()->id ?? 0;
                $q->where('shape', $attribute_shape_first);
                for ($i = 1; $i < COUNT($this->shape_filter); $i++) {
                    $attribute_shape_all =  $attribute->where('id',$this->shape_filter[$i])->first()->id ?? 0;
                    $q->orWhere('shape', $attribute_shape_all);
                }
            });
        }


        // Condition for Frame Filter
        if (!empty($request->frame_array)) {
            $frame_array = $request->frame_array;
            $this->frame_filter = explode(',', $request->frame_array);
        }else{
            $this->frame_filter = "";
        }


        if (!empty($this->frame_filter)) {
            $arr->where(function ($q) use($attribute) {
                $frame_first =  $attribute->where('id',$this->frame_filter[0])->first()->id ?? 0;
                $q->where('type', $frame_first);
                for ($i = 1; $i < COUNT($this->frame_filter); $i++) {
                    $frame_all =  $attribute->where('id',$this->frame_filter[$i])->first()->id ?? 0;
                    $q->orWhere('type', $frame_all);
                }
            });
        }

        // Condition for Frame Material
        if (!empty($request->material_array)) {
            $material_array = $request->material_array;
            $this->material_filter = explode(',', $request->material_array);
        }else{
            $this->material_filter = "";
        }


        if(!empty($this->material_filter)) {
            $arr->where(function ($q) use($attribute) {
                $material_first =  $attribute->where('id',$this->material_filter[0])->first()->id ?? 0;
                $q->where('product_material', $material_first);
                for ($i = 1; $i < COUNT($this->material_filter); $i++) {
                    $material_all =  $attribute->where('id',$this->material_filter[$i])->first()->id ?? 0;
                    $q->orWhere('product_material', $material_all);
                }
            });
        }


        // Condition for Frame Brand
        if (!empty($request->brand_array)) {
            $brand_array = $request->brand_array;
            $this->brand_filter = explode(',', $request->brand_array);
        }else{
            $this->brand_filter = "";
        }


        if (!empty($this->brand_filter)) {
            $arr->where(function ($q) use($attribute) {
                $brands = DB::table('brands')->get();
                $brand_first = $brands->where('id',$this->brand_filter[0])->first()->id ?? '';

                $q->where('products.brand_id', $brand_first);
                for ($i = 1; $i < COUNT($this->brand_filter); $i++) {
                    $brand_all = $brands->where('id',$this->brand_filter[$i])->first()->id ?? '';
                    $q->orWhere('products.brand_id', $brand_all);
                }
            });
        }



        // dd($arr->get(),$request->all());

        $arr = $arr->simplePaginate(20);
        $datas = $arr;

        $arr = json_encode($arr);
        $products = json_decode($arr, true);

        // dd(DB::getQueryLog());
        //Get Frmae Type Filter
        // $query1 = DB::table('attributes')->leftJoin('products','products.product_for', '=','attributes.id');
        $query1 = DB::table('attributes')->select('products.*','categories.frame_type')
                    ->join('products','products.product_for', '=','attributes.id')
                    ->join('categories','products.cat_id','=','categories.id');

        if(!empty($product_for)){
                $all_product = $attribute->where('name',$product_for)->pluck('id') ?? '';
                $cat_for = array_merge([[30], $all_product]);
                $query1->whereIn('products.product_for', $cat_for);
        }
        if(!empty($request->search_product)) {
            $search_product = $request->search_product;
            $query1->where('products.title', 'LIKE', '%' . $search_product . '%');
        }
        if(!empty($this->shape_filter)){
            $query1->where(function ($q) use($attribute) {
                $q->where('products.shape', $this->shape_filter[0]);
                for ($i = 1; $i < COUNT($this->shape_filter); $i++) {
                    $q->orWhere('products.shape', $this->shape_filter[$i]);
                }
            });
        }
        if(!empty($this->material_filter)) {
            $query1->where(function ($q) use($attribute) {
                $q->where('products.product_material', $this->material_filter[0]);
                for ($i = 1; $i < COUNT($this->material_filter); $i++) {
                    $q->orWhere('products.product_material', $this->material_filter[$i]);
                }
            });
        }
        if (!empty($this->brand_filter)) {
            $query1->where(function ($q) use($attribute) {
                $q->where('products.brand_id', $this->brand_filter[0]);
                for ($i = 1; $i < COUNT($this->brand_filter); $i++) {
                    $q->orWhere('products.brand_id', $this->brand_filter[$i]);
                }
            });
        }


        $glass_type_id = $attribute->where('name',$glass_type)->first()->id ?? 0;
        $frame_types = $query1->where('products.status','active')->where('categories.frame_type', $glass_type_id)->where('products.stock', '>', 0)->get();


        //Get Frmae Shape Filter
        $query2 = DB::table('attributes')->select('products.*','categories.frame_type')
                ->join('products','products.product_for', '=','attributes.id')
                ->join('categories','products.cat_id','=','categories.id');

        if(!empty($product_for)){
                $all_product = $attribute->where('name',$product_for)->pluck('id') ?? '';
                $cat_for = array_merge([[30], $all_product]);
                 $query2->whereIn('products.category_for', $cat_for);
        }
        if(!empty($request->search_product)) {
            $search_product = $request->search_product;
            $query2->where('products.title', 'LIKE', '%' . $search_product . '%');
        }
        if (!empty($this->frame_filter)) {
            $query2->where(function ($q) use($attribute) {
                $q->where('products.type', $this->frame_filter[0]);
                for ($i = 1; $i < COUNT($this->frame_filter); $i++) {
                    $q->orWhere('products.type', $this->frame_filter[$i]);
                }
            });
        }
        if(!empty($this->material_filter)) {
            $query2->where(function ($q) use($attribute) {
                $q->where('products.product_material', $this->material_filter[0]);
                for ($i = 1; $i < COUNT($this->material_filter); $i++) {
                    $q->orWhere('products.product_material', $this->material_filter[$i]);
                }
            });
        }
        if (!empty($this->brand_filter)) {
            $query2->where(function ($q) use($attribute) {
                $q->where('products.brand_id', $this->brand_filter[0]);
                for ($i = 1; $i < COUNT($this->brand_filter); $i++) {
                    $q->orWhere('products.brand_id', $this->brand_filter[$i]);
                }
            });
        }


        $frame_shapes = $query2->where('products.status','Active')->where('categories.frame_type', $glass_type_id)->where('products.stock', '>', 0)->get();

        // Get Frame Material Filter
        $query3 = DB::table('attributes')->select('products.*','categories.frame_type')
                ->join('products','products.product_for', '=','attributes.id')
                ->join('categories','products.cat_id','=','categories.id');

        if(!empty($product_for)){
                 $cat_for = ['Unisex', $product_for];
                 $query3->whereIn('products.category_for', $cat_for);
        }
        if(!empty($request->search_product)) {
            $search_product = $request->search_product;
            $query3->where('products.title', 'LIKE', '%' . $search_product . '%');
        }
        if(!empty($this->shape_filter)){
            $query3->where(function ($q) use($attribute) {
                $q->where('products.shape', $this->shape_filter[0]);
                for ($i = 1; $i < COUNT($this->shape_filter); $i++) {
                    $q->orWhere('products.shape', $this->shape_filter[$i]);
                }
            });
        }
        if (!empty($this->frame_filter)) {
            $query3->where(function ($q) use($attribute) {
                $q->where('products.type', $this->frame_filter[0]);
                for ($i = 1; $i < COUNT($this->frame_filter); $i++) {
                    $q->orWhere('products.type', $this->frame_filter[$i]);
                }
            });
        }
        if (!empty($this->brand_filter)) {
            $query3->where(function ($q) use($attribute) {
                $q->where('products.brand_id', $this->brand_filter[0]);
                for ($i = 1; $i < COUNT($this->brand_filter); $i++) {
                    $q->orWhere('products.brand_id', $this->brand_filter[$i]);
                }
            });
        }
        $frame_materials = $query3->where('products.status','Active')->where('categories.frame_type', $glass_type_id)->where('products.stock', '>', 0)->get();


        // Get Brands Filter
        $addWhere = '';
        if(!empty($product_for)){
            $addWhere .= ' and b.category_for in("Unisex","'.$product_for.'") ';
        }
        if(!empty($request->search_product)) {
            $search_product = $request->search_product;
            $addWhere .= " and b.title LIKE '%".$search_product."%' ";
        }
        if(!empty($this->shape_filter)){
                $addWhere .= ' and ( b.shape = "'.$this->shape_filter[0].'"';
                for ($i = 1; $i < COUNT($this->shape_filter); $i++) {
                    $addWhere .= ' or b.shape = "'.$this->shape_filter[$i].'"';
                }
                $addWhere .= ') ';
        }
        if (!empty($this->frame_filter)) {
            $addWhere .= ' and ( b.type = "'.$this->frame_filter[0].'"';
                for ($i = 1; $i < COUNT($this->frame_filter); $i++) {
                    $addWhere .= ' or b.type = "'.$this->frame_filter[$i].'"';
                }
            $addWhere .= ') ';
        }
        if(!empty($this->material_filter)) {
            $addWhere .= ' and ( b.product_material = "'.$this->material_filter[0].'"';
                for ($i = 1; $i < COUNT($this->material_filter); $i++) {
                    $addWhere .= ' or b.product_material = "'.$this->material_filter[$i].'"';
                }
            $addWhere .= ') ';
        }


        $all_brands = [];
        $product_variant = DB::table('products')->select('id','slug','price','title','cat_id','photo','product_for','dispatch_from','extra')->where('status', 'active')->orderBy('id', 'DESC')->get();
        //    dd($request->all()) ;
        if ($request->ajax()) {
            $view = view('frontend.pages.section.load_more_products', ['products' => $datas, 'product_variant' => $product_variant])->render();
            return response()->json(['status' => 1, 'more_data'=> $datas->count(), 'html' => $view]);
        }else{
            return view('frontend.pages.product_for', compact('product_for', 'products', 'product_variant','all_brands', 'search', 'min_price', 'max_price', 'order_filter', 'gender_array', 'shape_array', 'frame_types', 'frame_array', 'material_array', 'frame_shapes', 'frame_materials', 'brand_array', 'datas', 'ip_country', 'glass_type'));
        }

    }




    // brands

    public function frontend_brands()
    {
        $brand_data['brand_img'] =  Brand::where('status', 'active')->orderBy('title')->get();
        return view('frontend.pages.brands', $brand_data);
    }
    // product_detail

    public function product_detail()
    {

        return view('frontend.pages.product_detail_new');
    }


    public function aboutUs()
    {
        return view('frontend.pages.about-us');
    }



    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function returnAndExchange()
    {
        return view('frontend.pages.return-and-exchange');
    }

    public function shippingPolicy()
    {
        return view('frontend.pages.shipping-policy');
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacy-policy');
    }

    public function productDetail($slug)
    {
        $location = locationVal();

        $product_detail = Product::getProductBySlug($slug);

        if($product_detail != null && $product_detail->cat_info->size != null){
            $lensDetail = json_decode($product_detail->cat_info->size);
            $product_detail->product_lens_width = $lensDetail->width;
            $product_detail->product_bridge = $lensDetail->bridge;
            $product_detail->product_arm_length = $lensDetail->arm_length;
            $product_detail->product_lens_height = $lensDetail->lens_height;
            $product_detail->product_total_width = $lensDetail->total_width;
        }else{
            $product_detail->product_lens_width = '';
            $product_detail->product_bridge = '';
            $product_detail->product_arm_length = '';
            $product_detail->product_lens_height = '';
            $product_detail->product_total_width = '';
        }
        $attribute = Attribute::all();
        $product_variant = DB::table('products')->join('brands','products.brand_id','=','brands.id')->join('categories','products.cat_id','=','categories.id')
        ->select('products.*','categories.size as catSize','categories.title as catTitle','categories.frame_type','brands.title as brandName')->where('cat_id', $product_detail->cat_id)->where('products.status','active')->get();

        foreach($product_variant as $detail){

            $detail->frame_type_name = $attribute->where('id',$detail->frame_type)->first() != null ? $attribute->where('id',$detail->frame_type)->first()->name : '';
            $detail->shape_name = $attribute->where('id',$detail->shape)->first() != null ? $attribute->where('id',$detail->shape)->first()->name : '';
            $detail->material_name = $attribute->where('id',$detail->product_material)->first() != null ? $attribute->where('id',$detail->product_material)->first()->name : '';
            $detail->lens_name = $attribute->where('id',$detail->lense_type)->first() != null ? $attribute->where('id',$detail->lense_type)->first()->name : '';
            // $detail->typename = $detail->type_name != null ? $detail->type_name->name : '';
            // $detail->shapename = $detail->get_shape != null ? $detail->get_shape->name : '';
            $detail->gender_name = $attribute->where('id',$detail->product_for)->first() != null ? $attribute->where('id',$detail->product_for)->first()->name : '';
            $detail->brand_name = $detail->brandName ?? '';
            $detail->cat_name = $detail->catTitle ?? '';
            $detail->frame_fragment = json_decode($detail->catSize) ?? '';

            $imgs = [];
            $imgs = array_merge($imgs, array($detail->p_f));
            $imgs = array_merge($imgs, array($detail->p_b));
            $imgs = array_merge($imgs, array($detail->g_image_1));
            $imgs = array_merge($imgs, array($detail->g_image_2));
            $imgs = array_merge($imgs, array($detail->g_image_3));


            $detail->all_imgs = $imgs;

        }

        if($location){
            $countryCode = $location->countryCode;
            $shipping = Shipping::whereRaw('FIND_IN_SET(?, countries)', [$countryCode])->where('status','active')->first();
            if($shipping != null && $shipping->count() > 0){
                if(in_array($countryCode,explode(',',$product_detail->dispatch_from))){
                    $product_detail->shipping_cost = $shipping->price ?? 0;
                    $product_detail->transit = $shipping->transit ?? 0;
                }else{
                    $product_detail->shipping_cost = 0;
                    $product_detail->transit = 0;
                }
            }else{
                $product_detail->shipping_cost = 0;
                $product_detail->transit = 0;
            }
        }


        return view('frontend.pages.product_detail', get_defined_vars());
    }

    public function notifyEmail(Request $request)
    {
        // $data = ['out of stock'];
        // Mail::send('email_view', $data, function ($m) use ($request) {
        //     $m->from("example@gmail.com", config('app.name', 'APP Name'));
        //     $m->to($request->email)->subject('Email Subject!');
        // });

        ProductNotify::create([
            'email' => $request->email,
            'product_id' => $request->product_id,
        ]);

        return redirect()->back()->with('success',"We have recieved your email and will notify you when this product available in our stock");
    }

    public function getProduct($id)
    {
        $product_detail = Product::find($id);

        $product_detail->frame_type_name = $product_detail->frametype->name ?? '';
        $product_detail->shape_name = $product_detail->get_shape != null ? $product_detail->get_shape->name : '';
        $product_detail->material_name = Attribute::find($product_detail->product_material)->name ?? '';
        $product_detail->typename = $product_detail->type_name != null ? $product_detail->type_name->name : '';
        $product_detail->gender_name = $product_detail->get_gender != null ? $product_detail->get_gender->name : '';
        $product_detail->brand_name = Brand::find($product_detail->brand_id)->title ?? '';
        $product_detail->cat_name = Category::find($product_detail->cat_id)->title ?? '';

        $imgs = [];
        $imgs = array_merge($imgs, array($product_detail->p_f));
        $imgs = array_merge($imgs, array($product_detail->p_b));
        $imgs = array_merge($imgs, array($product_detail->g_image_1));
        $imgs = array_merge($imgs, array($product_detail->g_image_2));
        $imgs = array_merge($imgs, array($product_detail->g_image_3));


        $product_detail->all_imgs = $imgs;

        return response($product_detail);
    }

    public function productGrids()
    {

        $products = Product::query();



        if (!empty($_GET['category'])) {

            $slug = explode(',', $_GET['category']);

            // dd($slug);

            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();

            // dd($cat_ids);

            $products->whereIn('cat_id', $cat_ids);

            // return $products;

        }

        if (!empty($_GET['brand'])) {

            $slugs = explode(',', $_GET['brand']);

            $brand_ids = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();

            return $brand_ids;

            $products->whereIn('brand_id', $brand_ids);
        }

        if (!empty($_GET['sortBy'])) {

            if ($_GET['sortBy'] == 'title') {

                $products = $products->where('status', 'active')->orderBy('title', 'ASC');
            }

            if ($_GET['sortBy'] == 'price') {

                $products = $products->orderBy('price', 'ASC');
            }
        }



        if (!empty($_GET['price'])) {

            $price = explode('-', $_GET['price']);

            // return $price;

            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));

            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));



            $products->whereBetween('price', $price);
        }



        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        // Sort by number

        if (!empty($_GET['show'])) {

            $products = $products->where('status', 'active')->paginate($_GET['show']);
        } else {

            $products = $products->where('status', 'active')->paginate(9);
        }

        // Sort by name , price, category





        return view('frontend.pages.product-grids')->with('products', $products)->with('recent_products', $recent_products);
    }

    public function productLists()
    {

        $products = Product::query();



        if (!empty($_GET['category'])) {

            $slug = explode(',', $_GET['category']);

            // dd($slug);

            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();

            // dd($cat_ids);

            $products->whereIn('cat_id', $cat_ids)->paginate;

            // return $products;

        }

        if (!empty($_GET['brand'])) {

            $slugs = explode(',', $_GET['brand']);

            $brand_ids = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();

            return $brand_ids;

            $products->whereIn('brand_id', $brand_ids);
        }

        if (!empty($_GET['sortBy'])) {

            if ($_GET['sortBy'] == 'title') {

                $products = $products->where('status', 'active')->orderBy('title', 'ASC');
            }

            if ($_GET['sortBy'] == 'price') {

                $products = $products->orderBy('price', 'ASC');
            }
        }



        if (!empty($_GET['price'])) {

            $price = explode('-', $_GET['price']);

            // return $price;

            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));

            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));



            $products->whereBetween('price', $price);
        }



        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        // Sort by number

        if (!empty($_GET['show'])) {

            $products = $products->where('status', 'active')->paginate($_GET['show']);
        } else {

            $products = $products->where('status', 'active')->paginate(6);
        }

        // Sort by name , price, category





        return view('frontend.pages.product-lists')->with('products', $products)->with('recent_products', $recent_products);
    }

    public function productFilter(Request $request)
    {

        $data = $request->all();

        // return $data;

        $showURL = "";

        if (!empty($data['show'])) {

            $showURL .= '&show=' . $data['show'];
        }



        $sortByURL = '';

        if (!empty($data['sortBy'])) {

            $sortByURL .= '&sortBy=' . $data['sortBy'];
        }



        $catURL = "";

        if (!empty($data['category'])) {

            foreach ($data['category'] as $category) {

                if (empty($catURL)) {

                    $catURL .= '&category=' . $category;
                } else {

                    $catURL .= ',' . $category;
                }
            }
        }



        $brandURL = "";

        if (!empty($data['brand'])) {

            foreach ($data['brand'] as $brand) {

                if (empty($brandURL)) {

                    $brandURL .= '&brand=' . $brand;
                } else {

                    $brandURL .= ',' . $brand;
                }
            }
        }

        // return $brandURL;



        $priceRangeURL = "";

        if (!empty($data['price_range'])) {

            $priceRangeURL .= '&price=' . $data['price_range'];
        }

        if (request()->is('e-shop.loc/product-grids')) {

            return redirect()->route('product-grids', $catURL . $brandURL . $priceRangeURL . $showURL . $sortByURL);
        } else {

            return redirect()->route('product-lists', $catURL . $brandURL . $priceRangeURL . $showURL . $sortByURL);
        }
    }

    public function productSearch(Request $request)
    {

        $recent_products = DB::table('products')->whereIn('status', ['active','outofstock'])->orderBy('id', 'DESC')->limit(3)->get();

        if($request->search != null){
            $products = DB::table('products')->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','brands.title as brandName')
            ->where('products.title', 'like', '%' . $request->search . '%')
            ->orWhere('products.product_ean_code', 'like', '%' . $request->search . '%')
            ->orWhere('products.price', 'like', '%' . $request->search . '%')
            ->whereNot('products.status', 'inactive')
            ->orderBy('products.id', 'DESC')
            ->simplePaginate(20);

        }else{
            $products = [];
        }

        // dd($products);

        $product_variant = DB::table('products')->whereIn('status', ['active','outofstock'])->orderBy('id', 'DESC')->get(['id','slug','price','title','photo','dispatch_from','extra','product_for']);

        return view('frontend.pages.product_for')
                ->with('datas', $products)
                ->with('recent_products', $recent_products)
                ->with('search', $request->search)
                ->with('product_for', '')
                ->with('product_variant', $product_variant);
    }


    public function load_more_products($search)
    {
        // dd($request->all(),$search);
        $products = DB::table('products')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','brands.title as brandName')
            // ->orwhere('products.slug', 'like', '%' . $search . '%')
            ->orwhere('products.product_ean_code', 'like', '%' . $search . '%')
            ->orwhere('products.price', 'like', '%' . $search . '%')
            ->orWhereNot('products.status', 'inactive')
            ->orderBy('products.id', 'DESC')
            ->simplePaginate(20);

        // dd($products);
        $ip_country = $this->ip_country ?? '';
        $product_variant = Product::where('status', 'active')->orderBy('id', 'DESC')->get(['id','slug','price','title','cat_id','photo','product_for','extra','dispatch_from']);
        $data['products'] = $products;
        $data['product_variant'] = $product_variant;
        $data['ip_country'] = $ip_country;

        $view = view('frontend.pages.section.load_more_products',$data)->render();
        return response()->json(['status'=>1, 'more_data'=>$products->count(), 'html'=>$view]);
    }


    public function productCat(Request $request)
    {

        $products = Category::getProductByCat($request->slug);

        // return $request->slug;

        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();



        if (request()->is('e-shop.loc/product-grids')) {

            return view('frontend.pages.product-grids')->with('products', $products->products)->with('recent_products', $recent_products);
        } else {

            return view('frontend.pages.product-lists')->with('products', $products->products)->with('recent_products', $recent_products);
        }
    }

    public function productSubCat(Request $request)
    {

        $products = Category::getProductBySubCat($request->sub_slug);

        // return $products;

        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();



        if (request()->is('e-shop.loc/product-grids')) {

            return view('frontend.pages.product-grids')->with('products', $products->sub_products)->with('recent_products', $recent_products);
        } else {

            return view('frontend.pages.product-lists')->with('products', $products->sub_products)->with('recent_products', $recent_products);
        }
    }



    public function blog()
    {

        $post = Post::query();



        if (!empty($_GET['category'])) {

            $slug = explode(',', $_GET['category']);

            // dd($slug);

            $cat_ids = PostCategory::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();

            return $cat_ids;

            $post->whereIn('post_cat_id', $cat_ids);

            // return $post;

        }

        if (!empty($_GET['tag'])) {

            $slug = explode(',', $_GET['tag']);

            // dd($slug);

            $tag_ids = PostTag::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();

            // return $tag_ids;

            $post->where('post_tag_id', $tag_ids);

            // return $post;

        }



        if (!empty($_GET['show'])) {

            $post = $post->where('status', 'active')->orderBy('id', 'DESC')->paginate($_GET['show']);
        } else {

            $post = $post->where('status', 'active')->orderBy('id', 'DESC')->paginate(9);
        }

        // $post=Post::where('status','active')->paginate(8);

        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        return view('frontend.pages.blog')->with('posts', $post)->with('recent_posts', $rcnt_post);
    }



    public function blogDetail($slug)
    {

        $post = Post::getPostBySlug($slug);

        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        // return $post;

        return view('frontend.pages.blog-detail')->with('post', $post)->with('recent_posts', $rcnt_post);
    }



    public function blogSearch(Request $request)
    {

        // return $request->all();

        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        $posts = Post::orwhere('title', 'like', '%' . $request->search . '%')

            ->orwhere('quote', 'like', '%' . $request->search . '%')

            ->orwhere('summary', 'like', '%' . $request->search . '%')

            ->orwhere('description', 'like', '%' . $request->search . '%')

            ->orwhere('slug', 'like', '%' . $request->search . '%')

            ->orderBy('id', 'DESC')

            ->paginate(8);

        return view('frontend.pages.blog')->with('posts', $posts)->with('recent_posts', $rcnt_post);
    }



    public function blogFilter(Request $request)
    {

        $data = $request->all();

        // return $data;

        $catURL = "";

        if (!empty($data['category'])) {

            foreach ($data['category'] as $category) {

                if (empty($catURL)) {

                    $catURL .= '&category=' . $category;
                } else {

                    $catURL .= ',' . $category;
                }
            }
        }



        $tagURL = "";

        if (!empty($data['tag'])) {

            foreach ($data['tag'] as $tag) {

                if (empty($tagURL)) {

                    $tagURL .= '&tag=' . $tag;
                } else {

                    $tagURL .= ',' . $tag;
                }
            }
        }

        // return $tagURL;

        // return $catURL;

        return redirect()->route('blog', $catURL . $tagURL);
    }



    public function blogByCategory(Request $request)
    {

        $post = PostCategory::getBlogByCategory($request->slug);

        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        return view('frontend.pages.blog')->with('posts', $post->post)->with('recent_posts', $rcnt_post);
    }



    public function blogByTag(Request $request)
    {

        // dd($request->slug);

        $post = Post::getBlogByTag($request->slug);

        // return $post;

        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        return view('frontend.pages.blog')->with('posts', $post)->with('recent_posts', $rcnt_post);
    }



    // Login

    public function login()
    {

        return view('frontend.pages.login');
    }

    public function loginSubmit(Request $request)
    {

        $data = $request->all();
        $user = User::where('email',$data['email'])->where('role','user')->where('status','active')->first();

        if($user){
            if(Hash::check($data['password'], $user->password)){
                Auth::login($user);
                return redirect()->route('user_dashboard');
            }else{
                return redirect()->back()->with('error', 'Invalid Password pleas try again!');
            }
        }else{
            return redirect()->back()->with('error', 'Invalid email pleas try again!');
        }

    }



    public function logout($type=null)
    {

        if($type == null){
            Session::forget('user');
            Auth::logout();

            request()->session()->flash('success', 'Logout successfully');

            return back();
        }else{
            Session::forget('user');
            Auth::logout();

            request()->session()->flash('success', 'Logout successfully');
            return redirect()->route('login.form');
        }
    }



    public function register()
    {

        return view('frontend.pages.register');
    }

    public function registerSubmit(Request $request)
    {

        // return $request->all();

        $this->validate($request, [

            'name' => 'string|required|min:2',

            'email' => 'string|required|unique:users,email',

            'password' => 'required|min:6|confirmed',

        ]);

        $data = $request->all();

        // dd($data);

        $check = $this->create($data);

        Session::put('user', $data['email']);

        if ($check) {

            request()->session()->flash('success', 'Successfully registered');

            return redirect()->route('home');
        } else {

            request()->session()->flash('error', 'Please try again!');

            return back();
        }
    }

    public function create(array $data)
    {

        return User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => Hash::make($data['password']),

            'status' => 'active'

        ]);
    }

    // Reset password

    public function showResetForm()
    {

        return view('auth.passwords.old-reset');
    }



    public function subscribe(Request $request)
    {

        if (! Newsletter::isSubscribed($request->email)) {

            Newsletter::subscribePending($request->email);

            if (Newsletter::lastActionSucceeded()) {

                $response['status'] = true;
                $response['status_code'] = 200;
                $response['type'] = 'success';
                $response['message'] = 'Subscribed! Please check your email';

                return response($response);
            } else {

                Newsletter::getLastError();

                $response['status'] = false;
                $response['status_code'] = 500;
                $response['type'] = 'error';
                $response['message'] = 'Something went wrong! please try again';

                return response($response);
            }
        } else {

            $response['status'] = true;
            $response['status_code'] = 200;
            $response['type'] = 'success';
            $response['message'] = 'Already Subscribed';

            return response($response);
        }
    }
}
