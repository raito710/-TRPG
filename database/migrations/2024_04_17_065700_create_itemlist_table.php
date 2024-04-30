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
        Schema::create('itemlist', function (Blueprint $table) {
            $table->id();
            // アイテムの名前や説明などの情報を追加するカラムを定義します
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('quantity')->default(0); // アイテムの数量を追加します
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemlist');
    }
};
