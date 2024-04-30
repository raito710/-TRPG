<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // 追加: 正しい名前空間のインポート

class Character extends Model
{
    use HasFactory; // ここを `use` 宣言の後に移動（慣習的な配置）

    protected $table = 'characters'; // テーブル名を指定

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Itemモデルとの多対多関連を定義
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'charas_item', 'characters_id', 'item_id');
    }

    // Jobモデルとの多対多関連を定義
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'charas_job', 'character_id', 'job_id');
    }
}

