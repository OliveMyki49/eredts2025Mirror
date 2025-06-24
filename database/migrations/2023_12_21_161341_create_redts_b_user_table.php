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
        Schema::create('redts_b_user', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique()->notNullable();
            $table->string('username', 255)->unique();
            $table->string('password', 255);
            $table->string('email', 255)->unique()->nullable();
            $table->bigInteger('access_id');
            $table->tinyInteger('status')->default(1);
            $table->string('remember_token', 255)->nullable();
            $table->unsignedInteger('admin_delete')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_b_user');
    }
};
