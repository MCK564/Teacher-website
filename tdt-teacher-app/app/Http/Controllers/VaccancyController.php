<?php

namespace App\Http\Controllers;

use App\Models\Vaccancy;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VaccancyController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $vacancies = Vaccancy::paginate(4);
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                return view('vacancy.index',compact('vacancies'));
            } else if ($userType == 'admin') {
               return view('admin.vacancies.index',compact('vacancies'));
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
                $vacancy = $id ? Vaccancy::findOrFail($id) : new Vaccancy();
               
                if ($request->hasFile('thumbnail')) {
                    $image = $request->file('thumbnail'); 
                    
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $filePath = $image->storeAs('uploads', $fileName);
                    
                    $googleDriveService = new GoogleDriveService();
    
                    // Upload hình ảnh lên Google Drive
                    $fileId = $googleDriveService->uploadFile(storage_path('app/' . $filePath));
    
                    if ($id) {
                        $oldVaccancies = Vaccancy::findOrFail($id);
                        $googleDriveService->deleteFile($oldVaccancies->thumbnails);
                    }
                    unlink(storage_path('app/' . $filePath));
                    $vacancy->thumnails = $fileId;
                } else {
                    // Sử dụng thumbnail cũ nếu không có ảnh mới
                    $thumbnail = $id ? Vaccancy::findOrFail($id)->thumnails : null;
                    $vacancy->thumnails = $thumbnail;
                }
                
                $vacancy->company_name = $request->input('company_name');
                $vacancy->job_name = $request->input('job_name');
                $vacancy->position = $request->input('position');
                $vacancy->welfare = $request->input('welfare');
                $vacancy->salary = $request->input('salary');
                $vacancy->detail_link = $request->input('detail_link');
                $vacancy->description = $request->input('description');
                $vacancy->requirements = $request->input('requirements');
                $vacancy->save();
                
                return redirect()->route('admin.vacancies.show_form_update', ['id' => $vacancy->id]);
            }
        }
        return redirect()->back();
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
                    return view('vacancy/index',compact('vacancies'));
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

    public function detail($id){
        $existing_vacancy = Vaccancy::findOrFail($id);
        return view('vacancy.detail',compact('existing_vacancy'));
    }
    public function get_by_id($id){
        $vacancy = Vaccancy::findOrFail($id);
        return view('vacancy.detail',compact('vacancy'));
     }
}
