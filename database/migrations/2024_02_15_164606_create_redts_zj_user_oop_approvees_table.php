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
        // this table is used for order of payment to allow specific user types to identify there approving officer
        Schema::create('redts_zj_user_oop_approvees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('redts_b_user')->onDelete('cascade');
            $table->string('approvee_fullname', 255);
            $table->string('approvee_position', 255);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_zj_user_oop_approvees');
    }
};
