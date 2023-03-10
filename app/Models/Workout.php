<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'datum', 'category'];

    public function workitems() {
        return $this->belongsToMany(WorkItems::class);
    }
}
