<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
   
    public function store(AdminLoginRequest $request):RedirectResponse
    {


        if(  $request->authenticate()){

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
        else{
            return redirect()->back()->withErrors(['name'=>(trans('Dashboard/auth.failed'))]);
        }


      

     
    }

 
   

    public function destroy(Request $request):RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
}
}