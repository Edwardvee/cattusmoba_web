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
        Schema::create('foro', function (Blueprint $table) {
            $table->id();
            $table->integer('isChildOf')->nullable();
            $table->text('user_poster');
            $table->longText('content');
            $table->integer('reply_count');
            $table->integer('like_count');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foro');
    }
};
