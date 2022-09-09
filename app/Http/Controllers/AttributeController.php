<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Str;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes =Attribute::getAllattribute();
        return view('backend.attribute.index')->with('attributes',$attributes );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required',
            'attribute_type'=>'string|nullable',
        ]);
        $data= $request->all();
        $status=Attribute::create($data);
        if($status){
            request()->session()->flash('success','Attribute successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('attribute.index');


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
        $attribute=Attribute::findOrFail($id);
        return view('backend.attribute.edit')->with('attribute',$attribute);
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
        $attribute=Attribute::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'attribute_type'=>'string|required',
        ]);
        $data= $request->all();
        $status=$attribute->fill($data)->save();
        if($status){
            request()->session()->flash('success','Attribute successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute=Attribute::findOrFail($id);
        // return $child_cat_id;
        $status=$attribute->delete();

        if($status){
            request()->session()->flash('success','Attribute successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting attribute');
        }
        return redirect()->route('attribute.index');
    }

}
