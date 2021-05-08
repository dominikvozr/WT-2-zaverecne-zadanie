<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('student_id')->nullable();
            $table->foreignId('answer_right_id')->nullable();
            $table->foreignId('answer_left_id')->nullable();
            $table->foreignId('task_id')->nullable();
            $table->boolean('points')->nullable();
            $table->boolean('success')->nullable();
            $table->string('answer_left')->nullable();
            $table->string('answer_right')->nullable();
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
        Schema::dropIfExists('connections');
    }
}
