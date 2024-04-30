<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // アイテムリストにデータを追加します
        DB::table('itemlist')->insert([
            [
                'name' => 'ブロンズソード',
                'quantity' => 0,
                'itemtype_id' => 1, // 装備可能なアイテムの種類
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'マジシャンロッド',
                'quantity' => 0,
                'itemtype_id' => 1, // 装備可能なアイテムの種類
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'バスターアックス',
                'quantity' => 0,
                'itemtype_id' => 1, // 装備可能なアイテムの種類
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '薬草',
                'quantity' => 0,
                'itemtype_id' => 2, // 消費アイテムの種類
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '魔力ポーション',
                'quantity' => 0,
                'itemtype_id' => 2, // 消費アイテムの種類
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '攻撃ポーション',
                'quantity' => 0,
                'itemtype_id' => 2, // 消費アイテムの種類
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}