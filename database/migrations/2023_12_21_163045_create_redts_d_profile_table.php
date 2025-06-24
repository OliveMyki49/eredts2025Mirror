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
        Schema::create('redts_d_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('redts_b_user')->onDelete('cascade');
            $table->string('fname', 100);
            $table->string('mname', 100);
            $table->string('sname', 100);
            $table->string('suffix', 255)->nullable();
            $table->string('position', 255)->default('unset');
            $table->longText('image')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_d_profile');
    }
};
