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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teamID')->nullable();
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->string('code')->nullable();
            $table->string('img')->nullable();
            $table->string('conference');
            $table->string('division');
            $table->bigInteger('wins')->default(0);
            $table->bigInteger('losses')->default(0);
            $table->bigInteger('percent')->default(0);
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
        Schema::dropIfExists('teams');
    }
};
