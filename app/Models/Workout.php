<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * The exercises that belong to the workout.
     */
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class)
                    ->using(WorkoutExercise::class)
                    ->withPivot('sets', 'reps')
                    ->withTimestamps();
    }
    

    /**
     * The workout sessions that are associated with the workout.
     */
    public function sessions()
    {
        return $this->hasMany(WorkoutSession::class);
    }
}
