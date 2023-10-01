<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping = Shipping::orderBy('id', 'DESC')->paginate(10);
        return view('backend.shipping.index')->with('shippings', $shipping);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = DB::table('countries')->get();
        return view('backend.shipping.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'string|required',
            'price' => 'nullable|numeric',
            'status' => 'required|in:active,inactive'
        ]);
        $data = $request->all();

        $data['countries'] = implode(',', $data['countries']);

        $data['transitfrom'] = $request->transitfrom;
        $data['transitto'] = $request->transitto;

        $status = Shipping::create($data);
        if($status) {
            session()->flash('success', 'Shipping successfully created');
        } else {
            session()->flash('error', 'Error, Please try again');
        }
        return redirect()->route('shipping.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping = Shipping::find($id);
        if(!$shipping) {
            session()->flash('error', 'Shipping not found');
        }

        $countries = DB::table('countries')->get();
        $shipping->countries = explode(',', $shipping->countries);
        return view('backend.shipping.edit', get_defined_vars());
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
        $shipping = Shipping::find($id);
        $this->validate($request, [
            'type' => 'string|required',
            'price' => 'nullable|numeric',
            'status' => 'required|in:active,inactive'
        ]);
        $data = $request->all();
        $data['countries'] = implode(',', $data['countries']);
        $data['transit'] = $request->transitfrom .' to '.$request->transitto;
        $status = $shipping->fill($data)->save();
        if($status) {
            session()->flash('success', 'Shipping successfully updated');
        } else {
            session()->flash('error', 'Error, Please try again');
        }
        return redirect()->route('shipping.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping = Shipping::find($id);
        if($shipping) {
            $status = $shipping->delete();
            if($status) {
                session()->flash('success', 'Shipping successfully deleted');
            } else {
                session()->flash('error', 'Error, Please try again');
            }
            return redirect()->route('shipping.index');
        } else {
            session()->flash('error', 'Shipping not found');
            return redirect()->back();
        }
    }
}
