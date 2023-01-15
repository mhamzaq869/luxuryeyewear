<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
class WishlistController extends Controller
{
    protected $product=null;
    public function __construct(Product $product){
        $this->product=$product;
    }

    public function wishlist(Request $request){
        // dd($request->all());
        if (empty($request->slug)) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }
        $product = Product::where('slug', $request->slug)->first();
        // return $product;
        if (empty($product)) {
            session()->flash('error','Invalid Products');
            return back();
        }


        $already_wishlist = Wishlist::where('user_id', request()->ip())->where('cart_id',null)->where('product_id', $product->id)->first();
        // return $already_wishlist;
        if($already_wishlist) {
            session()->flash('error','You already placed in wishlist');
            return back();
        }else{
            $wishlist = new Wishlist;
            $wishlist->user_id = request()->ip();
            $wishlist->product_id = $product->id;
            $wishlist->unit_price = $product->unit_price;
            $wishlist->quantity = 1;
            $wishlist->amount=intval($wishlist->unit_price)*$wishlist->quantity;
            if ($wishlist->product->stock < $wishlist->quantity || $wishlist->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            $wishlist->save();
        }
        session()->flash('success','Product successfully added to wishlist');
        return back();
    }

    public function wishlistDelete($slug){
        $product = Product::where('slug',$slug)->first();
        $wishlist = Wishlist::where('product_id',$product->id);
        if ($wishlist) {
            $wishlist->delete();
            session()->flash('success','Wishlist successfully removed');
            return back();
        }
        session()->flash('error','Error please try again');
        return back();
    }
}
