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
        Schema::create('redts_zg_payment_cost_breakdowns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doc_id')->constrained('redts_zd_client_doc_infos')->onDelete('cascade')->comment('doc id bind');
            $table->foreignId('ofp_id')->constrained('redts_zf_order_of_payments')->onDelete('cascade')->comment('order of payment id bind');
            $table->double('cost_breakdown_amount', 10, 2);
            $table->string('cost_breakdown', 255);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_zg_payment_cost_breakdowns');
    }
};
