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
        // from bottom to top;
        Schema::dropIfExists('redts_ba_view_reqs_specs');
        Schema::dropIfExists('redts_zga_other_pymnt_cost_brkdwns');
        Schema::dropIfExists('redts_zfa_additional_oops');
        Schema::dropIfExists('redts_nc_act_seens');
        Schema::dropIfExists('redts_nb_releasing_routes');
        Schema::dropIfExists('redts_zj_user_oop_approvees');
        Schema::dropIfExists('redts_le_subclass_fees');
        Schema::dropIfExists('redts_lc_rstct_sbmsn_of_reqs');
        Schema::dropIfExists('redts_na_action_attachments');
        Schema::dropIfExists('redts_zi_origin_offices');
        Schema::dropIfExists('redts_zh_cert_perm_routes');
        Schema::dropIfExists('redts_zg_payment_cost_breakdowns');
        Schema::dropIfExists('redts_zf_order_of_payments');
        Schema::dropIfExists('redts_ze_client_doc_attachments');
        Schema::dropIfExists('redts_zb_agencies');
        Schema::dropIfExists('redts_y_requirements');
        Schema::dropIfExists('redts_w_upload_size_limit');
        Schema::dropIfExists('redts_n_actions');
        Schema::dropIfExists('redts_zd_client_doc_infos');
        Schema::dropIfExists('redts_z_applicant_types');
        Schema::dropIfExists('redts_za_transaction_types');
        Schema::dropIfExists('redts_zc_client_infos');
        Schema::dropIfExists('redts_la_process_lengths');
        Schema::dropIfExists('redts_l_sub_class');
        Schema::dropIfExists('redts_j_user_offices');
        Schema::dropIfExists('redts_g_carousel_imgs');
        Schema::dropIfExists('redts_f_offices');
        Schema::dropIfExists('redts_e_region');
        Schema::dropIfExists('redts_ee_classification');
        Schema::dropIfExists('redts_d_profile');
        Schema::dropIfExists('redts_b_user');
        Schema::dropIfExists('redts_a_accesss');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
