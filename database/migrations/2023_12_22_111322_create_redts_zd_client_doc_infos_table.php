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
        Schema::create('redts_zd_client_doc_infos', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique()->notNullable();
            $table->string('doc_no', 255)->default('unset');
            $table->bigInteger('application_type_id');
            $table->char('application_type_uuid', 36);
            $table->bigInteger('transaction_type_id');
            $table->char('transaction_type_uuid', 36);
            $table->string('agency', 255)->nullable();
            $table->bigInteger('client_id')->nullable();
            $table->bigInteger('class_id');
            $table->char('class_uuid', 36);
            $table->string('class_slug', 255);
            $table->bigInteger('subclass_id')->nullable();
            $table->string('subclass_slug', 255)->nullable();
            $table->string('remarks', 255)->nullable();
            $table->tinyInteger('validated')->nullable();
            $table->tinyInteger('confidential')->default(0); // Added column with default value
            $table->datetime('doc_date')->nullable();
            $table->datetime('compliance_deadline')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_zd_client_doc_infos');
    }
};
