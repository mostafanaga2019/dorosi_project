<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitNd extends Model
{
    use HasFactory;
    public function lessons()
    {
        return $this->hasMany(LessonNd::class, "unit_id" , "id" )
        ->with('summeries')
        ->with('videos');
    }
    public function exercises()
    {
        return $this->hasMany(UnitsExerciseNd::class, "unit_id" , "id" );
    }
}
