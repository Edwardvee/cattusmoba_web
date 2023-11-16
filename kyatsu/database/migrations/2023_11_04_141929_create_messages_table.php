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
        Schema::create('messages', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->text("content");
            $table->foreignUuid("chat_user_uuid")->references("uuid")->on("chat_user");
            //$table->foreignUuid("user_uuid")->references("uuid")->on("users");
            //$table->foreignUuid("chat_uuid")->references("uuid")->on("chats");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
