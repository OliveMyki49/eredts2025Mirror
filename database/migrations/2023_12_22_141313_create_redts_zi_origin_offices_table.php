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
        Schema::create('redts_zi_origin_offices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->char('user_uuid', 36);
            $table->bigInteger('doc_id');
            $table->char('doc_uuid', 36);
            $table->bigInteger('origin_office_id');
            $table->char('origin_office_uuid', 36);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            //this is how unique should be use in foreign key
            $table->unique('doc_id'); // Add this line
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_zi_origin_offices');
    }
};
