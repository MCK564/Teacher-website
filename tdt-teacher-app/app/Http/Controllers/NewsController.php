<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $news = News::paginate(24);
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                return view('news', compact('news'));
            } else if ($userType == 'admin') {
                return view('admin.news.index', compact('news'));
            }
            else {
                return redirect()->back();
            }
        }
    }

    public function create_or_update(Request $request, $id = null){
            
    }
    
    public function show_create_or_update($id=null){
        if(Auth::id()){
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
               abort(401);
            } else if ($userType == 'admin') {
                if($id){
                    $new = News::findOrFail($id);   
                    return view('admin.news.cru',compact('new'));
                }
                return view('admin.news.cru');
            }
        }
    }

    public function search(Request $request){
        if (Auth::id()) {
            $keyword= $request->input('keyword');
             if($keyword){
                $news = News::where('name','like',"%$keyword%")
               ->orWhere('title','like',"%$keyword%")
               ->orWhere('content','like',"%$keyword%")->get();
            if($news->count()>0){
                $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                return view('news', compact('news'));
            } else if ($userType == 'admin') {
                return view('admin.news.index', compact('news'));
            }
            }
        }
        return redirect()->back();
        }
    }

    public function delete($id){
        $existing_new = News::findOrFail($id);
        $existing_new->delete();
        return view('admin.news.index');
    }
}
