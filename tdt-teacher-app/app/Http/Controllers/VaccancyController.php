<?php

namespace App\Http\Controllers;

use App\Models\Vaccancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VaccancyController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $vacancies = Vaccancy::pagingate(24);
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                return view('vacancies',compact('vacancies'));
            } else if ($userType == 'admin') {
               return view('admin.vacancies.index',compact('vacancies'));
            }
            else {
               return redirect()->back();
            }
        }
    }

    public function create_or_update(Request $request, $id = null){

    }
    
    public function show_create_or_update($id=null){
        if($id){
            $vacancy = Vaccancy::findOrFail($id);
            return view('admin.vacancies.cru',compact('vacancy'));
        }
        return view('admin.vacancies.cru');
    }

    public function search(Request $request){
        if (Auth::id()) {
            $keyword = $request->input('keyword');
            if($keyword){
                $vacancies = Vaccancy::where('company_name','like',"%$keyword%")
                ->orWhere('job_name','like',"%$keyword%")
                ->orWhere('position','like',"%$keyword%")
                ->orWhere('description','like',"%$keyword%")
                ->paginate(24);

                $userType = Auth()->user()->user_type;
                if ($userType == 'user') {
    
                    return view('vacancies',compact('vacancies'));
                } else if ($userType == 'admin') {
    
                   return view('admin.vacancies.index',compact('vacancies'));
                }
            }
           
        }
        return redirect()->back();
       
    }

    public function delete($id){
        $existing_vacancy = Vaccancy::findOrFail($id);
        $existing_vacancy->delete();
        return route('admin.vacancies.index');
    } 
}
