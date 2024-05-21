<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producer', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->boolean('order')->default(0);
            $table->boolean('hidden')->default(1);
            $table->timestamps();
        });
        Schema::create('nature', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
        });
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('producer_id');
            $table->integer('price')->default(0);
            $table->integer('promotional_price')->default(0);
            $table->string('image', 255)->nullable();
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('view')->default(0);
            $table->boolean('hot')->default(0);
            $table->boolean('hidden')->default(1);
            $table->boolean('nature')->default(0);
            $table->string('color', 50)->nullable();
            $table->string('weight', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producer');
        Schema::dropIfExists('nature');
        Schema::dropIfExists('product');
    }
};
