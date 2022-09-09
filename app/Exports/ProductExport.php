<?php

namespace App\Exports;

use App\Models\Attribute;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    protected $type;

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
        if($this->type == null):
            foreach(Product::all() as $i => $product){
                $data[$i]['id'] = $product->id;
                $data[$i]['ean'] = $product->product_ean_code;
                $data[$i]['category'] = $product->cat_info != null ? $product->cat_info->title : '';
                $data[$i]['brand'] = $product->brand != null ? $product->brand->name : '';
                $data[$i]['model'] = $product->title;
                $data[$i]['color'] = $product->color;
                $data[$i]['color_description'] = $product->color_description;
                $data[$i]['size'] = $product->size;
                $data[$i]['unit_price'] = $product->unit_price;
                $data[$i]['price'] = $product->price;
                $data[$i]['stock'] = $product->stock;
                $data[$i]['shape'] = $product->get_shape != null ? $product->get_shape->name : '';
                $data[$i]['type'] = Attribute::find($product->frame_type)->name ?? '';
                $data[$i]['material'] = Attribute::find($product->product_material)->name ?? '';
                $data[$i]['gender'] = Attribute::find($product->frame_type)->name ?? '';
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

                // $imgs = json_decode($product->g_image);
                // foreach($imgs as $j => $img){
                //     $data[$i]['img'. 2+$j] = request()->getSchemeAndHttpHost().$img;
                // }
            }
        endif;
       return collect($data);
    }

    public function headings() :array
    {
        return ["Item Code",
                "EAN Code",
                "Category",
                "Brands",
                "Model",
                "Colour",
                "Size",
                "Colour Description",
                "Unit Price",
                "MRP",
                "QTY",
                "Shape",
                "Type",
                "Material",
                "Gender",
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
