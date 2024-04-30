<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Charas_JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ジョブとキャラクターの関連付け情報を挿入する
        DB::table('charas_job')->insert([
            [
                'character_id' => 1, // キャラクターID
                'job_id' => 1, // ジョブID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'character_id' => 2, // キャラクターID
                'job_id' => 2, // ジョブID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他のキャラクターとジョブの関連付け情報も同様に追加する
        ]);
    }
}