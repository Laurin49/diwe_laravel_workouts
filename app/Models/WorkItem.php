<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkItem extends Model
{
    use HasFactory;
    protected $fillable = ['workout_id', 'exercise_id', 'satz', 'wdh', 'gewicht'];

    public function workout() {
        return $this->belongsTo(Workout::class);
    }
    public function exercise() {
        return $this->belongsTo(Exercise::class);
    }
}
