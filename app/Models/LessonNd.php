<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonNd extends Model
{
    use HasFactory;

    public function summeries()
    {
        return $this->hasMany(SummaryNd::class, "lesson_id" , "id" );
    }

    public function videos()
    {
        return $this->hasMany(VideoNd::class, "lesson_id" , "id" );
    }

    
}
