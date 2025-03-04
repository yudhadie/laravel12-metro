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
        Schema::create('test_data_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_data_id');
            $table->foreignId('test_tag_id');
            $table->timestamps();

            $table->foreign('test_data_id')->references('id')->on('test_data')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('test_tag_id')->references('id')->on('test_tag')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_data_tag');
    }
};
