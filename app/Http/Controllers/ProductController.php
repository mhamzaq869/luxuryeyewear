<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ImportProduct;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\PrescriptionData;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductNotify;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::getAllProduct();

        return view('backend.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brands'] = Brand::orderBy('title')->get();
        $data['categories'] = Category::where('is_parent', 1)->orderBy('title')->get();
        $data['types'] = Attribute::where('attribute_type', 'type')->get();
        $data['lensTypes'] = Attribute::where('attribute_type', 'lens_type')->get();
        $data['shapes'] = Attribute::where('attribute_type', 'shape')->get();
        $data['materials'] = Attribute::where('attribute_type', 'material')->get();
        $data['product_for'] = Attribute::where('attribute_type', 'product_for')->get();
        $data['countries'] = DB::table('countries')->get();
        $data['product_colors'] = ProductColor::get();

        $data['extras'] = Attribute::where('attribute_type', 'extra')->get();
        $data['leftSpheres'] = PrescriptionData::where('sph_left', '!=', '')->get();
        $data['leftcylinders'] = PrescriptionData::where('cyl_left', '!=', '')->get();

        return view('backend.product.create ', $data);
    }


    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required',
        ]);

        $data = $request->all();
        $images = [];

        if ($request->front_image != null) {
            $img = uploadImage($request->front_image);

            $data['p_f'] = $img;
            $data['photo'] = $img;
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {
                    if (isset($request->before_crop_image['front_image']) && $request->before_crop_image['front_image'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['front_image']->extension();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['front_image']->move($path, $fileName);
                        $data['p_f'] = $fullpath;
                        $data['photo'] = $fullpath;

                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.30);
                    }
                }
            }
        }



        if ($request->back_image != null) {
            $img2 = uploadImage($request->back_image);
            $data['p_b'] = $img2;
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {
                    if (isset($request->before_crop_image['back_image']) && $request->before_crop_image['back_image'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['back_image']->extension();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['back_image']->move($path, $fileName);
                        $data['p_b'] = $fullpath;
                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.25);
                    }
                }
            }
        }

        if ($request->g_image_1 != null) {
            $data['g_image_1'] =  uploadImage($request->g_image_2);
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {
                    if (isset($request->before_crop_image['g_image_1']) && $request->before_crop_image['g_image_1'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['g_image_1']->getClientOriginalName();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['g_image_1']->move($path, $fileName);
                        $data['g_image_1'] = $fullpath;

                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.25);
                    } else {
                        unset($data['g_image_1']);
                    }
                }
            } else {
                unset($data['g_image_1']);
            }
        }

        if ($request->g_image_2 != null) {
            $data['g_image_2'] =  uploadImage($request->g_image_2);
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {
                    if (isset($request->before_crop_image['g_image_2']) && $request->before_crop_image['g_image_2'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['g_image_2']->getClientOriginalName();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['g_image_2']->move($path, $fileName);
                        $data['g_image_2'] =  $fullpath;

                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.25);
                    } else {
                        unset($data['g_image_2']);
                    }
                }
            } else {
                unset($data['g_image_2']);
            }
        }

        if ($request->g_image_3 != null) {
            $data['g_image_3'] =  uploadImage($request->g_image_3);
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {
                    if (isset($request->before_crop_image['g_image_3']) && $request->before_crop_image['g_image_3'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['g_image_3']->getClientOriginalName();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['g_image_3']->move($path, $fileName);
                        $data['g_image_3'] = $fullpath;
                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.25);
                    } else {
                        unset($data['g_image_3']);
                    }
                }
            } else {
                unset($data['g_image_3']);
            }
        }




        $slug = Str::slug($request->title);
        $count = Product::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }


        $data['slug'] = $slug;

        $data['g_image'] = json_encode($images);
        $data['is_featured'] = $request->input('is_featured', 0);

        unset($data['files']);
        unset($data['front_image']);
        unset($data['back_image']);
        unset($data['before_crop_image']);

        if (!empty($data['dispatch_from'])) {
            $data['dispatch_from'] = implode(',', $data['dispatch_from']);
        }


        try {
            Product::create($data);
            session()->flash('success', 'Product Successfully added');
        } catch (Exception $e) {
            $errorCode = $e->getCode();
            if ($errorCode == '1062') {
                session()->flash('error', 'Duplicated Product EAN Code');
            } else {
                session()->flash('error', $e->getMessage());
            }
        }

        return redirect()->route('product.index');
    }


    /**
     * Summary of show
     * @param mixed $id
     * @return void
     */
    public function show($id)
    {
    }

    /**
     * Summary of showDatatableData
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function showDatatableData(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');


        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnName_arr = $request->get('columns');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index

        if ($columnName_arr[$columnIndex]['data'] == 'color_code') {
            $columnName_arr[$columnIndex]['data'] = 'color';
        } elseif ($columnName_arr[$columnIndex]['data'] == 'ean_code' || $columnName_arr[$columnIndex]['data'] == 'item_code') {
            $columnName_arr[$columnIndex]['data'] = 'product_ean_code';
        } elseif ($columnName_arr[$columnIndex]['data'] == 'brand') {
            $columnName_arr[$columnIndex]['data'] = 'brand_id';
        } elseif ($columnName_arr[$columnIndex]['data'] == 'category') {
            $columnName_arr[$columnIndex]['data'] = 'cat_id';
        }

        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value



        // Total records
        $totalRecords = Product::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Product::select('count(*) as allcount')
            ->where('title', 'like', '%' . $searchValue . '%')
            ->count();


        $brand = DB::table('brands')->where(DB::raw('lower(title)'), 'like', '%' . strtolower($searchValue) . '%')->first();

        // Fetch records
        DB::enableQueryLog();
        $records = Product::orderBy($columnName, $columnSortOrder)
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('categories', 'categories.id', '=', 'products.cat_id')
            ->join('attributes', 'attributes.id', '=', 'categories.frame_type')
            ->where('products.title', 'like', '%' . $searchValue . '%')
            ->orWhere('attributes.name', 'like', '%' . $searchValue . '%')
            ->orWhere('products.product_ean_code', 'like', '%' . $searchValue . '%')
            ->orWhere('products.price', 'like', '%' . $searchValue . '%')
            ->orWhere('products.status', 'like', '%' . $searchValue . '%')
            ->orWhere('products.discount', 'like', '%' . $searchValue . '%')
            ->select('products.*', 'brands.id as brandId', 'categories.title as categoryTitle', 'brands.title as brandTitle', 'attributes.name as frameTypeName')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];

        foreach ($records as $i => $record) {
            if ($record->is_featured == 1) {
                $badge = '<div class="text-center mt-2"><span class="badge badge-pill badge-warning text-danger">Top</span></div>';
            } else {
                $badge = '';
            }


            if (!isValidUrl($record->photo)) {
                if ($record->photo != null) {
                    $photo = '<img src="' . asset(insertAtPosition($record->photo)) . '" class="img-fluid " style="max-width:80px"  alt="' . $record->photo . '">' . $badge ?? '';
                } else {
                    $photo = '<img src="' . asset("/images/no_image.jpg") . '" class="img-fluid " style="max-width:80px"  alt="">' . $badge ?? '';
                }
            } else {
                $photo = '<img src="' . $record->photo . '" class="img-fluid " style="max-width:80px"  alt="">' . $badge ?? '';
            }

            if ($record->status == 'active') {
                $status = '<span class="text-success"><b>' . $record->status . '</b></span>';
            } elseif ($record->status == 'outofstock') {
                $status = '<span class="text-danger"><b>' . ucfirst($record->status) . '</b></span>';
            } else {
                $status = '<span class="text-warning"><b>' . $record->status . '</b></span>';
            }

            $data_arr[] = array(
                "id" => $i + 1 ?? '',
                "checkbox" => '<div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input cust-checkbox" onclick="singleCheck(' . $record->id . ')" id="check' . $record->id . '" value="' . $record->id . '" name="checked[]">
                                      <label class="custom-control-label" for="check' . $record->id . '"></label>
                                  </div>',

                "photo" => $photo,
                "frame_type" => $record->frameTypeName ?? '',
                "title" => "<a target='_blank' href=" . url('product-detail/' . $record->slug) . ">" . $record->title ?? '',
                "brand" => $record->brand->title ?? '',
                "category" => $record->cat_info->title ?? '',
                "color_code" => $record->color ?? '',
                "item_code" => $record->product_ean_code ?? '',
                "discount" => '%' . $record->discount ?? '',
                "stock" => $record->stock ?? '',
                "price" => '$' . $record->admin_product_price ?? '',
                "status" => $status,
                "action" => '<a href="' . url("/admin/product/") . '/' . $record->id . '/edit" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <a href="' . url("/admin/product/") . '/' . $record->id . '/delete" class="btn btn-danger btn-sm dltBtn" data-id="' . $record->id . '" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>',

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

    /**
     * Summary of outOfStock
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function outOfStock()
    {
        $products = ProductNotify::all();
        return view('backend.product.outofstock', get_defined_vars());
    }

    /**
     * Summary of showOutOfStockTable
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function showOutOfStockTable(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');


        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnName_arr = $request->get('columns');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index

        if ($columnName_arr[$columnIndex]['data'] == 'color_code') {
            $columnName_arr[$columnIndex]['data'] = 'color';
        } elseif ($columnName_arr[$columnIndex]['data'] == 'ean_code' || $columnName_arr[$columnIndex]['data'] == 'item_code') {
            $columnName_arr[$columnIndex]['data'] = 'product_ean_code';
        } elseif ($columnName_arr[$columnIndex]['data'] == 'brand') {
            $columnName_arr[$columnIndex]['data'] = 'brand_id';
        } elseif ($columnName_arr[$columnIndex]['data'] == 'category') {
            $columnName_arr[$columnIndex]['data'] = 'cat_id';
        }

        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value



        // Total records
        $totalRecords = ProductNotify::select('count(*) as allcount')->count();
        $totalRecordswithFilter = ProductNotify::select('count(*) as allcount')
            ->join('products', 'product_notifies.product_id', '=', 'products.id')
            ->select('products.*', 'product_notifies.product_id', 'product_notifies.email')
            ->where('title', 'like', '%' . $searchValue . '%')
            ->count();

        $brand = DB::table('brands')->where('title', $searchValue)->first();
        // Fetch records
        $records = ProductNotify::orderBy($columnName, $columnSortOrder)
            ->join('products', 'product_notifies.product_id', '=', 'products.id')
            ->where('products.title', 'like', '%' . $searchValue . '%')
            ->orWhere('products.price', 'like', '%' . $searchValue . '%')
            ->orWhere('products.status', 'like', '%' . $searchValue . '%')
            ->orWhere('products.brand_id', 'like', '%' . $brand->id ?? 0 . '%')
            ->orWhere('product_notifies.email', 'like', '%' . $searchValue . '%')
            ->select('products.*', 'product_notifies.product_id', 'product_notifies.email')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $i => $record) {
            if ($record->is_featured == 1) {
                $badge = '<div class="text-center mt-2"><span class="badge badge-pill badge-warning text-danger">Top</span></div>';
            } else {
                $badge = '';
            }


            if (!isValidUrl($record->photo)) {
                if ($record->photo != null) {
                    $photo = '<img src="' . asset(insertAtPosition($record->photo)) . '" class="img-fluid " style="max-width:80px"  alt="' . $record->photo . '">' . $badge ?? '';
                } else {
                    $photo = '<img src="' . asset("/images/no_image.jpg") . '" class="img-fluid " style="max-width:80px"  alt="">' . $badge ?? '';
                }
            } else {
                $photo = '<img src="' . $record->photo . '" class="img-fluid " style="max-width:80px"  alt="">' . $badge ?? '';
            }

            if ($record->status == 'active') {
                $status = '<span class="badge badge-success">' . $record->status . '</span>';
            } elseif ($record->status == 'outofstock') {
                $status = '<span class="badge badge-danger">' . ucfirst($record->status) . '</span>';
            } else {
                $status = '<span class="badge badge-warning">' . $record->status . '</span>';
            }

            $data_arr[] = array(
                "id" => $i + 1 ?? '',
                "photo" => $photo,
                "title" => "<a target='_blank' href=" . url('product-detail/' . $record->slug) . ">" . $record->title ?? '',
                "stock" => $record->stock ?? '',
                "price" => '$' . $record->price ?? '',
                "status" => $status,
                "email" => $record->email,
                "action" => '<a href="' . url("/admin/product-request") . '/' . $record->product_id . '/delete" class="btn btn-danger btn-sm dltBtn" data-id="' . $record->id . '" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>',

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

    /**
     * Summary of edit
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

        $brand = Brand::orderBy('title')->get();


        $product = Product::findOrFail($id);

        $category = Category::where('is_parent', 1)->orderBy('title')->get();

        $items = Product::where('id', $id)->get();


        $edit_data['types'] = Attribute::where('attribute_type', 'type')->get();
        $edit_data['lensTypes'] = Attribute::where('attribute_type', 'lens_type')->get();
        $edit_data['shapes'] = Attribute::where('attribute_type', 'shape')->get();
        $edit_data['materials'] = Attribute::where('attribute_type', 'material')->get();
        $edit_data['product_for'] = Attribute::where('attribute_type', 'product_for')->get();
        $edit_data['product_colors'] = ProductColor::get();
        $edit_data['extras'] = Attribute::where('attribute_type', 'extra')->get();
        $edit_data['leftSpheres'] = PrescriptionData::where('sph_left', '!=', '')->get();
        $edit_data['leftcylinders'] = PrescriptionData::where('cyl_left', '!=', '')->get();
        $edit_data['rightcylinders'] = PrescriptionData::where('cyl_right', '!=', '')->get();

        $edit_data['countries'] = DB::table('countries')->get();
        $product->countries = explode(',', $product->countries);
        $product->dispatch_from = explode(',', $product->dispatch_from);

        return view('backend.product.edit', $edit_data)->with('product', $product)

            ->with('brands', $brand)

            ->with('categories', $category)->with('items', $items);
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

        $product = Product::findOrFail($id);

        $this->validate($request, [
            'title' => 'string|required',
        ]);

        $all_imgs = json_decode($product->g_image);
        $images = [];
        $data = $request->all();


        if ($request->front_image != null) {
            $img = uploadImage($request->front_image);
            $data['p_f'] = $img;
            $data['photo'] = $img;
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {
                    if (isset($request->before_crop_image['front_image']) && $request->before_crop_image['front_image'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['front_image']->getClientOriginalName();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['front_image']->move($path, $fileName);
                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.25);

                        $data['p_f'] = $fullpath;
                        $data['photo'] = $fullpath;
                    }
                }
            } else {
                unset($data['front_image']);
            }
        }


        if ($request->back_image != null) {
            $img2 = uploadImage($request->back_image);
            $data['p_b'] = $img2;
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {
                    if (isset($request->before_crop_image['back_image']) && $request->before_crop_image['back_image'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['back_image']->getClientOriginalName();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['back_image']->move($path, $fileName);
                        $data['p_b'] = $fullpath;
                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.25);
                    }
                }
            } else {
                unset($data['back_image']);
            }
        }



        if ($request->g_image_1 != null) {

            $data['g_image_1'] =  uploadImage($request->g_image_1);
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {

                    if (isset($request->before_crop_image['g_image_1']) && $request->before_crop_image['g_image_1'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['g_image_1']->getClientOriginalName();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['g_image_1']->move($path, $fileName);
                        $data['g_image_1'] = $fullpath;

                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.25);
                    } else {
                        unset($data['g_image_1']);
                    }
                }
            } else {
                unset($data['g_image_1']);
            }
        }



        if ($request->g_image_2 != null) {
            $data['g_image_2'] =  uploadImage($request->g_image_2);
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {
                    if (isset($request->before_crop_image['g_image_2']) && $request->before_crop_image['g_image_2'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['g_image_2']->getClientOriginalName();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['g_image_2']->move($path, $fileName);
                        $data['g_image_2'] =  $fullpath;
                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.25);
                    } else {
                        unset($data['g_image_2']);
                    }
                }
            } else {

                unset($data['g_image_2']);
            }
        }

        if ($request->g_image_3 != null) {
            $data['g_image_3'] =  uploadImage($request->g_image_3);
        } else {
            if ($request->has('before_crop_image')) {
                if ($request->before_crop_image) {
                    if (isset($request->before_crop_image['g_image_3']) && $request->before_crop_image['g_image_3'] != null) {
                        $fileName = rand(1, 50) . '_' . $request->before_crop_image['g_image_3']->getClientOriginalName();
                        $path = 'upload/product/full/';
                        $fullpath = '/upload/product/full/' . $fileName;
                        $moved = $request->before_crop_image['g_image_3']->move($path, $fileName);
                        $data['g_image_3'] = $fullpath;
                        $compressfullpath = '/upload/product/full/compress/' . $fileName;
                        $compressmedfullpath = '/upload/product/full/med-compress/' . $fileName;
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressfullpath, 0.05);
                        compressImage(public_path() . $fullpath, $moved->getRealPath(), public_path() . $compressmedfullpath, 0.25);
                    } else {
                        unset($data['g_image_3']);
                    }
                }
            } else {
                $images[] =  $all_imgs[2] ?? '';
                unset($data['g_image_3']);
            }
        }

        $data['is_featured'] = $request->input('is_featured', 0);

        unset($data['front_image']);
        unset($data['back_image']);
        unset($data['images']);
        unset($data['before_crop_image']);

        if (!empty($data['dispatch_from'])) {
            $data['dispatch_from'] = implode(',', $data['dispatch_from']);
        }


        try {
            $status = $product->fill($data)->save();
            session()->flash('success', 'Product Successfully updated');
        } catch (Exception $e) {
            $errorCode = $e->getCode();
            if ($errorCode == '1062') {
                session()->flash('error', 'Duplicated Product EAN Code');
            } else {
                session()->flash('error', $e->getMessage());
            }
        }

        return redirect()->route('product.index');
    }




    /**
     * Summary of destroy
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        $status = $product->delete();

        if ($status) {

            session()->flash('success', 'Product successfully deleted');
        } else {

            session()->flash('error', 'Error while deleting product');
        }

        return redirect()->route('product.index');
    }

    /**
     * Summary of destroyRequest
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function destroyRequest($id)
    {

        $product = ProductNotify::findOrFail($id);
        $status = $product->delete();

        if ($status) {

            session()->flash('success', 'Request successfully deleted');
        } else {

            session()->flash('error', 'Error while deleting product');
        }

        return redirect()->route('product.out.of.stock');
    }


    /**
     * Summary of getProductImport
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getProductImport()
    {

        return view('backend.product.import');
    }


    /**
     * Summary of saveProductImport
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function saveProductImport(Request $request)
    {
        try {
            DB::beginTransaction();

            $fileName = $request->file('file')->getClientOriginalName();
            $path = 'upload/import/files/';
            $moved = $request->file('file')->move($path, $fileName);

            Excel::import(new ImportProduct(), $moved->getRealPath());

            if (File::exists(public_path($path . $fileName))) {
                File::delete(public_path($path . $fileName));
            }
            DB::commit();
            session()->flash('success', 'Product Import Successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            $errorCode = $e->getCode();
            if ($errorCode == '1062') {
                session()->flash('error', $e->getCode());
            } else {
                session()->flash('error', $e->getMessage());
            }
        }
        return redirect()->route('product.index');
    }


    /**
     * Summary of ProductExport
     * @param mixed $type
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function ProductExport($type = null)
    {
        ini_set('max_execution_time', 0);
        ini_set("memory_limit", -1);

        return Excel::download(new ProductExport($type), 'product.xlsx');
    }

    /**
     * Summary of productUpdate
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function productUpdate(Request $request)
    {

        if ($request->type == 'delete') {
            foreach ($request->data as $id) {
                $product = Product::findOrFail($id);
                $product->delete();
            }

            $response['status'] = 200;
            $response['message'] = 'Product Successfully deleted';
            return response($response);
        }

        if ($request->type == 'dublicate') {

            foreach ($request->data as $id) {
                $product = Product::findOrFail($id);
                $new_data = $product->replicate();
                $new_data->created_at = now();
                $new_data->slug = $product->slug . '-' . date("H-i-s-Y-m-d");
                ;
                $new_data->save();
            }

            $response['status'] = 200;
            $response['message'] = 'Product Dublicate Successfully';
            return response($response);
        }


        if ($request->type == 'update-status') {
            foreach ($request->data as $i => $id) {
                $product = Product::findOrFail($id);
                $product[$request->key] = $request->value;
                $product->save();
            }

            $response['status'] = 200;
            $response['message'] = 'Product ' . ucfirst($request->key) . ' Updated Successfully';
            return response($response);
        }

        $response['status'] = 400;
        $response['message'] = 'Product Not Updated Successfully';

        return response($response);
    }

    /**
     * Summary of deleteImage
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteImage(Request $request)
    {

        Product::find($request->id)->update([
            $request->col => $request->data,
        ]);

        $response['status'] = 200;
        $response['message'] = "Image Deleted Successfully!";
        return response($response);
    }



    /**
     * Summary of productCronJob
     * @return string
     */
    public function productCronJob()
    {
        $products = Product::where('stock', 0)->orWhere('photo', null)->orWhere('price', 0)->get();

        foreach ($products as $product) {
            $product->status = 'inactive';
            $product->save();
        }

        return "Product Status Changed";
    }
}
