<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Job_SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ジョブとスキルの関連付け情報を挿入する
        DB::table('job_skill')->insert([
            [
                'job_id' => 1, // ジョブID
                'skill_id' => 1, // スキルID
                
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job_id' => 2, // ジョブID
                'skill_id' => 2, // スキルID
               
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他のジョブとスキルの関連付け情報も同様に追加する
        ]);
    }
}