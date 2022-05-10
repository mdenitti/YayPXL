<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    // needed to insert records trough eloquent
    public $guarded = [];
    
    public function course() {
        return $this->belongsToMany(Course::class); }
}
