<?php
namespace App\Exports;

use App\Models\Attribute;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Str;
use stdClass;

class ExportCategory implements FromCollection, WithHeadings
{

    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function collection()
    {
        $data = [];
        if($this->type == null):
            foreach(Category::all() as $i=> $cat){
                $data[$i]['brand'] = $cat->brand->count() != 0 ? $cat->brand->title : '';
                $data[$i]['model'] = $cat->title ?? '';

                $size = json_decode($cat->size);

                $data[$i]['lens_width'] = $size->width ?? '';
                $data[$i]['bridge_width'] = $size->bridge ?? '';
                $data[$i]['temple_length'] = $size->arm_length ?? '';
                $data[$i]['lens_height'] = $size->lens_height ?? '';
                $data[$i]['total_width'] = $size->total_width ?? '';
                $data[$i]['frame_type'] = Attribute::find($cat->frame_type)->name ?? '';
                $data[$i]['created_at'] = date('d-m-Y h:i',strtotime($cat->created_at));
            }
        endif;
        return collect($data);
    }


    public function headings() :array
    {
        return ["Brands", "Model", "LENS WIDTH","BRIDGE WIDTH", "TEMPLE LENGTH", "LENS HEIGHT", "Total Width", "Frame Type"];
    }



}

