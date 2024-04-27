<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachFiles extends Model
{
    use HasFactory;
    protected $table = 'attach_files';
    protected $fillable = ['id','type','document_id','url','created_at','updated_at','file_name'];

    public function document(){
        return $this->belongsTo(Document::class,'document_id');
    }
}
