<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $table = 'downloads';
    protected $fillable = ['user_id','attach_file_id','id'];

    public function attach_files(){
        return $this->belongsTo(AttachFiles::class,'attach_file_id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
