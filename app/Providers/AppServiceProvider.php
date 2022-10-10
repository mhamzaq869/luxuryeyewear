<?php

namespace App\Providers;

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\PaymentIntegration;
use App\Models\Permmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Config::set('currencyPrice.rate', Currency::convert()->from('USD')->to(current_currency())->get());
        $location = locationVal();
        if($location){
            Config::set('currencyPrice.extra', DB::table('extras')->whereRaw('FIND_IN_SET(?, countries)', [$location->countryCode])->where('status','active')->first());
        }


        $permissions = Permmission::where('role','superadmin')->get();

        View::composer('*', function($view) use($permissions){
            $view->with('permissions', $permissions->pluck('permission')->toArray() ?? []);
        });


        View::composer(['frontend.layouts.product_filter'], function($view) use($permissions){
            $attribute = DB::table('attributes')->get();

            $data['brand'] = DB::table('brands')->get();
            $data['shapes'] = $attribute->where('attribute_type','shape');
            $data['materials'] = $attribute->where('attribute_type','material');
            $data['type'] = $attribute->where('attribute_type','type');
            $data['gender'] = $attribute->where('attribute_type','product_for')->whereNotIn('name',['Junior','Unisex']);

            $view->with('brands',$data['brand']);
            $view->with('shapes',$data['shapes']);
            $view->with('materials',$data['materials']);
            $view->with('types',$data['type']);
            $view->with('genders',$data['gender']);
        });

        View::composer(['frontend.pages.checkout'], function($view) use($permissions){
            $view->with('availablePaymnMethod', PaymentIntegration::all());
        });

    }
}
