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
        Schema::create('redts_nb_releasing_routes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('origin_act')->comment('when you release action this is the origin');
            $table->char('origin_act_uuid', 36);
            $table->bigInteger('released_act')->comment('this is the new action created released to the office it is forwarded or released');
            $table->char('released_act_uuid', 36);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_nb_releasing_routes');
    }
};
