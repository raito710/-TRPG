<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // ユーザーアイテムのシーディングロジックをここに追加する
                DB::table('charas_item')->insert([
                    [
                        'characters_id' => 1,
                        'item_id' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'characters_id' => 2,
                        'item_id' => 2,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    // 他のアイテムのデータも追加する
                ]);
        

        // 同様にユーザー2のデータを挿入する場合も同じように行います。
    }
}
