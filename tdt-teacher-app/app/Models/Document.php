<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = ['id','subject_id','title','content','thumbnail','type'];

    public function attach_files(){
        return $this->hasMany(AttachFiles::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
    
    
}
