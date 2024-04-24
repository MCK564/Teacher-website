<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        $user_type = Auth()->user()->user_type;
        
    }

    public function create_or_update(Request $request, $id = null){

    }
    
    public function show_create_or_update($id=null){
        
    }

    public function search(Request $request){

    }

    public function delete(Request $request){

    }
    

}
