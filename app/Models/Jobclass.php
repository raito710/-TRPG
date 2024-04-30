<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobclass extends Model
{
    use HasFactory;

    protected $table = 'charas_job';

    // テーブルとの関連を定義する
    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }

    public function job()
    {
        return $this->belongsTo(Jobclass::class, 'job_id');
    }
    use HasFactory;
}
