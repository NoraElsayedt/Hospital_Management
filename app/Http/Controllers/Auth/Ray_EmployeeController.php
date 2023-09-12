<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Ray_EmployeeLoginRequest;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Ray_EmployeeController extends Controller
{

    public function store(Ray_EmployeeLoginRequest $request):RedirectResponse
    {


        if(  $request->authenticate()){

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::RAYEMPLOYEE);
        }
        else{
            return redirect()->back()->withErrors(['name'=>(trans('Dashboard/auth.failed'))]);
        }


      

     
    }

    public function destroy(Request $request):RedirectResponse
    {
        Auth::guard('ray_employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
}
   
}
