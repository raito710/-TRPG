<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jobclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 初期データの挿入
        DB::table('jobclass')->insert([
            [
                'name' => '戦士',
                'description' => '普通の戦士だよ(^^)',
                'skillPoint' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '魔法使い',
                'description' => '普通の魔法使いだよ(^O^)',
                'skillPoint' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他の職業のデータも同様に挿入
        ]);
    }
}