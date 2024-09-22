<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * The workouts that belong to the exercise.
     */
    public function workouts()
    {
        return $this->belongsToMany(Workout::class)
                    ->withPivot('sets', 'reps')
                    ->withTimestamps();
    }
}
