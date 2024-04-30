<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    use HasFactory;

    protected $table = 'jobclass';  // Ensure the table name is correct

    // Define the inverse of the relationship in the Job model
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'charas_job', 'job_id', 'character_id');
    }
}