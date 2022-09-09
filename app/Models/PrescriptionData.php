<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PrescriptionData extends Model
{
	 protected $table = 'prescription_data';
	 protected $guarded = [];  
	 public static function getAllprescitpion(){

        return  Attribute::orderBy('id','DESC')->paginate(10);

    }

}