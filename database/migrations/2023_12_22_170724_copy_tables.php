<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // run mysql after
        //
        #region from db_rfsoats_official to db_rfsats_migration_testing
        #region ~ ~ ~ content here
        /* 
        INSERT INTO db_rfsats_migration_testing.redts_a_accesss SELECT * FROM db_rfsoats_official.redts_a_accesss;
        INSERT INTO db_rfsats_migration_testing.redts_b_user SELECT * FROM db_rfsoats_official.redts_b_user;
        INSERT INTO db_rfsats_migration_testing.redts_d_profile SELECT * FROM db_rfsoats_official.redts_d_profile;
        INSERT INTO db_rfsats_migration_testing.redts_ee_classification SELECT * FROM db_rfsoats_official.redts_ee_classification;
        INSERT INTO db_rfsats_migration_testing.redts_e_region SELECT * FROM db_rfsoats_official.redts_e_region;
        INSERT INTO db_rfsats_migration_testing.redts_f_offices SELECT * FROM db_rfsoats_official.redts_f_offices;
        INSERT INTO db_rfsats_migration_testing.redts_g_carousel_imgs SELECT * FROM db_rfsoats_official.redts_g_carousel_imgs;
        INSERT INTO db_rfsats_migration_testing.redts_j_user_offices SELECT * FROM db_rfsoats_official.redts_j_user_offices;
        INSERT INTO db_rfsats_migration_testing.redts_l_sub_class SELECT * FROM db_rfsoats_official.redts_l_sub_class;
        INSERT INTO db_rfsats_migration_testing.redts_la_process_lengths SELECT * FROM db_rfsoats_official.redts_la_process_lengths;
        INSERT INTO db_rfsats_migration_testing.redts_zc_client_infos SELECT * FROM db_rfsoats_official.redts_zc_client_infos;
        INSERT INTO db_rfsats_migration_testing.redts_za_transaction_types SELECT * FROM db_rfsoats_official.redts_za_transaction_types;
        INSERT INTO db_rfsats_migration_testing.redts_z_applicant_types SELECT * FROM db_rfsoats_official.redts_z_applicant_types;
        INSERT INTO db_rfsats_migration_testing.redts_zd_client_doc_infos SELECT * FROM db_rfsoats_official.redts_zd_client_doc_infos;
        INSERT INTO db_rfsats_migration_testing.redts_n_actions SELECT * FROM db_rfsoats_official.redts_n_actions;
        INSERT INTO db_rfsats_migration_testing.redts_w_upload_size_limit SELECT * FROM db_rfsoats_official.redts_w_upload_size_limit;
        INSERT INTO db_rfsats_migration_testing.redts_y_requirements SELECT * FROM db_rfsoats_official.redts_y_requirements;
        INSERT INTO db_rfsats_migration_testing.redts_zb_agencies SELECT * FROM db_rfsoats_official.redts_zb_agencies;
        INSERT INTO db_rfsats_migration_testing.redts_ze_client_doc_attachments SELECT * FROM db_rfsoats_official.redts_ze_client_doc_attachments;
        INSERT INTO db_rfsats_migration_testing.redts_zf_order_of_payments SELECT * FROM db_rfsoats_official.redts_zf_order_of_payments;
        INSERT INTO db_rfsats_migration_testing.redts_zg_payment_cost_breakdowns SELECT * FROM db_rfsoats_official.redts_zg_payment_cost_breakdowns;
        INSERT INTO db_rfsats_migration_testing.redts_zh_cert_perm_routes SELECT * FROM db_rfsoats_official.redts_zh_cert_perm_routes;
        INSERT INTO db_rfsats_migration_testing.redts_zi_origin_offices SELECT * FROM db_rfsoats_official.redts_zi_origin_offices;
        INSERT INTO db_rfsats_migration_testing.redts_na_action_attachments SELECT * FROM db_rfsoats_official.redts_na_action_attachments; 
        INSERT INTO db_rfsats_migration_testing.redts_lc_rstct_sbmsn_of_reqs SELECT * FROM db_rfsoats_official.redts_lc_rstct_sbmsn_of_reqs; 
        INSERT INTO db_rfsats_migration_testing.redts_le_subclass_fees SELECT * FROM db_rfsoats_official.redts_le_subclass_fees; 
        INSERT INTO db_rfsats_migration_testing.redts_zj_user_oop_approvees SELECT * FROM db_rfsoats_official.redts_zj_user_oop_approvees; 
        INSERT INTO db_rfsats_migration_testing.redts_nb_releasing_routes SELECT * FROM db_rfsoats_official.redts_nb_releasing_routes; 
        INSERT INTO db_rfsats_migration_testing.redts_nc_act_seens SELECT * FROM db_rfsoats_official.redts_nc_act_seens; 
        INSERT INTO db_rfsats_migration_testing.redts_zfa_additional_oops SELECT * FROM db_rfsoats_official.redts_zfa_additional_oops; 
        INSERT INTO db_rfsats_migration_testing.redts_zga_other_pymnt_cost_brkdwns SELECT * FROM db_rfsoats_official.redts_zga_other_pymnt_cost_brkdwns; 
        INSERT INTO db_rfsats_migration_testing.redts_ba_view_reqs_specs SELECT * FROM db_rfsoats_official.redts_ba_view_reqs_specs; 
        */
        #endregion
        #endregion from db_rfsoats_official to db_rfsats_migration_testing

        #region from db_rfsats_migration_testing to db_rfsats
        #region ~ ~ ~ content here
        /* 
        INSERT INTO db_rfsats.redts_a_accesss SELECT * FROM db_rfsats_migration_testing.redts_a_accesss;
        INSERT INTO db_rfsats.redts_b_user SELECT * FROM db_rfsats_migration_testing.redts_b_user;
        INSERT INTO db_rfsats.redts_d_profile SELECT * FROM db_rfsats_migration_testing.redts_d_profile;
        INSERT INTO db_rfsats.redts_ee_classification SELECT * FROM db_rfsats_migration_testing.redts_ee_classification;
        INSERT INTO db_rfsats.redts_e_region SELECT * FROM db_rfsats_migration_testing.redts_e_region;
        INSERT INTO db_rfsats.redts_f_offices SELECT * FROM db_rfsats_migration_testing.redts_f_offices;
        INSERT INTO db_rfsats.redts_g_carousel_imgs SELECT * FROM db_rfsats_migration_testing.redts_g_carousel_imgs;
        INSERT INTO db_rfsats.redts_j_user_offices SELECT * FROM db_rfsats_migration_testing.redts_j_user_offices;
        INSERT INTO db_rfsats.redts_l_sub_class SELECT * FROM db_rfsats_migration_testing.redts_l_sub_class;
        INSERT INTO db_rfsats.redts_la_process_lengths SELECT * FROM db_rfsats_migration_testing.redts_la_process_lengths;
        INSERT INTO db_rfsats.redts_zc_client_infos SELECT * FROM db_rfsats_migration_testing.redts_zc_client_infos;
        INSERT INTO db_rfsats.redts_za_transaction_types SELECT * FROM db_rfsats_migration_testing.redts_za_transaction_types;
        INSERT INTO db_rfsats.redts_z_applicant_types SELECT * FROM db_rfsats_migration_testing.redts_z_applicant_types;
        INSERT INTO db_rfsats.redts_zd_client_doc_infos SELECT * FROM db_rfsats_migration_testing.redts_zd_client_doc_infos;
        INSERT INTO db_rfsats.redts_n_actions SELECT * FROM db_rfsats_migration_testing.redts_n_actions;
        INSERT INTO db_rfsats.redts_w_upload_size_limit SELECT * FROM db_rfsats_migration_testing.redts_w_upload_size_limit;
        INSERT INTO db_rfsats.redts_y_requirements SELECT * FROM db_rfsats_migration_testing.redts_y_requirements;
        INSERT INTO db_rfsats.redts_zb_agencies SELECT * FROM db_rfsats_migration_testing.redts_zb_agencies;
        INSERT INTO db_rfsats.redts_ze_client_doc_attachments SELECT * FROM db_rfsats_migration_testing.redts_ze_client_doc_attachments;
        INSERT INTO db_rfsats.redts_zf_order_of_payments SELECT * FROM db_rfsats_migration_testing.redts_zf_order_of_payments;
        INSERT INTO db_rfsats.redts_zg_payment_cost_breakdowns SELECT * FROM db_rfsats_migration_testing.redts_zg_payment_cost_breakdowns;
        INSERT INTO db_rfsats.redts_zh_cert_perm_routes SELECT * FROM db_rfsats_migration_testing.redts_zh_cert_perm_routes;
        INSERT INTO db_rfsats.redts_zi_origin_offices SELECT * FROM db_rfsats_migration_testing.redts_zi_origin_offices;
        INSERT INTO db_rfsats.redts_na_action_attachments SELECT * FROM db_rfsats_migration_testing.redts_na_action_attachments; 
        INSERT INTO db_rfsats.redts_lc_rstct_sbmsn_of_reqs SELECT * FROM db_rfsats_migration_testing.redts_lc_rstct_sbmsn_of_reqs; 
        INSERT INTO db_rfsats.redts_le_subclass_fees SELECT * FROM db_rfsats_migration_testing.redts_le_subclass_fees; 
        INSERT INTO db_rfsats.redts_zj_user_oop_approvees SELECT * FROM db_rfsats_migration_testing.redts_zj_user_oop_approvees; 
        INSERT INTO db_rfsats.redts_nb_releasing_routes SELECT * FROM db_rfsats_migration_testing.redts_nb_releasing_routes; 
        INSERT INTO db_rfsats.redts_nc_act_seens SELECT * FROM db_rfsats_migration_testing.redts_nc_act_seens; 
        INSERT INTO db_rfsats.redts_zfa_additional_oops SELECT * FROM db_rfsats_migration_testing.redts_zfa_additional_oops; 
        INSERT INTO db_rfsats.redts_zga_other_pymnt_cost_brkdwns SELECT * FROM db_rfsats_migration_testing.redts_zga_other_pymnt_cost_brkdwns; 
        INSERT INTO db_rfsats.redts_ba_view_reqs_specs SELECT * FROM db_rfsats_migration_testing.redts_ba_view_reqs_specs; 
        */
        #endregion
        #endregion from db_rfsats_migration_testing to db_rfsats

        #region from db_rfsoats_official to db_rfsats
        #region ~ ~ ~ content here
        /* 
        INSERT INTO db_rfsats.redts_a_accesss SELECT * FROM db_rfsoats_official.redts_a_accesss;
        INSERT INTO db_rfsats.redts_b_user SELECT * FROM db_rfsoats_official.redts_b_user;
        INSERT INTO db_rfsats.redts_d_profile SELECT * FROM db_rfsoats_official.redts_d_profile;
        INSERT INTO db_rfsats.redts_ee_classification SELECT * FROM db_rfsoats_official.redts_ee_classification;
        INSERT INTO db_rfsats.redts_e_region SELECT * FROM db_rfsoats_official.redts_e_region;
        INSERT INTO db_rfsats.redts_f_offices SELECT * FROM db_rfsoats_official.redts_f_offices;
        INSERT INTO db_rfsats.redts_g_carousel_imgs SELECT * FROM db_rfsoats_official.redts_g_carousel_imgs;
        INSERT INTO db_rfsats.redts_j_user_offices SELECT * FROM db_rfsoats_official.redts_j_user_offices;
        INSERT INTO db_rfsats.redts_l_sub_class SELECT * FROM db_rfsoats_official.redts_l_sub_class;
        INSERT INTO db_rfsats.redts_la_process_lengths SELECT * FROM db_rfsoats_official.redts_la_process_lengths;
        INSERT INTO db_rfsats.redts_zc_client_infos SELECT * FROM db_rfsoats_official.redts_zc_client_infos;
        INSERT INTO db_rfsats.redts_za_transaction_types SELECT * FROM db_rfsoats_official.redts_za_transaction_types;
        INSERT INTO db_rfsats.redts_z_applicant_types SELECT * FROM db_rfsoats_official.redts_z_applicant_types;
        INSERT INTO db_rfsats.redts_zd_client_doc_infos SELECT * FROM db_rfsoats_official.redts_zd_client_doc_infos;
        INSERT INTO db_rfsats.redts_n_actions SELECT * FROM db_rfsoats_official.redts_n_actions;
        INSERT INTO db_rfsats.redts_w_upload_size_limit SELECT * FROM db_rfsoats_official.redts_w_upload_size_limit;
        INSERT INTO db_rfsats.redts_y_requirements SELECT * FROM db_rfsoats_official.redts_y_requirements;
        INSERT INTO db_rfsats.redts_zb_agencies SELECT * FROM db_rfsoats_official.redts_zb_agencies;
        INSERT INTO db_rfsats.redts_ze_client_doc_attachments SELECT * FROM db_rfsoats_official.redts_ze_client_doc_attachments;
        INSERT INTO db_rfsats.redts_zf_order_of_payments SELECT * FROM db_rfsoats_official.redts_zf_order_of_payments;
        INSERT INTO db_rfsats.redts_zg_payment_cost_breakdowns SELECT * FROM db_rfsoats_official.redts_zg_payment_cost_breakdowns;
        INSERT INTO db_rfsats.redts_zh_cert_perm_routes SELECT * FROM db_rfsoats_official.redts_zh_cert_perm_routes;
        INSERT INTO db_rfsats.redts_zi_origin_offices SELECT * FROM db_rfsoats_official.redts_zi_origin_offices;
        INSERT INTO db_rfsats.redts_na_action_attachments SELECT * FROM db_rfsoats_official.redts_na_action_attachments; 
        INSERT INTO db_rfsats.redts_lc_rstct_sbmsn_of_reqs SELECT * FROM db_rfsoats_official.redts_lc_rstct_sbmsn_of_reqs; 
        INSERT INTO db_rfsats.redts_le_subclass_fees SELECT * FROM db_rfsoats_official.redts_le_subclass_fees; 
        INSERT INTO db_rfsats.redts_zj_user_oop_approvees SELECT * FROM db_rfsoats_official.redts_zj_user_oop_approvees; 
        INSERT INTO db_rfsats.redts_nb_releasing_routes SELECT * FROM db_rfsoats_official.redts_nb_releasing_routes; 
        INSERT INTO db_rfsats.redts_nc_act_seens SELECT * FROM db_rfsoats_official.redts_nc_act_seens; 
        INSERT INTO db_rfsats.redts_zfa_additional_oops SELECT * FROM db_rfsoats_official.redts_zfa_additional_oops; 
        INSERT INTO db_rfsats.redts_zga_other_pymnt_cost_brkdwns SELECT * FROM db_rfsoats_official.redts_zga_other_pymnt_cost_brkdwns; 
        INSERT INTO db_rfsats.redts_ba_view_reqs_specs SELECT * FROM db_rfsoats_official.redts_ba_view_reqs_specs; 
        */
        #endregion
        #endregion from db_rfsoats_official to db_rfsats

        #region from db_rfsats to db_rfsoats_official
        #region ~ ~ ~ content here
        /* 
        INSERT INTO db_rfsoats_official.redts_a_accesss SELECT * FROM db_rfsats.redts_a_accesss;
        INSERT INTO db_rfsoats_official.redts_b_user SELECT * FROM db_rfsats.redts_b_user;
        INSERT INTO db_rfsoats_official.redts_d_profile SELECT * FROM db_rfsats.redts_d_profile;
        INSERT INTO db_rfsoats_official.redts_ee_classification SELECT * FROM db_rfsats.redts_ee_classification;
        INSERT INTO db_rfsoats_official.redts_e_region SELECT * FROM db_rfsats.redts_e_region;
        INSERT INTO db_rfsoats_official.redts_f_offices SELECT * FROM db_rfsats.redts_f_offices;
        INSERT INTO db_rfsoats_official.redts_g_carousel_imgs SELECT * FROM db_rfsats.redts_g_carousel_imgs;
        INSERT INTO db_rfsoats_official.redts_j_user_offices SELECT * FROM db_rfsats.redts_j_user_offices;
        INSERT INTO db_rfsoats_official.redts_l_sub_class SELECT * FROM db_rfsats.redts_l_sub_class;
        INSERT INTO db_rfsoats_official.redts_la_process_lengths SELECT * FROM db_rfsats.redts_la_process_lengths;
        INSERT INTO db_rfsoats_official.redts_zc_client_infos SELECT * FROM db_rfsats.redts_zc_client_infos;
        INSERT INTO db_rfsoats_official.redts_za_transaction_types SELECT * FROM db_rfsats.redts_za_transaction_types;
        INSERT INTO db_rfsoats_official.redts_z_applicant_types SELECT * FROM db_rfsats.redts_z_applicant_types;
        INSERT INTO db_rfsoats_official.redts_zd_client_doc_infos SELECT * FROM db_rfsats.redts_zd_client_doc_infos;
        INSERT INTO db_rfsoats_official.redts_n_actions SELECT * FROM db_rfsats.redts_n_actions;
        INSERT INTO db_rfsoats_official.redts_w_upload_size_limit SELECT * FROM db_rfsats.redts_w_upload_size_limit;
        INSERT INTO db_rfsoats_official.redts_y_requirements SELECT * FROM db_rfsats.redts_y_requirements;
        INSERT INTO db_rfsoats_official.redts_zb_agencies SELECT * FROM db_rfsats.redts_zb_agencies;
        INSERT INTO db_rfsoats_official.redts_ze_client_doc_attachments SELECT * FROM db_rfsats.redts_ze_client_doc_attachments;
        INSERT INTO db_rfsoats_official.redts_zf_order_of_payments SELECT * FROM db_rfsats.redts_zf_order_of_payments;
        INSERT INTO db_rfsoats_official.redts_zg_payment_cost_breakdowns SELECT * FROM db_rfsats.redts_zg_payment_cost_breakdowns;
        INSERT INTO db_rfsoats_official.redts_zh_cert_perm_routes SELECT * FROM db_rfsats.redts_zh_cert_perm_routes;
        INSERT INTO db_rfsoats_official.redts_zi_origin_offices SELECT * FROM db_rfsats.redts_zi_origin_offices;
        INSERT INTO db_rfsoats_official.redts_na_action_attachments SELECT * FROM db_rfsats.redts_na_action_attachments; 
        INSERT INTO db_rfsoats_official.redts_lc_rstct_sbmsn_of_reqs SELECT * FROM db_rfsats.redts_lc_rstct_sbmsn_of_reqs; 
        INSERT INTO db_rfsoats_official.redts_le_subclass_fees SELECT * FROM db_rfsats.redts_le_subclass_fees; 
        INSERT INTO db_rfsoats_official.redts_zj_user_oop_approvees SELECT * FROM db_rfsats.redts_zj_user_oop_approvees; 
        INSERT INTO db_rfsoats_official.redts_nb_releasing_routes SELECT * FROM db_rfsats.redts_nb_releasing_routes; 
        INSERT INTO db_rfsoats_official.redts_nc_act_seens SELECT * FROM db_rfsats.redts_nc_act_seens; 
        INSERT INTO db_rfsoats_official.redts_zfa_additional_oops SELECT * FROM db_rfsats.redts_zfa_additional_oops; 
        INSERT INTO db_rfsoats_official.redts_zga_other_pymnt_cost_brkdwns SELECT * FROM db_rfsats.redts_zga_other_pymnt_cost_brkdwns; 
        INSERT INTO db_rfsoats_official.redts_ba_view_reqs_specs SELECT * FROM db_rfsats.redts_ba_view_reqs_specs; 
        */
        #endregion
        #endregion from db_rfsats to db_rfsoats_official
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
