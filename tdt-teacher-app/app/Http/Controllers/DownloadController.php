<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(){
        $downloads = Download::paginate
    }

    public function create_or_update(Request $request, $id = null){

    }
    
    public function show_create_or_update($id=null){
        
    }

    public function search(Request $request){

    }

    public function delete(Request $request){

    }
    public function download(Request $request){
        $googleDriveService = new GoogleDriveService();
        $fileId = '11GrnUr_yefn_JdV-rcg7D4a_2Hhj79z-'; 

        $result = $googleDriveService->downloadFile($fileId);

        $this->assertTrue($result);
    }
}
