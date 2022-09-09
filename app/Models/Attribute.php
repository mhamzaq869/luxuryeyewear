<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
	protected $guarded = [];  
	 public static function getAllattribute(){

        return  Attribute::orderBy('id','DESC')->paginate(10);

    }

}