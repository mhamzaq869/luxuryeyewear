<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductColor;
use Illuminate\Support\Str;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productColors =ProductColor::paginate(15);
        return view('backend.product-color.index')->with('productColors',$productColors );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product-color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'color_name'=>'string|required',
            'color_image_name'=>'string|nullable',
        ]);
        $data= $request->all();
        dd($data);
        $status=ProductColor::create($data);
        if($status){
            request()->session()->flash('success','Product Color successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('product-color.index');


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
        $productColor=ProductColor::findOrFail($id);
        return view('backend.product-color.edit')->with('productColor',$productColor);
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
        // return $request->all();
        $productColor=ProductColor::findOrFail($id);
        $this->validate($request,[
            'color_name'=>'string|required',
            'color_image_name'=>'string|nullable',
        ]);
        $data= $request->all();
        $status=$productColor->fill($data)->save();
        if($status){
            request()->session()->flash('success','Product Color successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('product-color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productColor=ProductColor::findOrFail($id);

        $status=$productColor->delete();

        if($status){
            request()->session()->flash('success','Product Color successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product Color');
        }
        return redirect()->route('product-color.index');
    }
}
