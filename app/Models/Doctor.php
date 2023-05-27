<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Doctor extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function subjects() {
        return $this->hasMany(Subject::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
