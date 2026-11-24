<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class DashboardController extends Controller
{
    
    public function index(){
   if(!Auth::check()){
    return redirect()
        ->route('login')
        ->withErrors('Silahkan login terlebih dahulu');
}


        return view('admin.dashboard.index');
    }
}