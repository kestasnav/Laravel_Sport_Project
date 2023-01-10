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
        Schema::create('standings', function (Blueprint $table) {
            $table->id();

            $table->json('gameDate')->nullable()->collation('utf8mb4_general_ci');
            $table->json('homeTeam')->nullable()->collation('utf8mb4_general_ci');
            $table->json('awayTeam')->nullable()->collation('utf8mb4_general_ci');
            $table->json('homeScore')->nullable()->collation('utf8mb4_general_ci');
            $table->json('awayScore')->nullable()->collation('utf8mb4_general_ci');
            $table->json('player')->nullable()->collation('utf8mb4_general_ci');
            $table->json('playerScore')->nullable()->collation('utf8mb4_general_ci');

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
        Schema::dropIfExists('standings');
    }
};
