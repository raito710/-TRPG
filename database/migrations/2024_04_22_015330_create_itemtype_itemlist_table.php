<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itemtypes_itemlist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('itemlist_id')->constrained('itemlist')->onDelete('cascade'); // itemlist テーブルとの外部キー制約
            $table->foreignId('itemtype_id')->constrained('itemtype')->onDelete('cascade'); // itemtype テーブルとの外部キー制約
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemtypes_itemlist');
    }
};