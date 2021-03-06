<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNarrativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narratives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('theme');
            $table->integer('kind_id');
            $table->integer('act_n');
            $table->longText('clue');
            $table->longText('content');
            $table->integer('user_id');
            $table->integer('status');
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
        Schema::dropIfExists('narratives');
    }
}
