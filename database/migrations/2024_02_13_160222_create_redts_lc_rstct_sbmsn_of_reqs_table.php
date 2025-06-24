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
        Schema::create('redts_lc_rstct_sbmsn_of_reqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subclass_id')->constrained('redts_l_sub_class')->onDelete('cascade')->comment('restricted subclass');
            $table->foreignId('rstd_office_id')->constrained('redts_f_offices')->onDelete('cascade')->comment('restricted office to submit a request');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_lc_rstct_sbmsn_of_reqs');
    }
};
