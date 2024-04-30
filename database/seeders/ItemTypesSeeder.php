<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ItemTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // ユーザーアイテムのシーディングロジックをここに追加する
        DB::table('itemtypes_itemlist')->insert([
            [
                'itemtype_id' => 1,
                'itemlist_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'itemtype_id' => 1,
                'itemlist_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 他のアイテムのデータも追加する
        ]);
    }
}
