<?php
use App\Models\Message;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Shipping;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

// use Auth;
class Helper{
    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    }
    public static function getAllCategory(){
        $category=new Category();
        $menu=$category->getAllParentWithChild();
        return $menu;
    }

    public static function getHeaderCategory(){
        $category = new Category();
        // dd($category);
        $menu=$category->getAllParentWithChild();

        if($menu){
            ?>

            <li>
            <a href="javascript:void(0);">Category<i class="ti-angle-down"></i></a>
                <ul class="dropdown border-0 shadow">
                <?php
                    foreach($menu as $cat_info){
                        if($cat_info->child_cat->count()>0){
                            ?>
                            <li><a href="<?php echo route('product-cat',$cat_info->slug); ?>"><?php echo $cat_info->title; ?></a>
                                <ul class="dropdown sub-dropdown border-0 shadow">
                                    <?php
                                    foreach($cat_info->child_cat as $sub_menu){
                                        ?>
                                        <li><a href="<?php echo route('product-sub-cat',[$cat_info->slug,$sub_menu->slug]); ?>"><?php echo $sub_menu->title; ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                                <li><a href="<?php echo route('product-cat',$cat_info->slug);?>"><?php echo $cat_info->title; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </li>
        <?php
        }
    }

    public static function productCategoryList($option='all'){
        if($option='all'){
            return Category::orderBy('id','DESC')->get();
        }
        return Category::has('products')->orderBy('id','DESC')->get();
    }

    public static function postTagList($option='all'){
        if($option='all'){
            return PostTag::orderBy('id','desc')->get();
        }
        return PostTag::has('posts')->orderBy('id','desc')->get();
    }

    public static function postCategoryList($option="all"){
        if($option='all'){
            return PostCategory::orderBy('id','DESC')->get();
        }
        return PostCategory::has('posts')->orderBy('id','DESC')->get();
    }
    // Cart Count
    public static function cartCount($user_id=''){

        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->where('withoutCheckout',0)->where('order_id',null)->sum('quantity');
        }
        else{
            return 0;
        }
    }
    // relationship cart with product
    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public static function getAllProductFromCart($user_id=''){
            if($user_id=="") $user_id=request()->ip();
            $carts = DB::table('carts')->join('products','carts.product_id','=','products.id')
            ->select('carts.*','products.price as productPrice','products.photo','products.slug','products.title','products.dispatch_from','products.extra')
            ->where('user_id',request()->ip())->where('withoutCheckout',0)->where('order_id',null)->get();

            $location = Location::get(request()->ip());
             foreach($carts as $cart){
                if($location){
                    $countryCode = $location->countryCode;
                    $shipping = DB::table('shippings')->whereRaw('FIND_IN_SET(?, countries)', [$countryCode])->where('status','active')->first();

                    if($shipping != null){
                        if(in_array($countryCode,explode(',',$cart->dispatch_from))){
                            $carts->shipping_id = $shipping->id;
                            $carts->shipping_cost = $shipping->price ?? 0;
                            $carts->transit = $shipping->transit ?? 0;
                        }else{
                            $carts->shipping_id = null;
                            $carts->shipping_cost = 0;
                            $carts->transit = 0;
                        }
                    }else{
                        $carts->shipping_id = null;
                        $carts->shipping_cost = 0;
                        $carts->transit = 0;
                    }

                }else{
                    $carts->shipping_id = null;
                    $carts->shipping_cost = 0;
                    $carts->transit = 0;
                }
            }

            if($carts->count() > 0){
                $carts->total_shipping = number_format($carts->shipping_cost,2);
            }else{
                $carts->total_shipping = number_format(0,2);
            }

            return $carts;

    }
    // Total amount cart
    public static function totalCartPrice($user_id='')
    {

        if($user_id=="") $user_id= request()->ip();
        return number_format(DB::table('carts')->where('user_id',$user_id)->where('withoutCheckout',0)->where('order_id',null)->sum('price'),2);

    }
    // Wishlist Count
    public static function wishlistCount($user_id=''){


            if($user_id=="") $user_id=request()->ip();
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('quantity');

    }
    public static function getAllProductFromWishlist($user_id=''){

        if($user_id=="") $user_id=request()->ip();
        return Wishlist::with('product')->where('user_id',$user_id)->where('cart_id',null)->get();

    }
    public static function totalWishlistPrice($user_id=''){

            if($user_id=="") $user_id=request()->ip();
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('amount');

    }

    // Total price with shipping and coupon
    public static function grandPrice($id,$user_id){
        $order=Order::find($id);

        if($order){
            $shipping_price=(float)$order->shipping->price;
            $order_price=self::orderPrice($id,$user_id);
            return number_format((float)($order_price+$shipping_price),2,'.','');
        }else{
            return 0;
        }
    }


    // Admin home
    public static function earningPerMonth(){
        $month_data=Order::where('status','delivered')->get();
        // return $month_data;
        $price=0;
        foreach($month_data as $data){
            $price = $data->cart_info->sum('price');
        }
        return number_format((float)($price),2,'.','');
    }

    public static function shipping(){
        return Shipping::orderBy('id','DESC')->get();
    }


}

?>
