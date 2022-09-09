<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shipping extends Model
{
    protected $fillable=['type','countries','transit','price','status'];
    protected $appends = ['country_name'];


    public function getCountryNameAttribute()
    {
        $countriesId = explode(',',$this->countries);
        $countries = DB::table('countries')->whereIn('shortname',$countriesId)->pluck('name')->toArray();
        return implode(',',$countries);
    }
}
