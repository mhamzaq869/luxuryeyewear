<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Brand;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportCategory;
use App\Exports\ExportCategory;

class CategoryController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        $data['categories'] = Category::getAllCategory();
        $sunglass = Attribute::where('attribute_type', 'frame_type')->where('name', 'Sunglasses')->first();
        $eyeglass = Attribute::where('attribute_type', 'frame_type')->where('name', 'Eyeglasses')->first();
        $data['total_sunglass'] = Category::where('frame_type', $sunglass->id)->count();
        $data['total_eyeglass'] = Category::where('frame_type', $eyeglass->id)->count();

        // return $category;
        return view('backend.category.index', get_defined_vars());
    }
    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        $data['parent_cats'] = Category::where('is_parent', 1)->orderBy('title', 'ASC')->get();
        $data['brands'] = Brand::get();
        $data['frame_types'] = Attribute::where('attribute_type', 'frame_type')->get();

        return view('backend.category.create', $data);
    }
    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
        // echo "<pre>"; print_r($request->all()); die;
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|nullable',
            // 'photo'=>'string|nullable',
            'status' => 'required|in:active,inactive',
            'is_parent' => 'sometimes|in:1',

        ]);

        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = Category::where('slug', $slug)->count();
        if ($count > 0) {
            request()->session()->flash('error', 'Duplicate category entry!, Please try again!');
            return redirect()->route('category.index');
        }
        $data['slug'] = $slug;
        $data['size'] = json_encode($request->size);
        $data['is_parent'] = $request->input('is_parent', 0);
        // return $data;
        $status = Category::create($data);
        if ($status) {
            request()->session()->flash('success', 'Category successfully added');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('category.index');
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

        $parent_cats = Category::where('is_parent', 1)->get();
        $category = Category::findOrFail($id);
        $brands = Brand::get();
        $frame_types = Attribute::where('attribute_type', 'frame_type')->get();
        return view('backend.category.edit')->with('category', $category)->with('parent_cats', $parent_cats)->with('brands', $brands)->with('frame_types', $frame_types);
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
        // print_r($request->all()); die;

        $category = Category::findOrFail($id);
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|nullable',
            'photo' => 'string|nullable',
            'status' => 'required|in:active,inactive',
            'is_parent' => 'sometimes|in:1',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = Category::where('slug', $slug)->count();

        if ($count > 0) {

            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }

        $data['slug'] = $slug;
        $data['size'] = json_encode($request->size);

        $data['is_parent'] = $request->input('is_parent', 0);

        // return $data;

        $status = $category->fill($data)->save();

        if ($status) {

            request()->session()->flash('success', 'Category successfully updated');
        } else {

            request()->session()->flash('error', 'Error occurred, Please try again!');
        }

        return redirect()->route('category.index');
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {
        $category = Category::findOrFail($id);
        if($category->products->count() > 0){
            request()->session()->flash('error', 'Please remove related products first!');
        }else{
            $child_cat_id = Category::where('parent_id', $id)->pluck('id');
            $status = $category->delete();

            if ($status) {
                if (count($child_cat_id) > 0) {
                    Category::shiftChild($child_cat_id);
                }
                request()->session()->flash('success', 'Category successfully deleted');
            } else {
                request()->session()->flash('error', 'Error while deleting category');
            }
        }

        return redirect()->route('category.index');
    }


    public function getByBrand(Request $request)
    {

        $category = Category::where('brand_id', $request->id)->get();

        if (count($category) <= 0) {
            return response()->json(['status' => false, 'msg' => '', 'data' => null]);
        } else {
            return response()->json(['status' => true, 'msg' => '', 'data' => $category]);
        }
    }

    public function showDatatableDataCat(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        //  dd($draw);
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        if($columnName_arr[$columnIndex]['data'] == 'model_number'){
            $columnName_arr[$columnIndex]['data'] = 'title';
        }else if($columnName_arr[$columnIndex]['data'] == 'brand'){
            $columnName_arr[$columnIndex]['data'] = 'brand_id';
        }

        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value



        // Total records
        $totalRecords = Category::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Category::select('count(*) as allcount')
            ->where('title', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = Category::orderBy($columnName, $columnSortOrder)
            ->join('brands', 'brands.id', '=', 'categories.brand_id')
            ->join('attributes', 'attributes.id', '=', 'categories.frame_type')
            ->where('categories.title', 'like', '%' . $searchValue . '%')
            ->orWhere('brands.title', 'like', '%' . $searchValue . '%')
            ->orWhere('attributes.name', 'like', '%' . $searchValue . '%')
            ->select('categories.*', 'brands.id as brandId', 'brands.title as brandTitle', 'attributes.name as frameTypeName')
            ->skip($start)
            ->take($rowperpage)
            ->get();


        $data_arr = array();

        foreach ($records as $i => $record) {
            $data_arr[] = array(
                "id" => $i + 1 ?? '',
                "checkbox" => '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input cust-checkbox" onclick="singleCheck('.$record->id.')" id="check' . $record->id . '" value="' . $record->id . '" name="checked[]">
                                    <label class="custom-control-label" for="check' . $record->id . '"></label>
                                </div>',

                "brand" => $record->brand->title ?? '',
                "model_number" => $record->title ?? '',
                "frame_type" => Attribute::find($record->frame_type)->name ?? '',
                "status" => '<span class="badge badge-success">' . $record->status . '</span>' ?? '',
                "action" => '<a href="' . url('/admin/category/') . '/' . $record->id . '/edit" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                            <a href="' . url('/admin/categories/') . '/' . $record->id . '/delete" class="btn btn-danger btn-sm dltBtn" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>',

            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response($response);
    }

    public function getChildByParent(Request $request)
    {

        // return $request->all();

        $category = Category::findOrFail($request->id);

        $child_cat = Category::getChildByParentID($request->id);

        // return $child_cat;

        if (count($child_cat) <= 0) {

            return response()->json(['status' => false, 'msg' => '', 'data' => null]);
        } else {

            return response()->json(['status' => true, 'msg' => '', 'data' => $child_cat]);
        }
    }
    /**

     * Show the form for import category.

     *

     * @return \Illuminate\Http\Response

     */

    public function getCategoryImport()
    {
        return view('backend.category.import');
    }

    /**

     * Store import category.

     *

     * @return \Illuminate\Http\Response

     */

    public function saveCategoryImport(Request $request)
    {

        Excel::import(new ImportCategory, $request->file('file')->store('files'));

        request()->session()->flash('success', 'Category Import Successfully!');

        return redirect()->route('category.index');
    }
    public function exportCategory($type = null)
    {
        return Excel::download(new ExportCategory($type), 'Category.xlsx');
    }


    public function categoriesDelete(Request $request)
    {

        if (isset($request->single_check)) {
            $category = Category::findOrFail($request->single_check);

            if($category->products->count() > 0){
                request()->session()->flash('error', 'Please remove related products first!');
            }else{
                $category->delete();
                request()->session()->flash('success', 'Category successfully deleted');
            }
        } else {
            $category =  Category::whereIn('id', $request->checked);

            foreach($category->get() as $category){
                if($category->products->count() > 0){
                    request()->session()->flash('error', 'Please remove related products first!');
                }else{
                    $category->delete();
                    request()->session()->flash('success', 'Category successfully deleted');
                }
            }
        }

        return redirect()->route('category.index');
    }
}
