<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable(false);
            $table->string("token")->nullable(false);
            $table->timestamp("created_at")->default(DB::raw('NOW()'))->nullable(false);
            $table->timestamp("expires_at")->default(DB::raw('DATE_ADD(NOW(), INTERVAL 1 DAY)'))->nullable(false);

            $table->foreign('user_id')->references('id')->on('users');
            $table->unique(['user_id', 'token']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};
