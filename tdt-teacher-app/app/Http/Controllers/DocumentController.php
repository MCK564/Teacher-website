<?php

namespace App\Http\Controllers;

use App\Models\AttachFiles;
use App\Models\Document;
use App\Models\Subject;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $subjects = Subject::all();
            $documents = Document::paginate(24);
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                return view('documents.index',compact('documents','subjects'));
            } else if ($userType == 'admin') {
               return view('admin.documents.index',compact('documents','subjects'));
            }
            else { 
               return redirect()->back();
            }
        }
    }


    public function create_or_update(Request $request, $id = null)
    {
        if (Auth::check()) {
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                abort(401);
            } else if ($userType == 'admin') {
                $document = $id ? Document::findOrFail($id) : new Document();
                if ($request->hasFile('thumbnail')) {
                    $image = $request->file('thumbnail'); 
                  
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $filePath = $image->storeAs('uploads', $fileName);
                    
                    $googleDriveService = new GoogleDriveService();
    
                    // Upload hình ảnh lên Google Drive
                    $fileId = $googleDriveService->uploadFile(storage_path('app/' . $filePath));
    
                    if ($id) {
                        $oldDocument = Document::findOrFail($id);
                        $googleDriveService->deleteFile($oldDocument->thumbnail);
                    }
                    unlink(storage_path('app/' . $filePath));
                    $document->thumbnail = $fileId;
                } else {
                    // Sử dụng thumbnail cũ nếu không có ảnh mới
                    $thumbnail = $id ? Document::findOrFail($id)->thumbnail : null;
                    $document->thumbnail = $thumbnail;
                }
                
                $document->title = $request->input('title');
                $document->subject_id = $request->input('subject_id');
                $document->content = $request->input('content');
                $document->type = $request->input('type');
                $document->save();
                
                return redirect()->route('admin.documents.show_form_update', ['id' => $document->id]);
            }
        }
        return redirect()->back();
    }
    
    
    

    public function show_create_or_update($id=null){
        if (Auth::id()) {
            $subjects = Subject::all();
            
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
               abort(401);
            } else if ($userType == 'admin') {
                if($id){
                    $document = Document::findOrFail($id);
                    return view('admin.documents.cru',compact('document','subjects'));
                }
                return view('admin.documents.cru',compact('subjects'));
            }
            else { 
               return redirect()->back();
            }
        }
    }


    public function search(Request $request){
        $keyword = $request->input('keyword');
        $subject_id = $request->input('subject_id');
        $type = $request->input('type');
        $subjects = Subject::all();
        if (Auth::id()) {
            $query = Document::query();
          if($keyword){
            $query->where('title','like',"%$keyword%")
            ->orWhere('content','like',"%$keyword%");
          }
          if($subject_id){
            $query->where('subject_id',$subject_id);
          }
          if($type){
            $query->where('type',$type);
          }
          $documents = $query->paginate(12);
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                return view('documents.index',compact('documents','subjects'));
            } else if ($userType == 'admin') {
               return view('admin.documents.index',compact('documents','subjects'));
            }
            else { 
               return redirect()->back();
            }
        }

    }

    public function delete($id){
        $document = Document::findOrFail($id);
        $document->delete();
        return redirect()->route('admin.documents.index');
    }
    
    public function updateAttachFile(Request $request, $id)
    {
       
        if ($request->hasFile('files')) {
            
            $googleDriveService = new GoogleDriveService();
            $document = Document::findOrFail($id);
            $attach_files  = AttachFiles::where('document_id', $id)->get();
            
            if ($attach_files->isNotEmpty()) {
                foreach ($attach_files as $file) {
                    $googleDriveService->deleteFile($file->url);
                    $file->delete();
                }
            }

            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName);
    
                $fileId = $googleDriveService->uploadFile(storage_path('app/' . $filePath));
                $fileNameParts = explode(".", $fileName);
                $fileExtension = end($fileNameParts); // Lấy phần tử cuối cùng
            
                AttachFiles::create([
                    'document_id' => $id,
                    'url' => $fileId,
                    'type' => $fileExtension,
                    'file_name'=>$fileName
                ]);

                unlink(storage_path('app/' . $filePath));
            }
            return redirect()->route('admin.documents.show_form_update', ['id' => $id])
                             ->with('success', 'Update attach file successfully');
        }
        return redirect()->back();
    }
    

   
     public function delete_attach_file($id){
        $attach_file = AttachFiles::findOrFail($id);
        $attach_file->delete();
        return redirect()->back();
     }
    
     public function get_by_id($id){
        $document = Document::findOrFail($id);
        return view('documents.details',compact('document'));
     }
    

}
