<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\noticias;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('noticias', function (Blueprint $table) {
        $table->uuid();
        $table->string("name", 400);
        $table->string("category");
        $table->text("content");
        $table->datetime("created_at");
        $table->datetime("deleted_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
