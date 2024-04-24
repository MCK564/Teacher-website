<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(12);
        return view('admin.users.index',compact('users'));
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        if($keyword){
            $users = User::where('name','like',"%$keyword%")
            ->orWhere('email',$keyword)
            ->paginate(12);
            if($users->count() >= 0){
                return view('admin.users.index',compact('users'));
            }
        }
        return view('admin.users.index')->with('failed','Không tìm thấy gì hết');

    }

    public function delete($id){
        $existing_user = User::findOrFail($id);
        $existing_user->delete();
    }
}
