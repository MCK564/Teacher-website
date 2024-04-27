<?php

namespace App\Services;

use Google\Client as GoogleClient;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile as GoogleDriveFile;


use Illuminate\Http\Request;

class GoogleDriveService 
{
    protected $drive;
    protected $folderId;

    public function __construct()
    {
        $client = new GoogleClient();
        $client->setAuthConfig(storage_path('app/cred.json'));
        $client->addScope(Drive::DRIVE);
        $client->setHttpClient(new \GuzzleHttp\Client(['verify' => storage_path('app/cacert.pem')]));
        $this->drive = new Drive($client);
        $this->folderId ="1sFiUUkZWRvXq8pLBbhfbWa41A71MlQ3o";
    }

    public function uploadFile($filePath)
    {
        $fileMetadata = new GoogleDriveFile([
            'name' => basename($filePath),
            'parents' => [$this->folderId], 
        ]);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $filePath);
        finfo_close($finfo);
        $content = file_get_contents($filePath);

        $file = $this->drive->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => $mimeType, 
            'uploadType' => 'multipart',
            'fields' => 'id',
        ]);
        return 'https://drive.google.com/thumbnail?id=' . $file->id;
    }

    public function deleteFile($url)
    {
        try {
            $fileId=($this->extractIdFromLink($url));
            $this->drive->files->delete($fileId);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    
    function extractIdFromLink($url)
    {
        preg_match('/[\/?]id=([^\&]+)/', $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }

    public function extractImageUrl($fileId)
{
    $file = $this->drive->files->get($fileId, ['fields' => 'webContentLink']);
    return $file->webContentLink;
}



public function getFileNameFromDrive($fileId)
{
    $file = $this->drive->files->get($fileId);
    return $file->getName();
}
public function downloadUrl($url){
    return 'https://drive.google.com/uc?export=download&id=' . $this->extractIdFromLink($url);
}




}
