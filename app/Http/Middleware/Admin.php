<?php

namespace App\Http\Middleware;

use App\Models\Permmission;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user()->role=='admin' || $request->user()->role=='superadmin'){
            if($request->user()->role=='superadmin'){
                $superadmin = Permmission::where('user_id',Auth::id())->pluck('permission')->toArray();
                if($request->segment(2) != null){
                    if(in_array($request->segment(2),$superadmin) || in_array($request->segment(2),['profile','change-password']) ){
                        return $next($request);
                    }else{
                        request()->session()->flash('error','You do not have any permission to access this page');
                        return redirect()->route('admin');
                    }
                }else{
                    return $next($request);
                }
            }else{
                return $next($request);
            }
        }
        else{
            request()->session()->flash('error','You do not have any permission to access this page');
            return redirect()->route($request->user()->role);
        }
    }
}
