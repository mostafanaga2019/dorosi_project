<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function units()
    {
        return $this->hasMany(Unit::class, "subject_id" , "id" )->orderBy('unit_order', 'ASC')->with('lessons')->with('exercises');
    }

    public function exams()
    {
        return $this->hasMany(Exams::class, "subject_id" , "id" );
    }
}
