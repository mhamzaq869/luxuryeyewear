<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ImportProduct implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow(): int
    {
        return 1;
    }
    public function collection(Collection $rows)
    {
    //   print_r($row[12]); die;

        // dd($rows);

        foreach($rows as $i => $row){

            $frameType = Attribute::where('name',$row['category'])->first();
            $shape = Attribute::where('name',$row['shape'])->first();
            $productType = Attribute::where('name',$row['type'])->first();
            $material = Attribute::where('name',$row['material'])->first();
            $productFor = Attribute::where('name',$row['gender'])->first();
            $brand = Brand::where('title',$row['brands'])->first();
            $model = Category::where('title',$row['model'])->first();

            if($row['image1'] == null){
                $photo = "/upload/product/full/no_image.jpg";
            }else{
                $photo = $row['image1'];
            }


            if($brand == null){
                $brand = Brand::create([
                        'title' => $row['brands'],
                        'slug' => Str::slug($row['brands'],'-').'-'.$i.'-'.date('Y-m-d-H-i-s'),
                        'brand_image' => $photo,
                        'url' => '',
                ]);
            }


            if($model == null){
                $model = Category::create([
                        'title' => $row['model'],
                        'slug' => Str::slug($row['model'],'-').'-'.$i.'-'.date('Y-m-d-H-i-s'),
                        'is_parent' => 1,
                        'brand_id' => ($brand != null) ? $brand->id : null,
                        'frame_type' => ($frameType != null) ? $frameType->id : null,
                        'status' => 'active',
                ]);
            }


            $array = [];
            $array['width'] = $row['width'] ?? '';
            $array['bridge'] = $row['bridge'] ?? '';
            $array['arm_length'] = $row['arm_length'] ?? '';
            $array['lens_height'] = $row['lens_height'] ?? '';
            $array['total_width'] = $row['total_width'] ?? '';
            $size = json_encode($array);

            $title = '';
            if(!empty($brand) && $brand != null){
                $title .= $brand->title;
            }

            if(!empty($model) && $model!= null){
                $title .= ' '.$model->title;
            }

            $title .= ' '.$row['colour'];
            $slug = Str::slug($title,'-');

            Product::insertOrIgnore([
                'title' => $title,
                'slug' =>  $slug.'-'.$i.'-'.date('Y-m-d-H-i-s'),
                'product_uan_code' => $row['item_code'],
                'product_ean_code' => $row['ean_code'],
                // 'frame_type' => $frameType->id,
                'brand_id' => $brand->id,
                'cat_id' => $model->id,
                'discount' => 0,
                'photo' => $photo,
                'p_f' => $photo,
                'p_b' => $row['image2'] ?? null,
                'g_image_1' => $row['image3'] ?? null,
                'g_image_2' => $row['image4'] ?? null,
                'g_image_3' => $row['image5'] ?? null,
                'color' => $row['colour'],
                'size' => $row['size'],
                'color_description' => $row['colour_description'],
                'unit_price' => str_replace('$','', $row['unit_price']),
                'price' => str_replace('$','', $row['mrp']),
                'stock' => $row['qty'],
                'shape' => $shape->id,
                'product_for' => $productFor->id,
                'type' => $productType->id,
                'product_material' => $material->id,
                'product_lens_width' => $row['width'],
                'product_bridge' => $row['brigde'],
                'product_arm_length' => $row['arm_length'],
                'product_lens_height' => $row['lens_height'],
                'product_total_width' => $row['total_width'],
                'country_of_origin' => $row['country_of_region'],
                'dispatch_from' => $row['dispatch_from'],
                'is_featured' => 0,
                'status' => 'inactive',


            ]);
        }

    }

}
