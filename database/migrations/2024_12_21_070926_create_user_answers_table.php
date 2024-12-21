<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_user_answers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id'); // The answer selected by the user
            $table->boolean('is_correct'); // Whether the answer was correct or not
            $table->timestamps();

            // Foreign keys to users and answers tables
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_answers');
    }
}

