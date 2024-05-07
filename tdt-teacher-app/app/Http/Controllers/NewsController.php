<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $news = News::paginate(4);
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                return view('news.index', compact('news'));
            } else if ($userType == 'admin') {
                return view('admin.news.index', compact('news'));
            }
            else {
                return redirect()->back();
            }
        }
    }

    public function create_or_update(Request $request, $id = null){
       
        if (Auth::check()) {
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                abort(401);
            } else if ($userType == 'admin') {
                $new = $id ? News::findOrFail($id) : new News();
                if ($request->hasFile('thumbnail')) {
                    $image = $request->file('thumbnail'); 
                  
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $filePath = $image->storeAs('uploads', $fileName);
                    
                    $googleDriveService = new GoogleDriveService();
    
                    // Upload hình ảnh lên Google Drive
                    $fileId = $googleDriveService->uploadFile(storage_path('app/' . $filePath));
    
                    if ($id) {
                        $oldDocument = News::findOrFail($id);
                        $googleDriveService->deleteFile($oldDocument->thumbnail);
                    }
                    unlink(storage_path('app/' . $filePath));
                    $new->thumbnail = $fileId;
                } else {
                
                    $thumbnail = $id ? News::findOrFail($id)->thumbnail : null;
                    $new->thumbnail = $thumbnail;
                }
    
                $new->title = $request->input('title');
                $new->content = $request->input('content');
                $new->save();
                
                return redirect()->route('admin.news.show_form_update', ['id' => $new->id]);
            }
        }
        return redirect()->back();
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
                $news = News::where('title','like',"%$keyword%")
               ->orWhere('content','like',"%$keyword%")->paginate(24);
            if($news->count()>0){
                $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                return view('news.index', compact('news'));
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

    public function get_by_id($id){
        $new = News::findOrFail($id);
        return view('news.detail',compact('new'));
     }
}
