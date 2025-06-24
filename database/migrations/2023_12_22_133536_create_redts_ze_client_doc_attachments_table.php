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
        Schema::create('redts_ze_client_doc_attachments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doc_info_id');
            $table->char('doc_info_uuid', 36);
            $table->bigInteger('req_id')->nullable();
            $table->integer('app_form_no');
            $table->string('req_slug', 255);
            $table->string('file_path', 255)->default('n/a');
            $table->string('file_name', 255)->default('n/a');
            $table->string('file_link', 255)->default('n/a');
            $table->string('text_input', 255)->default('n/a');
            $table->string('attachment_type', 255)->default('file');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_ze_client_doc_attachments');
    }
};
