<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vaccancy;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $userType = Auth()->user()->user_type;
            $news = News::latest()->take(5)->get();
            $vacancies = Vaccancy::latest()->take(5)->get();
            $documents = Document::latest()->take(5)->get();
            if($userType =='user'){
                return view('home_page' ,compact('news','vacancies','documents'));
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
