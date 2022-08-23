<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobUserInterractionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_user_interraction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_id'); //from the job table
            $table->integer('user_id'); //from the user table
            $table->string('eventType');
            $table->string('job_title');
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
        Schema::dropIfExists('job_user_interraction');
    }
}
