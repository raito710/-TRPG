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
        Schema::create('itemtype', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['equipment', 'consumable', 'important'])->default('equipment'); // アイテムの種類を示すカラムを追加
            $table->text('description')->nullable(); // 追加したいカラムを定義

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemtype');
    }
};
