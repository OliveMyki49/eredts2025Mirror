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
        Schema::create('redts_f_offices', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique()->notNullable();
            $table->bigInteger('region_id');
            $table->string('slug', 255);
            $table->string('office', 255);
            $table->string('full_office_name', 255);
            $table->string('office_type', 255);
            $table->string('mother_unit', 255)->nullable();
            $table->string('header_office_title', 255)->nullable();
            $table->string('email', 255)->default('unset');
            $table->string('tel_no', 255)->default('unset');
            $table->string('cp_no', 255)->default('unset');
            $table->text('office_address')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_f_offices');
    }
};
