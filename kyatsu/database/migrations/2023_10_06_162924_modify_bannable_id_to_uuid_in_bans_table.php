<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bans', function ($table) {
            $table->uuid('bannable_id')->change();
            $table->uuid('created_by_id')->change();
            $table->foreignUuid("ban_reason_uuid")->nullable()->references('uuid')->on('banReasons');
        });
    }

    public function down()
    {
        Schema::table('bans', function ($table) {
            $table->unsignedBigInteger('bannable_id')->change();
            $table->unsignedBigInteger('created_by_id')->change();
            $table->dropForeign(['ban_reason_uuid']);
            $table->dropColumn('ban_reason_uuid');
        });
    }
};
