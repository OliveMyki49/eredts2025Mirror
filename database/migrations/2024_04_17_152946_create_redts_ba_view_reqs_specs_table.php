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
        Schema::create('redts_ba_view_reqs_specs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('redts_b_user')->onDelete('cascade')->comment('indicates user');
            $table->foreignId('office_id')->constrained('redts_f_offices')->onDelete('cascade');
            $table->timestamp('deleted_at')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_ba_view_reqs_specs');
    }
};
