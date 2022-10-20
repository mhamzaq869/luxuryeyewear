<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extra;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Extra = Extra::orderBy('id','DESC')->paginate(10);
        return view('backend.extra.index')->with('extras',$Extra);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = DB::table('countries')->get();
        return view('backend.extra.create',get_defined_vars());
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
            'type'=>'string|required',
            'price'=>'nullable|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $data['countries'] = implode(',',$data['countries']);
        $status= Extra::create($data);
        if($status){
            Session::flash('success','Extra successfully created');
        }
        else{
            Session::flash('error','Error, Please try again');
        }
        return redirect()->route('extra.index');
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
        $extra=Extra::find($id);
        if(!$extra){
            Session::flash('error','Extra not found');
        }
        $countries = DB::table('countries')->get();
        $extra->countries = explode(',',$extra->countries);
        return view('backend.extra.edit',get_defined_vars());
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
        $Extra=Extra::find($id);
        $this->validate($request,[
            'type'=>'string|required',
            'price'=>'nullable|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $data['countries'] = implode(',',$data['countries']);
        $status=$Extra->fill($data)->save();
        if($status){
            Session::flash('success','Extra successfully updated');
        }
        else{
            Session::flash('error','Error, Please try again');
        }
        return redirect()->route('extra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Extra = Extra::find($id);
        if($Extra){
            $status=$Extra->delete();
            if($status){
                Session::flash('success','Extra successfully deleted');
            }
            else{
                Session::flash('error','Error, Please try again');
            }
            return redirect()->route('extra.index');
        }
        else{
            Session::flash('error','Extra not found');
            return redirect()->back();
        }
    }
}
