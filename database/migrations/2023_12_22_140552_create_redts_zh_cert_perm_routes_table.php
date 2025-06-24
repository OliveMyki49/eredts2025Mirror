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
        Schema::create('redts_zh_cert_perm_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_class_id')->constrained('redts_l_sub_class')->onDelete('cascade');
            $table->string('route', 255)->comment('url of the create template permit or certificate');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_zh_cert_perm_routes');
    }
};
