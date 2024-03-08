<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerApproval
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(auth()->check()){
        //     if(!auth()->seller()->status){
        //         auth()->logout();
        //         return redirect()->route('seller.create')->with('message',trans('global.yourAccountsNeedsAdminApproval'));
        //     }
        // }
        return $next($request);
    }
}
