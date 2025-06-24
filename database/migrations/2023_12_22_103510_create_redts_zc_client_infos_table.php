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
        Schema::create('redts_zc_client_infos', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 255);
            $table->string('mname', 255);
            $table->string('sname', 255);
            $table->string('suffix', 255)->nullable();
            $table->string('sex', 6);
            $table->string('email', 255);
            $table->tinyInteger('email_verify')->default(0);
            $table->string('contact_no', 255);
            $table->string('access_token', 255);
            $table->string('address', 255);
            $table->string('valid_id_front', 255)->nullable();
            $table->string('valid_id_back', 255)->nullable();
            $table->tinyInteger('data_privacy_consent')->default(0);
            $table->tinyInteger('terms_of_reference')->default(0);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_zc_client_infos');
    }
};
