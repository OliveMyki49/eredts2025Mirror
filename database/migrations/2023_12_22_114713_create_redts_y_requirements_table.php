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
        Schema::create('redts_y_requirements', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique()->notNullable();
            $table->bigInteger('subclass_id');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('description');
            $table->string('attachment_type', 255)->default('file')->comment('file, text, date');
            $table->string('requirement_type', 255)->comment('additional, required');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_y_requirements');
    }
};
