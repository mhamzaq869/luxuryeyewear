<?php

use App\Models\Extra;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

function uploadImage ($file, $path = null) {
    if($path == null){
        $folderPath = public_path('upload/product/crop/');
        $compressfolderPath = public_path('upload/product/crop/compress/');
        $compressfolderMedPath = public_path('upload/product/crop/med-compress/');
    }else{
        $folderPath = public_path($path);
        $compressfolderPath = public_path('upload/product/crop/compress/');
        $compressfolderMedPath = public_path('upload/product/crop/med-compress/');
    }
	$image_parts = explode(";base64,", $file);

	$image_type_aux = explode("image/", $image_parts[0]);

	$image_type = $image_type_aux[1];
	$image_base64 = base64_decode($image_parts[1]);

	$imageName = uniqid() . '.png';

	$imageFullPath = $folderPath.$imageName;
	if(\File::isDirectory($folderPath)){
		file_put_contents($imageFullPath, $image_base64);
	} else {
   		 \File::makeDirectory($folderPath, 0777, true, true);
   		 file_put_contents($imageFullPath, $image_base64);
	}

    if(\File::isDirectory($compressfolderPath)){
        compressImage($file,$imageFullPath,$compressfolderPath.$imageName,0.05);
	} else {
   		 \File::makeDirectory($compressfolderPath, 0777, true, true);
        compressImage($file,$imageFullPath,$compressfolderPath.$imageName,0.05);
	}

    if(\File::isDirectory($compressfolderMedPath)){
        compressImage($file,$imageFullPath,$compressfolderMedPath.$imageName,0.25);
	} else {
   		 \File::makeDirectory($compressfolderMedPath, 0777, true, true);
        compressImage($file,$imageFullPath,$compressfolderMedPath.$imageName,0.25);
	}

    if($path == null){
        return '/upload/product/crop/'.$imageName;
    }else{
        return $path.$imageName;
    }

}

function fn_resize($image_resource_id, $width, $height,$qulaity)
{
    if($width >= 800){
        $target_width = $width * $qulaity;
        $target_height = $height * $qulaity;
    }else{
        $target_width = $width;
        $target_height = $height;
    }
    $target_layer = imagecreatetruecolor($target_width, $target_height);
    imagecopyresampled($target_layer, $image_resource_id, 0, 0, 0, 0, $target_width, $target_height, $width, $height);
    return $target_layer;
}

function compressImage($file,$imageFullPath,$imageDestinationPath,$qulaity){
    $source_properties = getimagesize($imageFullPath);
    $image_type = $source_properties[2];

    if ($image_type == IMAGETYPE_JPEG) {
        $image_resource_id = imagecreatefromjpeg($file);
        $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1],$qulaity);
        imagejpeg($target_layer, $imageDestinationPath);
    } elseif ($image_type == IMAGETYPE_GIF) {
        $image_resource_id = imagecreatefromgif($file);
        $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1],$qulaity);
        imagegif($target_layer, $imageDestinationPath);
    } elseif ($image_type == IMAGETYPE_PNG) {
        $image_resource_id = imagecreatefrompng($file);
        $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1],$qulaity);
        imagepng($target_layer,  $imageDestinationPath);
    }
}

function insertAtPosition($string,$med=null) {
    if($string != null){
        $stringArr = explode('/',$string);
        $stringArr[5] = $stringArr[4];
        if($med == null){
            $stringArr[4] = 'compress';
        }else{
            $stringArr[4] = $med.'-compress';
        }
        return implode('/',$stringArr);
    }else{
        return $string;
    }
}

function isValidUrl($url){
    if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
        return true;
    } else {
        return false;
    }
}

function locationVal(){
    $location = Location::get(request()->ip());
    // $location = Location::get('111.119.187.50');

    return $location;
}
function current_currency()
{
    return geoip(locationVal()->ip)->currency;
}
function currencySymbol()
{
    $symbols = array(
        'AED' => '&#1583;.&#1573;', // ?
        'AFN' => '&#65;&#102;',
        'ALL' => '&#76;&#101;&#107;',
        'AMD' => '',
        'ANG' => '&#402;',
        'AOA' => '&#75;&#122;', // ?
        'ARS' => '&#36;',
        'AUD' => '&#36;',
        'AWG' => '&#402;',
        'AZN' => '&#1084;&#1072;&#1085;',
        'BAM' => '&#75;&#77;',
        'BBD' => '&#36;',
        'BDT' => '&#2547;', // ?
        'BGN' => '&#1083;&#1074;',
        'BHD' => '.&#1583;.&#1576;', // ?
        'BIF' => '&#70;&#66;&#117;', // ?
        'BMD' => '&#36;',
        'BND' => '&#36;',
        'BOB' => '&#36;&#98;',
        'BRL' => '&#82;&#36;',
        'BSD' => '&#36;',
        'BTN' => '&#78;&#117;&#46;', // ?
        'BWP' => '&#80;',
        'BYR' => '&#112;&#46;',
        'BZD' => '&#66;&#90;&#36;',
        'CAD' => '&#36;',
        'CDF' => '&#70;&#67;',
        'CHF' => '&#67;&#72;&#70;',
        'CLF' => '', // ?
        'CLP' => '&#36;',
        'CNY' => '&#165;',
        'COP' => '&#36;',
        'CRC' => '&#8353;',
        'CUP' => '&#8396;',
        'CVE' => '&#36;', // ?
        'CZK' => '&#75;&#269;',
        'DJF' => '&#70;&#100;&#106;', // ?
        'DKK' => '&#107;&#114;',
        'DOP' => '&#82;&#68;&#36;',
        'DZD' => '&#1583;&#1580;', // ?
        'EGP' => '&#163;',
        'ETB' => '&#66;&#114;',
        'EUR' => '&#8364;',
        'FJD' => '&#36;',
        'FKP' => '&#163;',
        'GBP' => '&#163;',
        'GEL' => '&#4314;', // ?
        'GHS' => '&#162;',
        'GIP' => '&#163;',
        'GMD' => '&#68;', // ?
        'GNF' => '&#70;&#71;', // ?
        'GTQ' => '&#81;',
        'GYD' => '&#36;',
        'HKD' => '&#36;',
        'HNL' => '&#76;',
        'HRK' => '&#107;&#110;',
        'HTG' => '&#71;', // ?
        'HUF' => '&#70;&#116;',
        'IDR' => '&#82;&#112;',
        'ILS' => '&#8362;',
        'INR' => '&#8377;',
        'IQD' => '&#1593;.&#1583;', // ?
        'IRR' => '&#65020;',
        'ISK' => '&#107;&#114;',
        'JEP' => '&#163;',
        'JMD' => '&#74;&#36;',
        'JOD' => '&#74;&#68;', // ?
        'JPY' => '&#165;',
        'KES' => '&#75;&#83;&#104;', // ?
        'KGS' => '&#1083;&#1074;',
        'KHR' => '&#6107;',
        'KMF' => '&#67;&#70;', // ?
        'KPW' => '&#8361;',
        'KRW' => '&#8361;',
        'KWD' => '&#1583;.&#1603;', // ?
        'KYD' => '&#36;',
        'KZT' => '&#1083;&#1074;',
        'LAK' => '&#8365;',
        'LBP' => '&#163;',
        'LKR' => '&#8360;',
        'LRD' => '&#36;',
        'LSL' => '&#76;', // ?
        'LTL' => '&#76;&#116;',
        'LVL' => '&#76;&#115;',
        'LYD' => '&#1604;.&#1583;', // ?
        'MAD' => '&#1583;.&#1605;.', //?
        'MDL' => '&#76;',
        'MGA' => '&#65;&#114;', // ?
        'MKD' => '&#1076;&#1077;&#1085;',
        'MMK' => '&#75;',
        'MNT' => '&#8366;',
        'MOP' => '&#77;&#79;&#80;&#36;', // ?
        'MRO' => '&#85;&#77;', // ?
        'MUR' => '&#8360;', // ?
        'MVR' => '.&#1923;', // ?
        'MWK' => '&#77;&#75;',
        'MXN' => '&#36;',
        'MYR' => '&#82;&#77;',
        'MZN' => '&#77;&#84;',
        'NAD' => '&#36;',
        'NGN' => '&#8358;',
        'NIO' => '&#67;&#36;',
        'NOK' => '&#107;&#114;',
        'NPR' => '&#8360;',
        'NZD' => '&#36;',
        'OMR' => '&#65020;',
        'PAB' => '&#66;&#47;&#46;',
        'PEN' => '&#83;&#47;&#46;',
        'PGK' => '&#75;', // ?
        'PHP' => '&#8369;',
        'PKR' => '&#8360;',
        'PLN' => '&#122;&#322;',
        'PYG' => '&#71;&#115;',
        'QAR' => '&#65020;',
        'RON' => '&#108;&#101;&#105;',
        'RSD' => '&#1044;&#1080;&#1085;&#46;',
        'RUB' => '&#1088;&#1091;&#1073;',
        'RWF' => '&#1585;.&#1587;',
        'SAR' => '&#65020;',
        'SBD' => '&#36;',
        'SCR' => '&#8360;',
        'SDG' => '&#163;', // ?
        'SEK' => '&#107;&#114;',
        'SGD' => '&#36;',
        'SHP' => '&#163;',
        'SLL' => '&#76;&#101;', // ?
        'SOS' => '&#83;',
        'SRD' => '&#36;',
        'STD' => '&#68;&#98;', // ?
        'SVC' => '&#36;',
        'SYP' => '&#163;',
        'SZL' => '&#76;', // ?
        'THB' => '&#3647;',
        'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
        'TMT' => '&#109;',
        'TND' => '&#1583;.&#1578;',
        'TOP' => '&#84;&#36;',
        'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
        'TTD' => '&#36;',
        'TWD' => '&#78;&#84;&#36;',
        'TZS' => '',
        'UAH' => '&#8372;',
        'UGX' => '&#85;&#83;&#104;',
        'USD' => '&#36;',
        'UYU' => '&#36;&#85;',
        'UZS' => '&#1083;&#1074;',
        'VEF' => '&#66;&#115;',
        'VND' => '&#8363;',
        'VUV' => '&#86;&#84;',
        'WST' => '&#87;&#83;&#36;',
        'XAF' => '&#70;&#67;&#70;&#65;',
        'XCD' => '&#36;',
        'XDR' => '',
        'XOF' => '',
        'XPF' => '&#70;',
        'YER' => '&#65020;',
        'ZAR' => '&#82;',
        'ZMK' => '&#90;&#75;', // ?
        'ZWL' => '&#90;&#36;',
    );

    return $symbols[current_currency()];
}

function price($price)
{
    return config('currencyPrice.rate')*$price;
}


function extraPrice($detail)
{
    $extra = config('currencyPrice.extra');
    if($extra != null){
        $detail->extra_amount = $extra->price ?? 0;
    }else{
        $detail->extra_amount = 0;
    }

    if(str_contains($detail->dispatch_from,locationVal()->countryCode)){
        $detail->price = $detail->price + ($detail->extra != null ? $detail->extra : 0) + $detail->extra_amount;
    }else{
        $detail->price = $detail->price + $detail->extra_amount;
    }


    return $detail->price;
}
?>
