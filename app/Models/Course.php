<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function location() {
        // de naam van de methode is belangrijk; deze zal verwijzen naar naammethode_id in de referentie tabel
        return $this->belongsTo(Location::class); }

    public function student() {
            return $this->belongsToMany(Student::class); }
}
