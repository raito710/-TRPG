<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemtypeIdToItemlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itemlist', function (Blueprint $table) {
            $table->foreignId('itemtype_id')->nullable()->constrained('itemtype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itemlist', function (Blueprint $table) {
            $table->dropForeign(['itemtype_id']);
            $table->dropColumn('itemtype_id');
        });
    }
}