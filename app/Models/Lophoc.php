<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lophoc extends Model
{
    use HasFactory;
    protected $table = 'lophoc';
    function student(){
        return $this->belongsTo(Student::class);
    }
    function teacher(){
        return $this->belongsTo(Teacher::class);
    }

}
