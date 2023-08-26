<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['title','title_color','slug','brand_id','type','description','description_color','photo','status'];



    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
