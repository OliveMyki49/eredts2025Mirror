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
        Schema::create('redts_l_sub_class', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classification_id')->constrained('redts_ee_classification')->onDelete('cascade');
            $table->string('description', 255);
            $table->text('full_description')->nullable();
            $table->string('slug', 255);
            $table->string('classification_type', 255)->nullable()->comment('simple, complex, or highly_technical');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_l_sub_class');
    }
};
