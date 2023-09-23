<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Brand;
use Image;
use Illuminate\Support\Str;

class BrandController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $brand = Brand::orderBy('title', 'DESC')->get();
        return view('backend.brand.index')->with('brands', $brand);
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('backend.brand.create');
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
            'title' => 'string|required',
            'brand_image' => 'required ',
        ]);

        $data = $request->all();


        $slug = Str::slug($request->title);
        $count = Brand::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }

        if ($request->file('brand_img')) {
            $img = uploadImage($request->brand_img, '/frontend/img/brand/');
            $data['brand_image'] = $img;
        } else {
            if ($request->has('brand_image')) {
                $fileName = time() . '.' . $request->brand_image->extension();
                $path = 'frontend/img/brand/';
                $fullpath = '/frontend/img/brand/' . $fileName;
                $request->brand_image->move($path, $fileName);
                $data['brand_image'] = $fullpath;
            }
        }

        $data['slug'] = $slug;
        $data['url'] = '';
        unset($data['brand_img']);
        $status = Brand::create($data);

        if ($status) {
            request()->session()->flash('success', 'Brand successfully created');
        } else {

            request()->session()->flash('error', 'Error, Please try again');
        }

        return redirect()->route('brand.index');
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

        $brand = Brand::find($id);

        if (!$brand) {

            request()->session()->flash('error', 'Brand not found');
        }

        return view('backend.brand.edit')->with('brand', $brand);
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

        $this->validate($request, ['title' => 'string|required']);
        $old_img = Brand::find($id);
        $del_image = $old_img->brand_image;

        $brand = Brand::find($id);
        $make_slug = strtolower(str_replace(' ', '-', $request->title));

        if($brand->slug != $make_slug){
            $brand['slug'] = $make_slug;
        }else{
            $brand['slug'] = $brand->slug;
        }


        $data = $request->all();
        if ($request->has('brand_img') && $request->brand_img != null) {

            $img = uploadImage($request->brand_img, '/upload/brand/crop/');
            $data['brand_image'] = $img;
            if (file_exists($del_image)) {
                unlink($del_image);
            }
        } else {
            if ($request->hasFile('brand_image')) {
                $fileName = time() . '.' . $request->brand_image->extension();
                $fullpath = '/upload/brand/full/' . $fileName;
                $request->brand_image->move('upload/brand/full/', $fileName);
                $data['brand_image'] = $fullpath;
                if (file_exists($del_image)) {
                    unlink($del_image);
                }
            }
        }

        $data['url'] = '';
        unset($data['brand_img']);
        $status = $brand->fill($data)->save();

        if ($status) {
            request()->session()->flash('success', 'Brand successfully updated');
        } else {
            request()->session()->flash('error', 'Error, Please try again');
        }

        return redirect()->route('brand.index');
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {
        $old_img = Brand::find($id);
        $del_image = $old_img->brand_image;
        $rem = public_path($del_image);

        if (file_exists($rem)) {
            unlink($rem);
        }
        $brand = Brand::find($id);

        if ($brand) {

            $status = $brand->delete();

            if ($status) {

                request()->session()->flash('success', 'Brand successfully deleted');
            } else {

                request()->session()->flash('error', 'Error, Please try again');
            }

            return redirect()->route('brand.index');
        } else {

            request()->session()->flash('error', 'Brand not found');

            return redirect()->back();
        }
    }
    // ============================ Acyive ==========================
    public function active_brands($id)
    {
        $activeedata = Brand::find($id);
        $activeedata->status = 'active';
        $activeedata->save();
        return redirect()->back()->with('success', 'Brand Status Active successfully');
    }
    // ============================ Inactive ==========================
    public function inactive_brands($id)
    {
        $activeedata = Brand::find($id);
        $activeedata->status = 'inactive';
        $activeedata->save();
        return redirect()->back()->with('error', 'Brand Status Inactive successfully');
    }
}
