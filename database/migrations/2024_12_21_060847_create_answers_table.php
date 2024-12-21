<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
            $table->string('answer_text');
            $table->boolean('is_correct')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers');
    }
}

