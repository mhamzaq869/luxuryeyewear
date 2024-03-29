<?php

namespace App\Exports;

use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
     * Summary of type
     * @var
     */
    protected $type;

    /**
     * Summary of __construct
     * @param mixed $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = [];
        $attributes = DB::table('attributes')->get();
        $products = DB::table('products')->get();
        $category = DB::table('categories')->where('status', 'active')->get();
        $brands = DB::table('brands')->where('status', 'active')->get();

        if($this->type == null):
            foreach($products as $i => $product) {
                $data[$i]['id'] = $product->product_uan_code;
                $data[$i]['ean'] = $product->product_ean_code;
                $data[$i]['asin'] = $product->asin;
                $data[$i]['category'] = $attributes->where('id', $category->where('id', $product->cat_id)->first()->frame_type ?? '')->first()->name ?? '';
                $data[$i]['brand'] = $brands->where('id', $product->brand_id)->first()->title ?? '';
                $data[$i]['model'] = $product->title;
                $data[$i]['color'] = $product->color;
                $data[$i]['color_description'] = $product->color_description;
                $data[$i]['size'] = $product->size;
                $data[$i]['b2b_price'] = $product->b2b_price != null ? $product->b2b_price : 0;
                $data[$i]['mrp'] = $product->unit_price ?? 0;
                $data[$i]['selling_price'] = $product->price != null ? $product->price : 0;
                $data[$i]['stock'] = $product->stock ?? 0;
                $data[$i]['shape'] = $attributes->where('id', $product->shape)->first()->name ?? '';
                $data[$i]['type'] = $product->type != null ? $attributes->where('id', $product->type)->first()->name ?? '' : '';
                $data[$i]['lense'] = $product->lense_type != null ? $attributes->where('id', $product->lense_type)->first()->name ?? '' : '';
                $data[$i]['material'] = $attributes->where('id', $product->product_material)->first()->name ?? '';
                $data[$i]['gender'] = $attributes->where('id', $product->product_for)->first()->name ?? '';
                $data[$i]['status'] = $product->status;
                $data[$i]['width'] = $product->product_total_width;
                $data[$i]['bridge'] = $product->product_bridge;
                $data[$i]['arm_length'] = $product->product_arm_length;
                $data[$i]['arm_height'] = $product->product_lens_height;
                $data[$i]['total_width'] = $product->product_total_width;
                $data[$i]['total_width'] = $product->product_total_width;
                $data[$i]['region'] = $product->country_of_origin;
                $data[$i]['dispatch'] = $product->dispatch_from;
                $data[$i]['img1'] = !isValidUrl($product->p_f) ? request()->getSchemeAndHttpHost().$product->p_f : $product->p_f ;
                $data[$i]['img2'] = !isValidUrl($product->p_b) ? request()->getSchemeAndHttpHost().$product->p_b : $product->p_b ;
                $data[$i]['img3'] = !isValidUrl($product->g_image_1) ? request()->getSchemeAndHttpHost().$product->g_image_1 : $product->g_image_1;
                $data[$i]['img4'] = !isValidUrl($product->g_image_2) ? request()->getSchemeAndHttpHost().$product->g_image_1 : $product->g_image_1;
                $data[$i]['img5'] = !isValidUrl($product->g_image_3) ? request()->getSchemeAndHttpHost().$product->g_image_1 : $product->g_image_1;

            }
        endif;
        return collect($data);
    }

    public function headings(): array
    {
        return ["Item Code",
                "EAN Code",
                "Asin",
                "Category",
                "Brands",
                "Model",
                "Colour",
                "Colour Description",
                "Size",
                "B2B Price",
                "MRP",
                "Selling Price",
                "QTY",
                "Shape",
                "Product Type",
                "Lense Type",
                "Material",
                "Gender",
                "Status",
                "Width",
                "Brigde",
                "Arm Length",
                "Lens Height",
                "Total Width",
                "Country Of Region",
                "Dispatch From",
                "Image1",
                "Image2",
                "Image3",
                "Image4",
                "Image5",
            ];
    }
}
