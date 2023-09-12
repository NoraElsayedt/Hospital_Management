<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Auth\Lab_EmployeeLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Lab_EmployeeController extends Controller
{
   
    public function store(Lab_EmployeeLoginRequest $request):RedirectResponse
    {


        if(  $request->authenticate()){

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::LABEMPLOYEE);
        }
        else{
            return redirect()->back()->withErrors(['name'=>(trans('Dashboard/auth.failed'))]);
        }


      

     
    }

 
   

    public function destroy(Request $request):RedirectResponse
    {
        Auth::guard('lab_employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
}
}
