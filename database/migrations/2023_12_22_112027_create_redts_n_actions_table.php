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
        Schema::create('redts_n_actions', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique()->notNullable();
            $table->longText('subject')->nullable();
            $table->bigInteger('doc_id');
            $table->char('doc_uuid', 36);
            $table->string('doc_no', 255);
            $table->bigInteger('sender_client_id')->nullable();
            $table->bigInteger('sender_user_id');
            $table->char('sender_user_uuid', 36)->comment('indicates released by');
            $table->string('sender_type', 255);
            $table->bigInteger('referred_by_office');
            $table->char('referred_by_office_uuid', 36);
            $table->longText('action_taken')->nullable();
            $table->bigInteger('send_to_office');
            $table->char('send_to_office_uuid', 36);
            $table->datetime('validated')->nullable();
            $table->bigInteger('received_id');
            $table->char('received_uuid', 36)->comment('indicates received by');
            $table->timestamp('received')->nullable();
            $table->timestamp('released')->nullable();
            $table->timestamp('final_action')->nullable();
            $table->timestamp('rejected')->nullable();
            $table->timestamp('verification_date')->nullable();
            $table->longText('in_transit_remarks')->nullable();
            $table->longText('document_remarks')->nullable();
            $table->longText('action_remarks')->nullable();
            $table->longText('attachment_remarks')->nullable();
            $table->timestamp('uploaded_act')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redts_n_actions');
    }
};
