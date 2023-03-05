<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{
        Classroom,
        Subject,
        User
};

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('method_learning')->default(0);
            $table->integer('status')->default(0);
            // $table->string('comment')->nullable();
            $table->integer('completeness')->default(0);
            $table->foreignIdFor(Classroom::class);
            $table->foreignIdFor(Subject::class);
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            // $table->for
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
        Schema::dropIfExists('administrations');
    }
};
