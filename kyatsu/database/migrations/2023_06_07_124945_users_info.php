<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_info', function (Blueprint $table) {
            $table->string('user_id')->reference('uuid')->on('users');
            $table->string('username')->unique();
            $table->timestamps();
            $table->string('profile_pic');
            $table->string('current_rank');
            $table->string('current_elo');
            $table->string('description');
            $table->string('matches_played');
            $table->string('winrate');
            $table->string('main_role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_info');

    }
};
