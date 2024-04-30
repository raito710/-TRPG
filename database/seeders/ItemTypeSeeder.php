<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DBファサードを使用するために必要

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DBファサードを使用して item_types テーブルにデータを挿入
        DB::table('itemtype')->insert([
            ['type' => 'equipment', 'description' => '装備可能なアイテム'],
            ['type' => 'consumable', 'description' => '消費アイテム'],
            ['type' => 'important', 'description' => '大事なアイテム'],
        ]);
    }
}