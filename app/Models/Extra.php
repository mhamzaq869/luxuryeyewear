<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Extra extends Model
{
    use HasFactory;


    protected $fillable=['type','countries','price','status'];
    protected $appends = ['country_name'];


    public function getCountryNameAttribute()
    {
        $countriesId = explode(',',$this->countries);
        $countries = DB::table('countries')->whereIn('shortname',$countriesId)->pluck('name')->toArray();
        return implode(',',$countries);
    }
}
