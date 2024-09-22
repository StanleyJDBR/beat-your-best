<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class WorkoutExercise extends Pivot
{
    protected $table = 'workout_exercise';

    protected $fillable = ['workout_id', 'exercise_id', 'sets', 'reps'];
}
