<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class charactersSeeder extends Seeder
{
      /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // データを挿入します
       DB::table('characters')->insert([
        [
            'user_id' => 1,
            'charaname' => '天然水(朝摘みレモン)',
            'sex' => '男性',
            'age' => 25,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => 2,
            'charaname' => 'サロメ',
            'sex' => '女性',
            'age' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ],

    ]);
    }
}
