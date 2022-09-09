<?php

namespace App\Providers;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\PaymentIntegration;
use App\Models\Permmission;
use Illuminate\Support\Facades\Auth;
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
        $permissions = Permmission::where('role','superadmin')->get();

        View::composer('*', function($view) use($permissions){
            $view->with('permissions', $permissions->pluck('permission')->toArray() ?? []);
        });


        View::composer(['frontend.layouts.product_filter'], function($view) use($permissions){

            $data['brand'] = Brand::take(10)->latest()->get();
            $data['shapes'] = Attribute::where('attribute_type','shape')->get();
            $data['materials'] = Attribute::where('attribute_type','material')->get();
            $data['type'] = Attribute::where('attribute_type','type')->get();

            $view->with('brands',$data['brand']);
            $view->with('shapes',$data['shapes']);
            $view->with('materials',$data['materials']);
            $view->with('types',$data['type']);




        });

        View::composer(['frontend.pages.cart'], function($view) use($permissions){
            $view->with('availablePaymnMethod', PaymentIntegration::all());
        });

    }
}
