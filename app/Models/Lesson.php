<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function summeries()
    {
        return $this->hasMany(Summary::class, "lesson_id" , "id" );
    }

    public function videos()
    {
        return $this->hasMany(Video::class, "lesson_id" , "id" );
    }

   

   



}
