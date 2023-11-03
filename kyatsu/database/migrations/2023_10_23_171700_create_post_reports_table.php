<?php

use App\Models\banReason;
use App\Models\Foro;
use App\Models\User;
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
        Schema::create('post_reports', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->uuid("reporter_uuid")->references("uuid")->on(User::class);
            $table->uuid("banReason_uuid")->references("uuid")->on(banReason::class);
            $table->foreignId("post_uuid")->references("id")->on(Foro::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_reports');
    }
};
