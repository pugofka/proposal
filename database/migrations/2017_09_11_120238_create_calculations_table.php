<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_phone');
            $table->integer('cost_per_hour');
            $table->integer('template_id');
            $table->json('tasks');
            $table->json('additional_tasks')->nullable();
            $table->json('info')->nullable();
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
        Schema::dropIfExists('calculations');
    }
}
