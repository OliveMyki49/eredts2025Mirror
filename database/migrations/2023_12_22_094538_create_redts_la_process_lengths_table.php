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
        Schema::create('redts_la_process_lengths', function (Blueprint $table) { //DEPRECATED
            $table->id();
            $table->foreignId('subclass_id')->constrained('redts_l_sub_class')->onDelete('cascade');
            $table->string('remarks', 255)->nullable();
            $table->integer('process_length_days')->default(0);
            $table->integer('process_length_hours')->default(0);
            $table->integer('process_length_minutes')->default(0);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_la_process_lengths');
    }
};
