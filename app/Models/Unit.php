<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    public function lessons()
    {
        return $this->hasMany(Lesson::class, "unit_id" , "id" )
        ->with('summeries')       
        ->with('videos');
    }

    public function exercises()
    {
        return $this->hasMany(UnitsExercise::class, "unit_id" , "id" );
    }

   
}
