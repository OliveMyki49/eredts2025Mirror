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
        Schema::create('redts_le_subclass_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subclass_id')->constrained('redts_l_sub_class')->onDelete('cascade')->comment('the request');
            $table->string('item_name', 255);
            $table->double('fee_amount', 10,2);
            $table->string('cost_grouping', 255)->comment('this will determine the options of fees may be used late for example fee can have 50 20 adn 30 pesos in cost group a1');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_le_subclass_fees');
    }
};
