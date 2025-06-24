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
        Schema::create('redts_j_user_offices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->char('user_uuid', 36);
            $table->bigInteger('offices_id');
            $table->char('offices_uuid', 36);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_j_user_offices');
    }
};
