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

class ImportProduct implements ToCollection, WithHeadingRow
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

    /**
     * Summary of collection
     * @param \Illuminate\Support\Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        try {

            foreach ($rows as $i => $row) {
                // Use the ternary operator to handle default values
                $frameType = Attribute::where('name', 'LIKE', '%' . ($row['category'] ?? '') . '%')->first();
                $shape = Attribute::where('name', 'LIKE', '%' . ($row['shape'] ?? '') . '%')->first();
                $productType = Attribute::where('name', 'LIKE', '%' . ($row['product_type'] ?? '') . '%')->first();
                $lenseType = Attribute::where('name', 'LIKE', '%' . ($row['lense_type'] ?? '') . '%')->first();
                $material = Attribute::where('name', 'LIKE', '%' . ($row['material'] ?? '') . '%')->first();
                $productFor = Attribute::where('name', 'LIKE', '%' . ($row['gender'] ?? '') . '%')->first();

                // Update existing $brand and $model variables
                $brand = Brand::firstOrNew(['slug' => Str::slug($row['brands'] ?? '')]);
                $brand->title = $row['brands'] ?? '';
                $brand->slug = Str::slug($row['brands'] ?? '');
                $brand->url = '';
                $brand->brand_image = '';
                $brand->save();

                $model = Category::where('slug', Str::slug($row['model'] ?? ''))->first();
                if(empty($model)){
                    $model->title = $row['model'] ?? '';
                    $model->slug = Str::slug($row['model'] ?? '');
                    $model->is_parent = 1;
                    $model->brand_id = $brand->id;
                    $model->frame_type = $frameType ? $frameType->id : null;
                    $model->status = 'active';
                    $model->save();
                }

                $array = [
                    'width' => $row['width'] ?? '',
                    'bridge' => $row['bridge'] ?? '',
                    'arm_length' => $row['arm_length'] ?? '',
                    'lens_height' => $row['lens_height'] ?? '',
                    'total_width' => $row['total_width'] ?? '',
                ];
                $size = json_encode($array);

                $title = '';
                if ($brand) {
                    $title .= $brand->title;
                }
                if ($model) {
                    $title .= ' ' . $model->title;
                }
                if (!empty($row['colour'])) {
                    $title .= ' ' . $row['colour'];
                }
                if (!empty($row['size'])) {
                    $title .= ' ' . $row['size'];
                }
                if ($brand) {
                    $title .= ' by ' . $brand->title;
                }
                $slug = Str::slug($title, '-');

                Product::create([
                    'title' => $title,
                    'slug' => $slug,
                    'product_uan_code' => $row['item_code'] ?? null,
                    'product_ean_code' => $row['ean_code'] ?? null,
                    'brand_id' => $brand->id,
                    'cat_id' => $model->id,
                    'discount' => 0,
                    'photo' => isset($row['image1']) ? $row['image1'] : "/upload/product/full/no_image.jpg",
                    'p_f' => isset($row['image1']) ? $row['image1'] : "/upload/product/full/no_image.jpg",
                    'p_b' => $row['image2'] ?? null,
                    'g_image_1' => $row['image3'] ?? null,
                    'g_image_2' => $row['image4'] ?? null,
                    'g_image_3' => $row['image5'] ?? null,
                    'color' => $row['colour'] ?? '',
                    'size' => $row['size'] ?? '',
                    'color_description' => $row['colour_description'] ?? '',
                    'unit_price' => str_replace('$', '', ($row['selling_price'] ?? 0.00)),
                    'price' => isset($row['mrp']) ? str_replace('$', '', $row['mrp']) : 0.00,
                    'b2b_price' => isset($row['b2b_price']) ? str_replace('$', '', $row['b2b_price']) : 0.00,
                    'stock' => isset($row['qty']) ? $row['qty'] : 0,
                    'shape' => $shape ? $shape->id : 0,
                    'product_for' => $productFor ? $productFor->id : 0,
                    'type' => $productType ? $productType->id : 0,
                    'lense_type' => $lenseType ? $lenseType->id : 0,
                    'product_material' => $material ? $material->id : 0,
                    'product_lens_width' => $row['width'] ?? '',
                    'product_bridge' => $row['bridge'] ?? '',
                    'product_arm_length' => $row['arm_length'] ?? '',
                    'product_lens_height' => $row['lens_height'] ?? '',
                    'product_total_width' => $row['total_width'] ?? '',
                    'country_of_origin' => $row['country_of_region'] ?? '',
                    'dispatch_from' => $row['dispatch_from'] ?? '',
                    'is_featured' => 0,
                    'status' => isset($row['qty']) ? ($row['qty'] == 0 ? 'outofstock' : 'inactive') : 'inactive',
                ]);
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
