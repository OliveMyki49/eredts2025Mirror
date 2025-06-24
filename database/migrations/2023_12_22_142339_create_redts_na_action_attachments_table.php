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
        Schema::create('redts_na_action_attachments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('action_id')->nullable();
            $table->char('action_uuid', 36);
            $table->string('remarks', 255)->nullable();
            $table->string('file_path', 255)->default('n/a');
            $table->string('file_name', 255)->default('n/a');
            $table->string('file_link', 255)->default('n/a');
            $table->tinyInteger('public')->default(0)->comment('Allow public views');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_na_action_attachments');
    }
};
