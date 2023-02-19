<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{
    Classroom,
    Subject};

return new class extends Migration
{
    public function up()
    {
        Schema::create('classroom_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classroom::class);
            $table->foreignIdFor(Subject::class);
        });
    }

    public function down()
    {
        Schema::dropIfExists('classroom_subject');
    }
};
