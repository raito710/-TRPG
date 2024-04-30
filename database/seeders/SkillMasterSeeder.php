<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルにデータを挿入する
        DB::table('skillmaster')->insert([
            [
                'skillname' => '破竹斬り',
                'description' => '竹を割るようにどんな装甲をも真っ二つにする',
                'mp' => 3, // 数値として指定する
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'skillname' => '炎ではないただの火だ',
                'description' => '随分と長い詠唱をし特大呪文を打つと思わせてからマッチの火ほどの火柱を作成する',
                'mp'=>4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他のスキルの情報も同様に追加する
        ]);
    }
}