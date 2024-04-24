<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccancy extends Model
{
    use HasFactory;
    protected $table = 'vaccancies';
    protected $fillable = ['id','company_name','job_name','position','salary','welfare','description','thumbnails'];

    
}
