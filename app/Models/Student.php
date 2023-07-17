<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function lophoc(){
        return $this->hasMany(Lophoc::class);
    } 
    
    public function teacher()
    {
        return $this->belongsToMany(Teacher::class);
    }
}

