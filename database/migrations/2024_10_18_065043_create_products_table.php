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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('price');
            $table->unsignedSmallInteger('discount');
            $table->unsignedSmallInteger('vendor')->default(0);
            $table->string('title', 100);
            $table->string('barnd', 100);
            $table->string('model', 100);
            $table->unsignedSmallInteger('ram');
            $table->unsignedSmallInteger('storage');
            $table->string('cpu', 100);
            $table->unsignedSmallInteger('width');
            $table->unsignedSmallInteger('hight');
            $table->unsignedSmallInteger('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
