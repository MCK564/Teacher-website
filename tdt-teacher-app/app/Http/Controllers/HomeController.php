<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $userType = Auth()->user()->user_type;
            if($userType =='user'){
                return view('home');
            }
            else if(@$userType =='admin'){ 
                return redirect()->route('admin.users.index');
            }
            else{
                return redirect()->back();
            }
            
        }
   }
}
