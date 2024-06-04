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
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->date('date');
            $table->bigIncrements('trip_id');
            $table->bigIncrements('commentator_id');
            $table->text('comment');

            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->foreign('commentator_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
