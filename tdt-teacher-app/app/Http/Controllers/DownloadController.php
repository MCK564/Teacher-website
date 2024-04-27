<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DownloadController extends Controller
{
    public function index(){
        $downloads = Download::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        ->groupBy('date')
        ->get();
        return view('admin.downloads.index',compact('downloads'));
    }

    public function create_or_update(Request $request, $id = null){
    }
    
    public function show_create_or_update($id=null){
        
    }

    public function search(Request $request)
    {
      
        $date = $request->input('date');
        if (!$date) {
            $date = date('Y-m-d');
        }
        $downloads = Download::whereDate('created_at', $date)->get();
        $dates = $downloads->pluck('created_at')->map(function ($date) {
            return $date->format('Y-m-d');
        });
        $downloadCounts = $downloads->pluck('id'); 
        return view('admin.downloads.index', compact('dates', 'downloadCounts', 'date'));
    }
    public function delete(Request $request){

    }
    public function download(Request $request){
        $url=$request->input('url');
        $file_id = $request->input('file_id');
        $user_id = Auth::id();
        $googleDriveService = new GoogleDriveService();
        $file_name= $googleDriveService->getFileNameFromDrive($googleDriveService->extractIdFromLink($url));
   
        Download::create([
            'user_id' => $user_id,
            'attach_file_id' => $file_id
        ]);
        // return response()->streamDownload(function () use ($url) {
        //     echo file_get_contents($url);
        // }, $file_name);

        return redirect()->away($googleDriveService->downloadUrl($url));
    }
  
    


}
 