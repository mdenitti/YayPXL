<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    // needed to insert records trough eloquent
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public $guarded = [];
    
    public function course() {
        return $this->belongsToMany(Course::class); }
}
