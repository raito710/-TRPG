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
        Schema::create('charas_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('characters_id')->constrained()->cascadeOnDelete();  // キャラクターIDを表す外部キー
            $table->foreignId('item_id')->constrained('itemlist')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charas_item');
    }
};
