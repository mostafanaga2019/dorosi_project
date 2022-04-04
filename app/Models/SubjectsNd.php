<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsNd extends Model
{
    use HasFactory;
    public function units()
    {
        return $this->hasMany(UnitNd::class, "subject_id" , "id" )->orderBy('unit_order', 'ASC')->with('lessons')->with('exercises');
    }
    public function exams()
    {
        return $this->hasMany(ExamsNd::class, "subject_id" , "id" );
    }
}
