<?php
namespace App\Imports;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Attribute;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class ImportCategory implements ToModel,WithStartRow

{

    /**

    * @param array $row

    *

    * @return \Illuminate\Database\Eloquent\Model|null

    */

    public function startRow(): int

    {

        return 2;

    }

    public function model(array $row)
    {
        // dd($row[0]);
    	$size = [];
        $slug=Str::slug($row[0]);
        $brand=Brand::where('slug',$slug)->first();
        $attribute = Attribute::where('name',$row[7])->where('attribute_type', 'frame_type')->first();
        $size['width'] = $row[2];
        $size['bridge'] = $row[3];
        $size['arm_length'] = $row[4];
        $size['lens_height'] = $row[5];
        $size['total_width'] = $row[6];

        // if(!$brand){
        //    $brand=New Brand;
        //    $brand->title = $row[0];
        //    $brand->slug = $slug;
        //    $brand->url = 'https://example.com/';
        //    $brand->brand_image = 'No Image';

        //   $brand->save();


        // }

        $brand = Brand::updateOrCreate(['slug' => $brand->slug],[
                'title' => $row[0],
                'slug' => $brand->slug,
                'url' => '',
        ]);

        $slug1=Str::slug($row[1]);

        return Category::updateOrCreate(['slug' => $slug1],[
            'title' => $row[1],
            'slug' => $slug1,
            'brand_id' => $brand->id,
            'frame_type' =>$attribute->id ?? '',
            'size' =>json_encode($size),
            'status' => 'active'

        ]);

    }



}

