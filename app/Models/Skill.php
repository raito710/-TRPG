<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    // モデルが使用するテーブル名を指定
    protected $table = 'skillmaster';

    // モデルで扱うカラム（属性）を指定する（ガードされていない属性）
    protected $fillable = ['skillname', 'description', 'mp'];

    // Job モデルとの多対多関係を定義
    public function jobs()
    {
        // 第二引数には中間テーブルの名前を指定します
        // 第三引数は中間テーブルにおけるこのモデルを参照する外部キー名
        // 第四引数は関連モデル側の外部キー名
        return $this->belongsToMany(Job::class, 'job_skill', 'skill_id', 'job_id');
    }
}