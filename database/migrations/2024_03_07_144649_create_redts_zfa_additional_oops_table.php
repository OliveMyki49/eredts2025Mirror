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
        Schema::create('redts_zfa_additional_oops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doc_id')->constrained('redts_zd_client_doc_infos')->onDelete('cascade');
            $table->foreignId('creator_id')->constrained('redts_b_user')->onDelete('cascade');
            $table->string('header_title', 255)->nullable();
            $table->string('header_address', 255)->nullable();
            $table->string('or_no', 255)->nullable();
            $table->date('or_no_dated')->nullable();
            $table->double('pay_amount', 10, 2)->nullable();
            $table->string('purpose', 255)->nullable()->comment('the reason for the request of payment');
            $table->string('clerk_fullname', 255)->nullable();
            $table->string('prepared_by_position', 255)->nullable();
            $table->string('approving_remarks', 255)->nullable();
            $table->string('approving_fullname', 255)->nullable();
            $table->string('approving_position', 255)->nullable();
            $table->string('per_bill_no', 255)->nullable();
            $table->date('per_bill_no_dated')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_zfa_additional_oops');
    }
};
