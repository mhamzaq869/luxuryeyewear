<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Settings;
use App\Models\Shipping;
use App\User;
use PDF;
use Helper;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        $attributes = Attribute::where('attribute_type','order_status')->get();
        return view('backend.order.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if(empty(Cart::where('user_id',request()->ip())->where('order_id',null)->first())){
            request()->session()->flash('error','Cart is Empty !');

            $response['success'] = false;
            $response['status'] = 404;
            $response['message'] = 'Cart is Empty !';

            return response($response);
        }


        try{
            $order=new Order();
            $order_data = $request->all();
            $order_data['order_number'] = 'ORD-'.strtoupper(Str::random(10));
            $order_data['user_id'] = Auth::id();
            $order_data['shipping_id'] = $request->shipping;
            $shipping = $request->shipping;

            $order_data['sub_total'] = Helper::totalCartPrice();

            if(session('coupon')){
                $order_data['coupon']=session('coupon')['value'];
            }
            if($request->shipping){
                if(session('coupon')){
                    $order_data['total_amount']= Helper::totalCartPrice()+$shipping->session('coupon')['value'];
                }
                else{
                    $order_data['total_amount']= Helper::totalCartPrice()+$shipping;
                }
            }
            else{
                if(session('coupon')){
                    $order_data['total_amount']= Helper::totalCartPrice()->session('coupon')['value'];
                }
                else{
                    $order_data['total_amount']=Helper::totalCartPrice();
                }
            }

            $order_data['status']="new";

            $order->fill($order_data);
            $order->save();
            if($order)

            $users=User::where('role','admin')->first();
            $details=[
                'title'=>'You have new order',
                'actionURL'=>route('order.show',$order->id),
                'fas'=>'fa-file-alt'
            ];

            Notification::send($users, new StatusNotification($details));
            Cart::where('user_id', request()->ip())->where('order_id', null)->update(['order_id' => $order->id,'user_id' => Auth::id()]);

            Order::find($order->id)->update([
                'quantity' => Helper::cartCount()
            ]);
            // dd($users);
           session()->flash('success','Your product successfully placed in order');


            $response['success'] = true;
            $response['status'] = 200;
            $response['message'] = 'Your product successfully placed in order';

            return response($response);
        }catch(Exception $e){
            $response['success'] = false;
            $response['status'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        // return $order;
        return view('backend.order.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        return view('backend.order.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $data = $request->all();
        $status = $order->fill($data)->save();

        $attributes = Attribute::where('attribute_type','order_status')->get();
        foreach($attributes as $attribute):
            if($request->status == 'delivered'){
                foreach($order->cart as $cart){
                    $product=$cart->product;

                    $product->stock -=$cart->quantity;
                    $product->save();
                }
            }

            if(strtolower($request->status) == 'new'){
                $message = "Your order is confirmed!";
            }else{
                $message = "Your order has been ".$order->status;
            }

            $mail = new MailController;
            $mail->sendMail($order->user->email, "You have a new Order #".$order->order_number, view('frontend.mails.order',get_defined_vars())->render());

        endforeach;


        if($status){

            $response['message'] = 'Successfully updated order';
            $response['code'] = 200;
            $response['status'] = true;
            return response($response);

        }else{

            $response['message'] = 'Error while updating order';
            $response['code'] = 500;
            $response['status'] = false;
            return response($response);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        if($order){
            $status=$order->delete();
            if($status){
                request()->session()->flash('success','Order Successfully deleted');
            }
            else{
                request()->session()->flash('error','Order can not deleted');
            }
            return redirect()->route('order.index');
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }

    public function orderTrack(){
        return view('frontend.pages.order-track');
    }

    public function productTrackOrder(Request $request){
        // return $request->all();
        $order=Order::where('user_id',auth()->user()->id)->where('order_number',$request->order_number)->first();
        if($order){
            if($order->status=="new"){
            request()->session()->flash('success','Your order has been placed. please wait.');
            return redirect()->route('home');

            }
            elseif($order->status=="process"){
                request()->session()->flash('success','Your order is under processing please wait.');
                return redirect()->route('home');

            }
            elseif($order->status=="delivered"){
                request()->session()->flash('success','Your order is successfully delivered.');
                return redirect()->route('home');

            }
            else{
                request()->session()->flash('error','Your order canceled. please try again');
                return redirect()->route('home');

            }
        }
        else{
            request()->session()->flash('error','Invalid order numer please try again');
            return back();
        }
    }

    // PDF generate
    public function pdf(Request $request){
        $order=Order::getAllOrder($request->id);
        $setting = Settings::first();
        $file_name= $order->order_number.'-'.$order->first_name.'.pdf';

        $pdf= PDF::loadview('backend.order.pdf',compact('order','setting'));

        return $pdf->download($file_name);
    }
    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::with(['cart_info'])->whereYear('created_at',$year)->where('status','delivered')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->cart_info->sum('amount');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }

    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function paymentSuccess(Request $request,$type=null)
    {
        if(empty(Cart::where('user_id',request()->ip())->where('order_id',null)->first())){
            session()->flash('error','Cart is Empty !');

            $response['success'] = false;
            $response['status'] = 404;
            $response['message'] = 'Cart is Empty !';

            return response($response);
        }


        try{
            $order = new Order();
            $data = json_decode($_COOKIE['data'], true);

            $order_data = $data;
            $order_data['order_number'] = 'ORD-'.strtoupper(Str::random(10));
            $order_data['user_id'] = Auth::id();
            $order_data['shipping_id'] = $data['shipping_id'];
            $order_data['payment_status'] = 'paid';
            $shipping = $data['shipping_id'];

            $order_data['sub_total'] = Helper::totalCartPrice();

            if(session('coupon')){
                $order_data['coupon'] = session('coupon')['value'];
            }
            if($request->shipping){
                if(session('coupon')){
                    $order_data['total_amount'] = Helper::totalCartPrice() + $shipping + session('coupon')['value'];
                }
                else{
                    $order_data['total_amount'] = Helper::totalCartPrice() + $shipping;
                }
            }
            else{
                if(session('coupon')){
                    $order_data['total_amount'] = Helper::totalCartPrice() + session('coupon')['value'];
                }
                else{
                    $order_data['total_amount'] = Helper::totalCartPrice();
                }
            }

            $order_data['status']="new";

            $order->fill($order_data);
            $order->save();
            if($order)

            $users = User::where('role','admin')->first();
            $details=[
                'title'=>'You have new order',
                'actionURL'=> route('order.show',$order->id),
                'fas'=>'fa-file-alt'
            ];

            Notification::send($users, new StatusNotification($details));
            Cart::where('user_id', request()->ip())->where('order_id', null)->update(['order_id' => $order->id,'user_id' => Auth::id()]);

            Order::find($order->id)->update([
                'quantity' => Helper::cartCount()
            ]);

            $customer = User::find(Auth::id());
            $admin = User::where('role','admin')->first();
            $shipping = Shipping::find($order->shipping_id);

            $mail = new MailController;
            $mail->sendMail($customer->email, "You have made a Order #".$order->order_number, view('frontend.mails.new_order',get_defined_vars())->render());
            $mail->sendMail($admin->email, "You have a new Order #".$order->order_number, view('frontend.mails.admin_new_order',get_defined_vars())->render());


            session()->put('order_number',$order->id);
            session()->forget('coupon');
            return redirect()->route('user.order.completed');
        }catch(Exception $e){

            return redirect()->route('checkout')->with('error',$e->getMessage());
        }
    }

    /**
     * Error Handling.
     */
    public function paymentError()
    {
        return view('frontend.pages.order_failed');
    }
}
