<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['title','slug','brand_id','type','description','photo','status'];



    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
