<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = '';
    protected $fillable = ['id','subject_id','title',];

    public function attach_files(){
        return $this->hasMany(AttachFiles::class);
    }
    
}
