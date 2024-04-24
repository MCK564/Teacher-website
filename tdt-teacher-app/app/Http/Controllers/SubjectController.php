<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('admin.subjects.index',compact('subjects'));
    }
    public function show_create_or_update($id=null){
        if($id){
            $subject = Subject::findOrFail($id);
            return view('admin.subjects.cru',compact('subject'));
        }
        return view('admin.subjects.cru');
    }
    public function create_or_update(Request $request, $id = null){
       $name = $request->input('name');
       $description = $request->input('description');
        if($id){
            $subject = Subject::findOrFail($id);
        }
        else{
            $subject = new Subject();
        }
        $subject->name= $name;
        $subject->description = $description;

        $subject->save();
        return redirect()->route('admin.subjects.index');

    }

    public function delete($id){
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('admin.subjects.index');
    }   
    public function search(Request $request){
        $keyword= $request->input('keyword');
        if($keyword){
            $subjects = Subject::where('name','like',"%$keyword%")
            ->orWhere('description','like',"%$keyword%")->get();
            if($subjects->count()>0){
                return view('admin.subjects.index',compact('subjects'));
            }
        }
        return view('admin.subjects.index')->with('message','Không tìm thấy môn học với keyword là '. $keyword);
    }
}
