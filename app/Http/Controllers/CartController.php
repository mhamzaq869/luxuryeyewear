<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Integration;
use App\Models\Shipping;
use App\Models\State;
use Illuminate\Support\Str;
use Helper;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;
use Stevebauman\Location\Facades\Location;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class CartController extends Controller
{
    protected $product = null;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $user_id = request()->ip();
        $carts = DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')
        ->select('carts.*', 'products.price as productPrice', 'products.photo', 'products.slug', 'products.title', 'products.dispatch_from', 'products.extra')
        ->where('user_id', request()->ip())->where('order_id', null)->get();

        $location = Location::get(request()->ip());
        foreach($carts as $cart) {
            if($location) {
                $countryCode = $location->countryCode;
                $shipping = DB::table('shippings')->whereRaw('FIND_IN_SET(?, countries)', [$countryCode])->where('status', 'active')->first();

                if($shipping != null) {
                    if(in_array($countryCode, explode(',', $cart->dispatch_from))) {
                        $carts->shipping_id = $shipping->id;
                        $carts->shipping_cost = $shipping->price ?? 0;
                        $carts->transit = $shipping->transit ?? 0;
                    } else {
                        $carts->shipping_id = null;
                        $carts->shipping_cost = 0;
                        $carts->transit = 0;
                    }
                } else {
                    $carts->shipping_id = null;
                    $carts->shipping_cost = 0;
                    $carts->transit = 0;
                }

            } else {
                $carts->shipping_id = null;
                $carts->shipping_cost = 0;
                $carts->transit = 0;
            }
        }

        if(count($carts) > 0) {
            $total_shipping = number_format($carts->shipping_cost, 2);
        } else {
            $total_shipping = number_format(0, 2);
        }

        return view('frontend.pages.cart', get_defined_vars());
    }

    public function addToCart(Request $request)
    {

        if (empty($request->product_id)) {
            request()->session()->flash('error', 'Invalid Products');
            return back();
        }
        $product = Product::where('id', $request->product_id)->first();
        if (empty($product)) {
            request()->session()->flash('error', 'Invalid Products');
            return back();
        }

        $already_cart = Cart::where('user_id', request()->ip())->where('order_id', null)->where('product_id', $product->id)->first();

        if($already_cart) {


            $already_cart->quantity = $already_cart->quantity + $request->quantity;
            $already_cart->price   =  $already_cart->price + $request->price;

            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) {
                return back()->with('error', 'Stock not sufficient!.');
            }
            $already_cart->save();

        } else {

            $cart = new Cart();
            $cart->user_id = request()->ip();
            $cart->product_id = $product->id;
            if($product->price != null) {
                $cart->price = ($product->price - ($product->price * $product->discount) / 100);
                $cart->quantity = $request->quantity;
                $cart->price = $cart->price * $cart->quantity;
                if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) {
                    return back()->with('error', 'Stock not sufficient!.');
                }
                $cart->save();
                $wishlist = Wishlist::where('user_id', request()->ip())->where('cart_id', null)->update(['cart_id' => $cart->id]);
            }
        }
        request()->session()->flash('success', 'Product successfully added to cart');
        return back();
    }

    public function singleAddToCart($slug)
    {

        $quant = 1;

        $product = Product::where('slug', $slug)->first();
        if($product->stock < $quant) {
            return back()->with('error', 'Out of stock, You can add other products.');
        }
        if (($quant < 1) || empty($product)) {
            session()->flash('error', 'Invalid Products');
            return back();
        }

        $wishlist = Wishlist::where('product_id', $product->id)->first();
        if($wishlist) {
            $wishlist->delete();
        }

        $already_cart = Cart::where('user_id', request()->ip())->where('order_id', null)->where('product_id', $product->id)->first();

        if($already_cart) {
            $already_cart->quantity = $already_cart->quantity + $quant;
            $already_cart->amount = ($product->price * $quant) + $already_cart->amount;

            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) {
                return back()->with('error', 'Stock not sufficient!.');
            }

            $already_cart->save();

        } else {

            $cart = new Cart();
            $cart->user_id = request()->ip();
            $cart->product_id = $product->id;
            $cart->price = ($product->price - ($product->price * $product->discount) / 100);
            $cart->quantity = $quant;
            $cart->amount = ($product->price * $quant);
            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) {
                return back()->with('error', 'Stock not sufficient!.');
            }
            // return $cart;
            $cart->save();
        }
        session()->flash('success', 'Product successfully added to cart.');
        return back();
    }

    public function cartDelete(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success', 'Cart successfully removed');
            return back();
        }
        request()->session()->flash('error', 'Error please try again');
        return back();
    }

    public function cartUpdate(Request $request)
    {

        if($request->quant) {
            $error = array();
            $success = '';

            foreach ($request->quant as $k => $quant) {
                // return $k;
                $id = $request->qty_id[$k];
                // return $id;
                $cart = Cart::find($id);
                // return $cart;
                if($quant > 0 && $cart) {
                    // return $quant;

                    if($cart->product->stock < $quant) {
                        request()->session()->flash('error', 'Out of stock');
                        return back();
                    }
                    $cart->quantity = ($cart->product->stock > $quant) ? $quant : $cart->product->stock;
                    // return $cart;

                    if ($cart->product->stock <= 0) {
                        continue;
                    }
                    $after_price = ($cart->product->price - ($cart->product->price * $cart->product->discount) / 100);
                    $cart->price = $after_price * $quant;
                    // return $cart->unit_price;
                    $cart->save();
                    $success = 'Cart successfully updated!';
                } else {
                    $error[] = 'Cart Invalid!';
                }
            }
            return back()->with($error)->with('success', $success);
        } else {
            return back()->with('Cart Invalid!');
        }
    }

    public function checkout(Request $request)
    {

        if(empty(Cart::where('user_id', request()->ip())->where('order_id', null)->first())) {
            session()->flash('error', 'Cart is Empty !');
            return redirect()->route('home');
        } else {
            $address = Address::with(['state','country'])->where('user_id', Auth::id())->get();
            $countries = Country::all();
            $states = State::all();

            $integerations = Integration::where('method', 'stripe')->first();

            // Stripe Checkout Session
            $carts = Cart::with(['product'])->where('user_id', request()->ip())->where('order_id', null)->get();
            $meta = [];
            foreach($carts as $i => $cart):
                $meta[] =  [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $i == 0 ? $cart->price * 100 + $carts->sum('tax') * 100 : $cart->price * 100,
                        'product_data' => [
                            'name' => $cart->product->title,
                        ]
                    ],

                    'quantity' => $cart->quantity,
                ];
            endforeach;

            if($integerations) {
                Stripe::setApiKey($integerations->secret_key);
                $session = StripeSession::create([
                    'success_url' => route('paid.success', ['stripe']),
                    'cancel_url' => route('paid.error'),
                    'shipping_options' => [
                        [
                          'shipping_rate_data' => [
                            'type' => 'fixed_amount',
                            'fixed_amount' => [
                              'amount' => $carts->sum('shipping') * 100,
                              'currency' => 'usd',
                            ],
                            'display_name' => 'Shipping Cost',
                          ]
                        ],

                    ],
                    'line_items' => [
                        $meta
                    ],
                    'automatic_tax' => [
                        'enabled' => false,
                    ],
                    'mode' => 'payment',
                ]);
            } else {
                $session = new stdClass();
            }

            return view('frontend.pages.checkout', get_defined_vars());
        }
    }
}
