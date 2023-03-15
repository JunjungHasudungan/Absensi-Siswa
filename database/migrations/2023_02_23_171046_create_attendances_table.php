<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->char('code');
            $table->string('description');
            // $table->unsignedBigInteger('student_id');
            // $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('subject_id');
            // $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            // $table->string('attendance')->default('masuk');
            // $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
