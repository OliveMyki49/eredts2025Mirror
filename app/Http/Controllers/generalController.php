<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\user;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\redts_a_access;
use App\Models\redts_n_action;
use App\Models\redts_d_profile;
use App\Models\redts_f_offices;
use App\Models\redts_l_sub_class;
use App\Models\redts_nc_act_seen;
use App\Models\redts_j_user_offices;
use App\Models\redts_zc_client_info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use App\Models\redts_le_subclass_fees;
use App\Models\redts_z_applicant_type;
use App\Models\redts_zi_origin_office;
use App\Models\redts_ba_view_reqs_spec;
use App\Models\redts_ee_classification;
use App\Models\redts_la_process_length;
use Illuminate\Support\Facades\Storage;
use App\Models\redts_nb_releasing_route;
use App\Models\redts_zd_client_doc_info;
use App\Models\redts_zfa_additional_oop;
use App\Models\redts_w_upload_size_limit;
use App\Models\redts_zf_order_of_payment;
use App\Models\redts_zh_cert_perm_routes;
use App\Models\redts_zj_user_oop_approvee;
use App\Models\redts_na_action_attachments;
use App\Models\redts_za_transaction_type;
use App\Models\redts_ze_client_doc_attachments;
use App\Models\redts_zg_payment_cost_breakdown;
use App\Models\redts_zga_other_pymnt_cost_brkdwn;

class generalController extends Controller
{
    #region user info 
    public function fetchotheruserinfo() //CONVERTED TO UUID
    {
        $user_uuid = Auth::user()->uuid;
        $access_uuid = Auth::user()->access_uuid;

        $access_type = redts_a_access::where('uuid', $access_uuid)->whereNull('deleted_at')->first();
        $user_profile = redts_d_profile::where('user_uuid', $user_uuid)->whereNull('deleted_at')->first();
        $user_offices = redts_j_user_offices::select(
            'redts_j_user_offices.id',
            'redts_j_user_offices.user_id',
            'redts_j_user_offices.user_uuid',
            'redts_j_user_offices.offices_id',
            'redts_j_user_offices.offices_uuid',
            'redts_j_user_offices.deleted_at',

            #region office information
            'office.region_id',
            'office.slug',
            'office.office',
            'office.full_office_name',
            'office.office_type',
            #endregion office information
        )
            ->leftJoin('redts_f_offices as office', 'office.uuid', '=', 'redts_j_user_offices.offices_uuid')
            ->where('redts_j_user_offices.user_uuid', $user_uuid)
            ->whereNull('redts_j_user_offices.deleted_at')
            ->first();

        $offices_uuid = null;
        if ($user_offices != null) {
            $offices_uuid = $user_offices->offices_uuid;
        }

        return response()->json([
            'success' => true,
            'access_type' => $access_type,
            // 'user_offices_id' => $offices_id,
            'user_offices_uuid' => $offices_uuid,
            'user_profile' => $user_profile,
            'user_offices' => $user_offices,
        ]);
    }
    public function updateuserprofile(Request $request) //CONVERTED TO UUID
    {
        $uuid = Auth::user()->uuid;
        $fname = $request->input('fname');
        $mname = $request->input('mname') ?? '';
        $sname = $request->input('sname');
        $suffix = $request->input('suffix');
        $position = $request->input('position');
        $username = $request->input('username');
        $email = $request->input('email');
        $prevpass = $request->input('prevpass');
        $pass = $request->input('pass');
        $repass = $request->input('repass');

        // Update profile
        $profile_upt = redts_d_profile::where('user_uuid', $uuid)->update([
            'fname' => $fname,
            'mname' => $mname,
            'sname' => $sname,
            'suffix' => $suffix,
            'position' => $position,
        ]);

        // Update user info
        $user_upt = false;
        if (
            !user::where('username', $username)->whereNot('uuid', $uuid)->exists() &&
            !user::where('email', $email)->whereNot('uuid', $uuid)->exists()
        ) {
            $user_upt = user::where('uuid', $uuid)->update([
                'username' => $username,
                'email' => $email,
            ]);
            $this->recordAction('User has updated his/her username[' . $username . '] / email[' . $email . ']');
        }

        // Update profile photo
        $image_upt = false;
        if ($request->file('uaccimage') != null) {
            $file = $request->file('uaccimage');
            if ($file->isValid()) {
                $upload_limit = redts_w_upload_size_limit::where('id', 1)->first();
                $upload_path = "assets/img/user_pic";
                $extension = $file->getClientOriginalExtension();
                $fileName = $username . '_' . date('YmdHi') . '.' . $extension;
                $size = $file->getSize();

                if ($size <= $upload_limit->size) {
                    $file->move(public_path($upload_path), $fileName);
                    $file_path = $upload_path . '/' . $fileName;
                    redts_d_profile::where('user_uuid', $uuid)->update(['image' => $file_path]);
                    $this->recordAction('User has updated his/her profile picture');
                    $image_upt = true;
                }
            }
        }

        // Update password
        $pass_upt_no_act = false;
        $prevpass_verified = false;
        $pass_upt = false;
        if ($pass != null && User::where('uuid', $uuid)->exists()) {
            $pass_upt_no_act = true;
            $user = User::where('uuid', $uuid)->first();
            if (Hash::check($prevpass, $user->password) && $pass == $repass) {
                $pass_upt = user::where('uuid', $uuid)->update(['password' => bcrypt($pass)]);
                $this->recordAction('User has updated his/her password');
                $prevpass_verified = true;
            }
        }

        // Record log for profile update
        $this->recordAction('User has updated his/her profile');

        return response()->json([
            'success' => true,
            'profile_upt' => $profile_upt,
            'image_upt' => $image_upt,
            'pass_upt_no_act' => $pass_upt_no_act,
            'prevpass_verified' => $prevpass_verified,
            'pass_upt' => $pass_upt,
            'user_upt' => $user_upt,
        ]);
    }
    #endregion user info


    #region general dashboard
    public function fetchactionstats() //CONVERTED TO UUID
    {
        $response = $this->fetchotheruserinfo();
        $data = json_decode($response->getContent(), true); // Decoding the JSON response to an associative array
        // $user_offices_id = $data['user_offices_id']; // get user office id
        $user_offices_uuid = $data['user_offices_uuid']; // get user office uuid
        $user_uuid = Auth::user()->uuid;

        $cnt_in_transit = redts_n_action::where('send_to_office_uuid', $user_offices_uuid)->whereNull('received')->whereNull('final_action')->whereNull('rejected')->whereNull('deleted_at')->count();
        $cnt_received = redts_n_action::where('send_to_office_uuid', $user_offices_uuid)->where('received_uuid', $user_uuid)->whereNull('released')->whereNull('final_action')->whereNull('rejected')->whereNull('deleted_at')->count();
        $cnt_released = redts_n_action::where('send_to_office_uuid', $user_offices_uuid)->where('received_uuid', $user_uuid)->whereNotNull('released',)->whereNull('final_action')->whereNull('rejected')->whereNull('deleted_at')->count();
        $cnt_archived = redts_n_action::where('redts_n_actions.send_to_office_uuid', $user_offices_uuid)->where('redts_n_actions.received_uuid', $user_uuid)->whereNotNull('redts_n_actions.final_action')->whereNull('rejected')->whereNull('redts_n_actions.deleted_at')->count();
        // $cnt_rejected = redts_n_action::where('redts_n_actions.send_to_office_uuid', $user_offices_uuid)->where('redts_n_actions.received_uuid', $user_uuid)->whereNotNull('rejected')->whereNull('redts_n_actions.deleted_at')->count(); //DEPRECATED
        $cnt_snt_crtd_docs = redts_zi_origin_office::where('user_uuid', $user_uuid)->whereNull('deleted_at')->count(); //count all documents created by specific user
        $cnt_documents = 0;

        $get_intransit = redts_n_action::where('send_to_office_uuid', $user_offices_uuid)
            ->whereNull('received')
            ->whereNull('final_action')
            ->whereNull('rejected')
            ->whereNull('deleted_at')
            ->get(['doc_no', 'created_at']);

        $get_doc_deadline = redts_n_action::select(
            'redts_n_actions.doc_no',
            'doc_info.compliance_deadline',
        )
            ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.uuid', '=', 'redts_n_actions.doc_uuid')
            ->where('redts_n_actions.send_to_office_uuid', $user_offices_uuid)
            ->whereNull('redts_n_actions.received')
            ->whereNull('redts_n_actions.final_action')
            ->whereNull('redts_n_actions.rejected')
            ->whereNull('redts_n_actions.deleted_at')
            ->whereNotNull('doc_info.compliance_deadline')
            ->get();

        //count how many in-transit action are not received within 1 day
        $overdue_count = 0;
        foreach ($get_intransit as $dt) {
            $created_date = new DateTime($dt->created_at);
            $now = new DateTime();
            $days_diff = $now->diff($created_date)->days;

            if ($days_diff > 0) {
                $overdue_count++;
            }
        }

        $past_deadline = 0;
        foreach ($get_doc_deadline as $dt) {
            $compliance_deadline = new DateTime($dt->compliance_deadline);
            $now = new DateTime();
            $interval = $now->diff($compliance_deadline);

            // Determine whether the compliance deadline is in the past or future
            $dt->deadline_days = $interval->days; // Store the difference in days
            if ($now > $compliance_deadline) { // Check if compliance date has passed
                $past_deadline++;
            }
        }


        return response()->json([
            'success' => true,
            'cnt_in_transit' => $cnt_in_transit,
            'get_intransit' => $get_intransit,
            'cnt_received' => $cnt_received,
            'cnt_released' => $cnt_released,
            'cnt_arhived' => $cnt_archived,
            // 'cnt_rejected' => $cnt_rejected, //DEPRECATED
            'cnt_snt_crtd_docs' => $cnt_snt_crtd_docs,
            'cnt_documents' => $cnt_documents, //all documents uploaded to the system
            'overdue_count' => $overdue_count,
            'past_deadline' => $past_deadline,
            'get_doc_deadline' => $get_doc_deadline,
        ]);
    }
    #endregion general dashboard

    #region in-transit
    public function fetchclientReqInTransit() //CONVERTED TO UUID
    {
        $response = $this->fetchotheruserinfo(); //get from get user info function
        $data = json_decode($response->getContent(), true); // Decoding the JSON response to an associative array
        $user_offices_uuid = $data['user_offices_uuid']; // get user office uuid

        $data = redts_n_action::select(
            'redts_n_actions.id',
            'redts_n_actions.uuid',
            'redts_n_actions.doc_id',
            'redts_n_actions.doc_uuid',
            'redts_n_actions.sender_client_id', //this doesn't exist
            'redts_n_actions.sender_user_id',
            'redts_n_actions.sender_user_uuid',
            'redts_n_actions.sender_type',
            'redts_n_actions.referred_by_office',
            'redts_n_actions.referred_by_office_uuid',
            'redts_n_actions.action_taken',
            'redts_n_actions.send_to_office',
            'redts_n_actions.send_to_office_uuid',
            'redts_n_actions.received_id',
            'redts_n_actions.received_uuid',
            'redts_n_actions.received',
            'redts_n_actions.validated',
            'redts_n_actions.released',
            'redts_n_actions.final_action',
            'redts_n_actions.rejected',
            'redts_n_actions.verification_date',
            'redts_n_actions.subject',
            'redts_n_actions.action_remarks',
            'redts_n_actions.attachment_remarks',
            'redts_n_actions.uploaded_act',
            'redts_n_actions.deleted_at',
            'redts_n_actions.created_at',
            'redts_n_actions.updated_at',

            #region document info
            'doc_info.doc_no',
            'doc_info.validated',
            'doc_info.class_slug',
            'doc_info.compliance_deadline',
            'app_type.applicant',
            #endregion document info

            #region user sender
            'sender_user.username as sender_username',
            #endregion user sender

            #region referred by office
            'referred_by.office as referred_by_abbrv',
            'referred_by.full_office_name as referred_by_full_office_name',
            #endregion referred by office

            #region send to office
            'send_to.office as send_to_abbrv',
            'send_to.full_office_name as send_to_full_office_name',
            #endregion send to office
        )
            ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.uuid', '=', 'redts_n_actions.doc_uuid')
            ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'doc_info.application_type_uuid')
            ->leftJoin('redts_b_user as sender_user', 'sender_user.uuid', '=', 'redts_n_actions.sender_user_uuid')
            ->leftJoin('redts_f_offices as referred_by', 'referred_by.uuid', '=', 'redts_n_actions.referred_by_office_uuid')
            ->leftJoin('redts_f_offices as send_to', 'send_to.uuid', '=', 'redts_n_actions.send_to_office_uuid')
            ->where('redts_n_actions.send_to_office_uuid', $user_offices_uuid)
            ->whereNull('redts_n_actions.received')
            ->whereNull('redts_n_actions.final_action')
            ->whereNull('redts_n_actions.rejected')
            ->whereNull('redts_n_actions.deleted_at')
            ->get();

        foreach ($data as $key => $dt) {
            // document attachments
            $req_attachments_arr = array();
            $req_attachments = redts_ze_client_doc_attachments::where('doc_info_uuid', $dt->doc_uuid)->where('attachment_type', 'file')->whereNull('deleted_at')->get();
            foreach ($req_attachments as $key => $attach) {
                array_push($req_attachments_arr, [
                    'slug' => $attach->req_slug,
                    'app_form_no' => $attach->app_form_no,
                    'file_path' => $attach->file_path,
                    'file_name' => $attach->file_name,
                ]);
            }
            $dt->req_attachments = $req_attachments_arr;

            // action attachments
            $act_attachments_arr = array();
            $act_attachments = redts_na_action_attachments::where('action_uuid', $dt->uuid)->whereNull('deleted_at')->get();
            foreach ($act_attachments as $key => $attach) {
                array_push($act_attachments_arr, [
                    'slug' => $attach->act_slug,
                    'file_path' => $attach->file_path,
                    'file_name' => $attach->file_name,
                    'remarks' => $attach->remarks,
                ]);
            }
            $dt->act_attachments = $act_attachments_arr;

            // count how many actions received per document do determine if it is new or not
            $act_count_received = redts_n_action::where('doc_uuid', $dt->doc_uuid)->whereNotNull('received')->whereNull('deleted_at')->count();
            $dt->act_count_received = $act_count_received;
        }

        return dataTables($data)->toJson();
    }
    public function updateinTransitAction(Request $request) // CONVERT TO UUID
    {
        $doc_remarks = $request->input('remarks');
        $doc_uuid = $request->input('doc_uuid');
        $in_transit_remarks = $request->input('in_transit_remarks');
        $action_uuid = $request->input('action_uuid');

        #region update action remarks
        $upt_action = redts_n_action::where('uuid', $action_uuid)->update([
            'in_transit_remarks' => $in_transit_remarks,
            'received' => date('Y-m-d H:i:s'),
            'received_id' => Auth::user()->id,
            'received_uuid' => Auth::user()->uuid,
            'uploaded_act' => null,
        ]);
        #endregion update action remarks

        //record log
        $this->recordAction('Receive In-Transit document with doc_uuid ' . $doc_uuid . ' — and action id ' . $action_uuid);

        return response()->json([
            'success' => true,
            '$upt_action' => $upt_action,
        ]);
    }
    #endregion in-transit

    #region received
    public function fetchclientReqReceived()
    {
        $response = $this->fetchotheruserinfo();
        $data = json_decode($response->getContent(), true); // Decoding the JSON response to an associative array
        $user_offices_uuid = $data['user_offices_uuid'];
        $user_uuid = Auth::user()->uuid;

        $data = redts_n_action::select(
            'redts_n_actions.id',
            'redts_n_actions.uuid',
            'redts_n_actions.subject',
            'redts_n_actions.doc_id',
            'redts_n_actions.doc_uuid',
            'redts_n_actions.doc_no',
            'redts_n_actions.sender_client_id',
            'redts_n_actions.sender_user_id',
            'redts_n_actions.sender_user_uuid',
            'redts_n_actions.sender_type',
            'redts_n_actions.referred_by_office',
            'redts_n_actions.referred_by_office_uuid',
            'redts_n_actions.action_taken',
            'redts_n_actions.send_to_office',
            'redts_n_actions.send_to_office_uuid',
            'redts_n_actions.validated',
            'redts_n_actions.received_id',
            'redts_n_actions.received_uuid',
            'redts_n_actions.received',
            'redts_n_actions.released',
            'redts_n_actions.final_action',
            'redts_n_actions.rejected',
            'redts_n_actions.verification_date',
            'redts_n_actions.in_transit_remarks',
            'redts_n_actions.document_remarks',
            'redts_n_actions.action_remarks',
            'redts_n_actions.attachment_remarks',
            'redts_n_actions.deleted_at',
            'redts_n_actions.created_at',
            'redts_n_actions.updated_at',

            #region document info
            'doc_info.doc_no',
            'doc_info.validated',
            'doc_info.class_slug',
            'doc_info.compliance_deadline',
            'app_type.applicant',
            #endregion document info

            #region user sender
            'sender_user.username as sender_username',
            #endregion user sender

            #region referred by office
            'referred_by.office as referred_by_abbrv',
            'referred_by.full_office_name as referred_by_full_office_name',
            #endregion referred by office

            #region send to office
            'send_to.office as send_to_abbrv',
            'send_to.full_office_name as send_to_full_office_name',
            #endregion send to office

            #region action has been seen if null means it is not
            'act_seen.id as act_seen_id',
            'act_seen.created_at as act_seen_date',
            #endregion action has been seen if null means it is not
        )
            ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.uuid', '=', 'redts_n_actions.doc_uuid')
            ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'doc_info.application_type_uuid')
            ->leftJoin('redts_b_user as sender_user', 'sender_user.uuid', '=', 'redts_n_actions.sender_user_uuid')
            ->leftJoin('redts_f_offices as referred_by', 'referred_by.uuid', '=', 'redts_n_actions.referred_by_office_uuid')
            ->leftJoin('redts_f_offices as send_to', 'send_to.uuid', '=', 'redts_n_actions.send_to_office_uuid')
            ->leftJoin('redts_nc_act_seens as act_seen', 'act_seen.action_uuid', '=', 'redts_n_actions.uuid')
            ->where('redts_n_actions.send_to_office_uuid', $user_offices_uuid)
            ->where('redts_n_actions.received_uuid', $user_uuid)
            ->whereNull('redts_n_actions.released')
            ->whereNull('redts_n_actions.final_action')
            ->whereNull('redts_n_actions.rejected')
            ->whereNull('redts_n_actions.deleted_at')
            ->get();

        foreach ($data as $key => $dt) {
            // document attachments
            $req_attachments_arr = array();
            $req_attachments = redts_ze_client_doc_attachments::where('doc_info_uuid', $dt->doc_uuid)->where('attachment_type', 'file')->whereNull('deleted_at')->get();
            foreach ($req_attachments as $key => $attach) {
                array_push($req_attachments_arr, [
                    'slug' => $attach->req_slug,
                    'app_form_no' => $attach->app_form_no,
                    'file_path' => $attach->file_path,
                    'file_name' => $attach->file_name,
                ]);
            }
            $dt->req_attachments = $req_attachments_arr;

            // action attachments
            $act_attachments_arr = array();
            $act_attachments = redts_na_action_attachments::where('action_uuid', $dt->uuid)->whereNull('deleted_at')->get();
            foreach ($act_attachments as $key => $attach) {
                array_push($act_attachments_arr, [
                    'slug' => $attach->act_slug,
                    'file_path' => $attach->file_path,
                    'file_name' => $attach->file_name,
                    'remarks' => $attach->remarks,
                ]);
            }
            $dt->act_attachments = $act_attachments_arr;
        }

        return dataTables($data)->toJson();
    }
    public function storereleaseAction(Request $request)
    {
        $data = $request->all();

        $action_uuid = $request->input('action_uuid');
        $user_uuid = Auth::user()->uuid;
        $user_access = redts_a_access::where('uuid', Auth::user()->access_uuid)->first();
        $user_office = redts_j_user_offices::where('user_uuid', Auth::user()->uuid)->first();
        $action_taken = $request->input('action_taken');
        $attachment_remarks = $request->input('attachment_remarks');
        $subject = $request->input('subject'); // new subject

        #region fetch details of the action request to be used for release action
        $act_dtls = redts_n_action::where('uuid', $action_uuid)->whereNull('deleted_at')->first();

        //region previous action details
        $prev_subject = $act_dtls->subject;
        $prev_doc_id = $act_dtls->doc_id;
        $prev_doc_uuid = $act_dtls->doc_uuid;
        $prev_doc_no = $act_dtls->doc_no;
        $prev_sender_client_id = $act_dtls->sender_client_id;
        //endregion previous action details

        #endregion fetch details of the action request to bhe used for release action

        $new_action_arr = array();
        if ($request->input('vDIR_id') != null) {
            $office_have_user = true;
            foreach ($data['vDIR_id'] as $key => $value) {
                $recipient_office_uuid =  $data['vDIR_uuid'][$key];
                if (redts_j_user_offices::where('offices_uuid', $recipient_office_uuid)->exists()) {
                    //continue
                } else {
                    $office_have_user = false;
                }
            }

            if ($office_have_user == true) {

                #region store new release action for each recipient
                foreach ($data['vDIR_id'] as $key => $value) {
                    $recipient_office_id =  $data['vDIR_id'][$key];
                    $recipient_office_uuid =  $data['vDIR_uuid'][$key];

                    //update action in received
                    redts_n_action::where('uuid', $action_uuid)->update([
                        'action_remarks' => $action_taken,
                        'released' => date('Y-m-d H:i:s'),
                    ]);

                    // store action query
                    $new_action_uuid = $this->generateUuid(); //new uuid
                    $new_action = redts_n_action::create([
                        'uuid' => $new_action_uuid,
                        'subject' => $subject, //as is
                        'doc_id' => $prev_doc_id, //as is
                        'doc_uuid' => $prev_doc_uuid,
                        'doc_no' => $prev_doc_no,
                        'sender_client_id' => null, //as is
                        'sender_user_uuid' => $user_uuid,
                        'sender_type' => $user_access->type, //user info
                        'referred_by_office' => $user_office->offices_id, //user infoz
                        'referred_by_office_uuid' => $user_office->offices_uuid, //user infoz
                        'action_taken' => $action_taken, // user input
                        'send_to_office' => $recipient_office_id, //recipient office
                        'send_to_office_uuid' => $recipient_office_uuid, //recipient office
                        'received_id' => null, //null
                        'received' => null, // null
                        'released ' => null, // null
                        'in_transit_remarks' => null, // null
                        'document_remarks' => null, // null
                        'action_remarks' => null, // null
                        'attachment_remarks' => $attachment_remarks, //user input
                    ]);

                    // region create a link that will identify the last existence of the action
                    redts_nb_releasing_route::create([
                        'origin_act' => $act_dtls->id, //previous action id
                        'origin_act_uuid' => $action_uuid,
                        'released_act' => $new_action->id,
                        'released_act_uuid' => $new_action->uuid,
                    ]);
                    // endregion create a link that will identify the last existence of the action

                    //record log
                    $this->recordAction('Forwarded Client request [doc_no:' . $prev_doc_no . '] to the office [office_id:' . $recipient_office_id . '] with new action_id ' . $new_action->id);

                    array_push($new_action_arr, [
                        'id' => $new_action->id,
                        'uuid' => $new_action->uuid,
                    ]);
                }
                #endregion store new release action for each recipient

                #region store uploadActionDocs
                $action_id = $request->input('action_id');

                #region retrieve document here
                $upload_limit = redts_w_upload_size_limit::where('id', 1)->first();
                $upload_path = "public/assets/doc/action_files";
                #endregion retrieve document here

                #region uploading of documents
                $dt = $request->all();
                $attachmentsMsg = array();
                $count_files = 0;
                if ($request->file('vDIRAtch_file') != null) {
                    foreach ($request->file('vDIRAtch_file') as $key => $file) {
                        $count_files += 1;
                        $file_path = null;
                        if ($file->isValid()) {
                            $vDIRAtch_remark = $dt['vDIRAtch_remark'][$key];

                            $extension = $file->getClientOriginalExtension();
                            $fileName = 'ad' . $action_id . '_' .  $vDIRAtch_remark . '_' . date('YmdHi') . '.' . $extension;
                            $size = $file->getSize();

                            if ($size <= $upload_limit->size) {
                                // You can move the uploaded file to a specific directory if needed
                                $file->move(storage_path($upload_path), $fileName);
                                $file_path = $upload_path . '/' . $fileName;

                                // add in database
                                foreach ($new_action_arr as $key => $new_action) {
                                    redts_na_action_attachments::create([
                                        'action_id' => $new_action['id'],
                                        'action_uuid' => $new_action['uuid'],
                                        'remarks' => $vDIRAtch_remark,
                                        'file_path' => 'action_files',
                                        'file_name' => $fileName,
                                        'file_link' => 'n/a',
                                    ]);
                                }

                                // message
                                array_push($attachmentsMsg, ['msg' => 'uploaded: ' . $file_path]);
                            } else {
                                array_push($attachmentsMsg, ['msg' => 'denied: file size exceeded ' . $file_path]);
                            }
                        }
                    }
                } else {
                    array_push($attachmentsMsg, ['msg' => 'no file has been uploaded']);
                }
                #endregion uploading of documents

                #endregion store uploadActionDocs

                #region update compliance date
                $doc_track_no = $request->input('doc_track_no');
                $comp_date = $request->input('comp_date');
                $comp_time = $request->input('comp_time');
                $set_comp_dt = false;
                if ($doc_track_no != null) {
                    if (redts_zd_client_doc_info::where('doc_no', $doc_track_no)->exists()) {
                        $this->recordAction('Client request denied with doc_id ' . $prev_doc_id . ' and doc_track_no ' . $doc_track_no);
                    } else {
                        //record log
                        $this->recordAction('Client request verified with doc_id ' . $prev_doc_id . ' and doc_track_no ' . $doc_track_no);

                        //set compliance date
                        redts_zd_client_doc_info::where('id', $prev_doc_id)->update([
                            'doc_no' => $doc_track_no,
                            'validated' => true,
                            'compliance_deadline' => $comp_date . ' ' . $comp_time,
                        ]);

                        // date verified in the action
                        redts_n_action::where('id', $action_id)->update([
                            'verification_date' => date('Y-m-d H:i:s'),
                        ]);

                        $set_comp_dt = true;
                    }
                }
                #endregion update compliance date

                #region get creadentials for emailing
                $docInf = redts_zd_client_doc_info::where('id', $prev_doc_id)->first();
                // $cliInf = redts_zc_client_info::where('id', $prev_sender_client_id)->first();
                // $user_email = $cliInf->email;
                #endregion get creadentials for emailing

                return response()->json([
                    'success' => true,
                    'attachmentsMsg' => $attachmentsMsg,
                    'msg' => '',
                    'set_comp_dt' => $set_comp_dt,
                    'subject' => $prev_subject,
                    // 'user_email' => $user_email, not in use anymore
                    'prev_doc_id' => $prev_doc_id,
                    'doc_track_no' => $doc_track_no,
                    'comp_date' => $comp_date,
                    'comp_time' => $comp_time,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'msg' => 'Release Denied: No user found in one of the recipient office',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'attachmentsMsg' => '',
                'msg' => 'No recipients found',
                'set_comp_dt' => false,
            ]);
        }
    }
    public function fetchprocessLengths($subclass_id)
    {
        $process_length = redts_la_process_length::where('subclass_id', $subclass_id)->whereNull('deleted_at')->get();

        return response()->json([
            'success' => true,
            'process_length' => $process_length,
        ]);
    }
    public function updatefinalAction(Request $request)
    {
        $action_id = $request->input('action_id');
        $action_uuid = $request->input('action_uuid');

        $action_taken = $request->input('action_taken');
        $doc_action = $request->input('doc_action');
        $final_action = false;
        $attachment_remarks = $request->input('attachment_remarks');

        if ($action_taken == null) {
            $action_taken = "FINAL ACTION";
        }

        if ($doc_action == 'final_action') {
            #region fetch details of the action request to bhe used for release action
            $act_dtls = redts_n_action::where('uuid', $action_uuid)->whereNull('deleted_at')->first();

            #region previous action details
            $prev_doc_id = $act_dtls->doc_id;
            $prev_doc_uuid = $act_dtls->doc_uuid;
            $prev_sender_client_id = $act_dtls->sender_client_id;
            #endregion previous action details

            #region doc info if verified
            $docInf = redts_zd_client_doc_info::where('uuid', $prev_doc_uuid)->first();
            #endregion doc info if verified

            #region update final action
            $finalupdate = redts_n_action::where('uuid', $action_uuid)->update([
                'final_action' => date('Y-m-d H:i:s'),
                'action_taken' => $action_taken,
                'action_remarks' => $action_taken,
                'attachment_remarks' => $attachment_remarks,
            ]);
            #endregion update final action

            if ($finalupdate) {
                $final_action = true;
            } else {
                $final_action = false;
            }

            #region retrieve document here
            $upload_limit = redts_w_upload_size_limit::where('id', 1)->first();
            $upload_path = "public/assets/doc/action_files";
            #endregion retrieve document here

            #region uploading of documents
            $dt = $request->all();
            $attachmentsMsg = array();
            $count_files = 0;
            if ($request->file('vDIRAtch_file') != null) {
                foreach ($request->file('vDIRAtch_file') as $key => $file) {
                    $count_files += 1;
                    $file_path = null;
                    if ($file->isValid()) {
                        $vDIRAtch_remark = $dt['vDIRAtch_remark'][$key];

                        $extension = $file->getClientOriginalExtension();
                        $fileName = 'ad' . $action_id . '_' .  $vDIRAtch_remark . '_' . date('YmdHi') . '.' . $extension;
                        $size = $file->getSize();

                        if ($size <= $upload_limit->size) {
                            // You can move the uploaded file to a specific directory if needed
                            $file->move(storage_path($upload_path), $fileName);
                            $file_path = $upload_path . '/' . $fileName;

                            // add in database
                            redts_na_action_attachments::create([
                                'action_id' => $action_id,
                                'action_uuid' => $action_uuid,
                                'remarks' => $vDIRAtch_remark,
                                'file_path' => 'action_files',
                                'file_name' => $fileName,
                                'file_link' => 'n/a',
                                'public' => 0, //will not show in public even when final action
                            ]);

                            // message
                            array_push($attachmentsMsg, ['msg' => 'uploaded: ' . $file_path]);
                        } else {
                            array_push($attachmentsMsg, ['msg' => 'denied: file size exceeded ' . $file_path]);
                        }
                    }
                }
            } else {
                array_push($attachmentsMsg, ['msg' => 'no file has been uploaded']);
            }
            #endregion uploading of documents

            if ($finalupdate) {

                //record log
                $this->recordAction('Final update performed for ' . $docInf->doc_no . ' — with action id ' . $action_id);

                return response()->json([
                    'success' => true,
                    'final_action' => $final_action,
                    'subject' => $act_dtls->subject,
                    'doc_track_no' => $docInf->doc_no,
                    'comp_date' => $docInf->compliance_deadline,
                ]);
            }
        }
    }
    public function updaterejectDocAction(Request $request) //DEPRECATED
    {
        $action_id = $request->input('action_id');
        $user_access = redts_a_access::where('id', Auth::user()->access_id)->first();
        $user_office = redts_j_user_offices::where('user_id', Auth::user()->id)->first();
        $action_taken = $request->input('action_taken');
        $doc_action = $request->input('doc_action');
        $doc_reject = $request->input('doc_reject') ?? 0;
        $final_action = false;
        $attachment_remarks = $request->input('attachment_remarks');

        if ($action_taken == null) {
            $action_taken = "REJECTED DOCUMENT";
        }

        if ($doc_action == 'rejected') {
            if ($doc_reject == 1) {

                #region fetch details of the action request to be used for release action
                $act_dtls = redts_n_action::where('id', $action_id)->whereNull('deleted_at')->first();

                #region previous action details
                $prev_doc_id = $act_dtls->doc_id;
                $prev_sender_client_id = $act_dtls->sender_client_id;
                #endregion previous action details

                #region doc info if verified
                $docInf = redts_zd_client_doc_info::where('id', $prev_doc_id)->first();
                #endregion doc info if verified

                #region update rejected
                $finalupdate = redts_n_action::where('id', $action_id)->update([
                    'rejected' => date('Y-m-d H:i:s'),
                    'action_taken' => $action_taken,
                    'action_remarks' => $action_taken,
                    'attachment_remarks' => $attachment_remarks,
                ]);
                #endregion update rejected

                #region retrieve document here
                $upload_limit = redts_w_upload_size_limit::where('id', 1)->first();
                $upload_path = "public/assets/doc/action_files";
                #endregion retrieve document here

                #region uploading of documents
                $dt = $request->all();
                $attachmentsMsg = array();
                $count_files = 0;
                if ($request->file('vDIRAtch_file') != null) {
                    foreach ($request->file('vDIRAtch_file') as $key => $file) {
                        $count_files += 1;
                        $file_path = null;
                        if ($file->isValid()) {
                            $vDIRAtch_remark = $dt['vDIRAtch_remark'][$key];

                            $extension = $file->getClientOriginalExtension();
                            $fileName = 'ad' . $action_id . '_' .  $vDIRAtch_remark . '_' . date('YmdHi') . '.' . $extension;
                            $size = $file->getSize();

                            if ($size <= $upload_limit->size) {
                                // You can move the uploaded file to a specific directory if needed
                                $file->move(storage_path($upload_path), $fileName);
                                $file_path = $upload_path . '/' . $fileName;

                                // add in database
                                redts_na_action_attachments::create([
                                    'action_id' => $action_id,
                                    'remarks' => $vDIRAtch_remark,
                                    'file_path' => 'action_files',
                                    'file_name' => $fileName,
                                    'file_link' => 'n/a',
                                ]);

                                // message
                                array_push($attachmentsMsg, ['msg' => 'uploaded: ' . $file_path]);
                            } else {
                                array_push($attachmentsMsg, ['msg' => 'denied: file size exceeded ' . $file_path]);
                            }
                        }
                    }
                } else {
                    array_push($attachmentsMsg, ['msg' => 'no file has been uploaded']);
                }
                #endregion uploading of documents

                #region get creadentials for emailing
                $cliInf = redts_zc_client_info::where('id', $prev_sender_client_id)->first();
                $user_email = $cliInf->email;
                #endregion get creadentials for emailing

                #endregion fetch details of the action request to be used for release action

                //record log
                $this->recordAction('Document has been rejected ' . $docInf->doc_no . ' — with action id ' . $action_id);

                return response()->json([
                    'success' => true,
                    'final_action' => $final_action,
                    'user_email' => $user_email,
                    'subject' => $act_dtls->subject,
                    'user_email' => $user_email,
                    'doc_track_no' => $docInf->doc_no,
                    'comp_date' => $docInf->compliance_deadline,
                    'action_taken' => $action_taken,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'msg' => 'Action Denied: Agree to the notice to reject document',
                ]);
            }
        }
    }
    public function storeseenrecvdact($action_id, $action_uuid) //CONVERTED TO UUID
    {
        $msg = 'seen';
        if (redts_nc_act_seen::where('action_uuid', $action_uuid)->whereNull('deleted_at')->exists()) {
            $msg = 'act seen before';
        } else {
            //set action as seen
            redts_nc_act_seen::create([
                'action_id' => $action_id,
                'action_uuid' => $action_uuid,
            ]);

            $user_id = Auth::user()->id;
            $username = Auth::user()->username;
            //record log
            $this->recordAction('Action uuid:[' . $action_uuid . '] has been seen by user ' . $username . '[' .  $user_id . ']');
        }

        return response()->json([
            'success' => true,
            'msg' => $msg,
        ]);
    }
    #endregion received

    #region released
    public function fetchclientReqReleased() //CONVERTED TO UUID
    {
        $response = $this->fetchotheruserinfo();
        $data = json_decode($response->getContent(), true); // Decoding the JSON response to an associative array
        $user_offices_uuid = $data['user_offices_uuid'];
        $user_uuid = Auth::user()->uuid;

        $data = redts_n_action::select(
            'redts_n_actions.id',
            'redts_n_actions.uuid',
            'redts_n_actions.subject',
            'redts_n_actions.doc_id',
            'redts_n_actions.doc_uuid',
            'redts_n_actions.doc_no',
            'redts_n_actions.sender_client_id',
            'redts_n_actions.sender_user_id',
            'redts_n_actions.sender_user_uuid',
            'redts_n_actions.sender_type',
            'redts_n_actions.referred_by_office',
            'redts_n_actions.referred_by_office_uuid',
            'redts_n_actions.action_taken',
            'redts_n_actions.send_to_office',
            'redts_n_actions.send_to_office_uuid',
            'redts_n_actions.validated',
            'redts_n_actions.received_id',
            'redts_n_actions.received_uuid',
            'redts_n_actions.received',
            'redts_n_actions.released',
            'redts_n_actions.final_action',
            'redts_n_actions.rejected',
            'redts_n_actions.verification_date',
            'redts_n_actions.in_transit_remarks',
            'redts_n_actions.document_remarks',
            'redts_n_actions.action_remarks',
            'redts_n_actions.attachment_remarks',
            'redts_n_actions.deleted_at',
            'redts_n_actions.created_at',
            'redts_n_actions.updated_at',

            #region document info
            'doc_info.doc_no',
            'doc_info.validated',
            'doc_info.class_slug',
            'doc_info.compliance_deadline',
            'app_type.applicant',
            #endregion document info

            #region user sender
            'sender_user.username as sender_username',
            #endregion user sender

            #region referred by office
            'referred_by.office as referred_by_abbrv',
            'referred_by.full_office_name as referred_by_full_office_name',
            #endregion referred by office

            #region send to office
            'send_to.office as send_to_abbrv',
            'send_to.full_office_name as send_to_full_office_name',
            #endregion send to office
        )
            ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.uuid', '=', 'redts_n_actions.doc_uuid')
            ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'doc_info.application_type_uuid')
            ->leftJoin('redts_b_user as sender_user', 'sender_user.uuid', '=', 'redts_n_actions.sender_user_uuid')
            ->leftJoin('redts_f_offices as referred_by', 'referred_by.uuid', '=', 'redts_n_actions.referred_by_office_uuid')
            ->leftJoin('redts_f_offices as send_to', 'send_to.uuid', '=', 'redts_n_actions.send_to_office_uuid')
            ->where('redts_n_actions.send_to_office_uuid', $user_offices_uuid)
            ->where('redts_n_actions.received_uuid', $user_uuid)
            ->whereNotNull('redts_n_actions.released',)
            ->whereNull('redts_n_actions.final_action')
            ->whereNull('redts_n_actions.rejected')
            ->whereNull('redts_n_actions.deleted_at')
            ->get();

        foreach ($data as $key => $dt) {
            // document attachments
            $req_attachments_arr = array();
            $req_attachments = redts_ze_client_doc_attachments::where('doc_info_uuid', $dt->doc_uuid)->where('attachment_type', 'file')->whereNull('deleted_at')->get();
            foreach ($req_attachments as $key => $attach) {
                array_push($req_attachments_arr, [
                    'slug' => $attach->req_slug,
                    'app_form_no' => $attach->app_form_no,
                    'file_path' => $attach->file_path,
                    'file_name' => $attach->file_name,
                ]);
            }
            $dt->req_attachments = $req_attachments_arr;

            // action attachments
            $act_attachments_arr = array();
            $act_attachments = redts_na_action_attachments::where('action_uuid', $dt->uuid)->whereNull('deleted_at')->get();
            foreach ($act_attachments as $key => $attach) {
                array_push($act_attachments_arr, [
                    'slug' => $attach->act_slug,
                    'file_path' => $attach->file_path,
                    'file_name' => $attach->file_name,
                    'remarks' => $attach->remarks,
                ]);
            }
            $dt->act_attachments = $act_attachments_arr;

            // get forwarded info
            if (redts_nb_releasing_route::where('origin_act_uuid', $dt->uuid)->exists()) {
                $releasing_route = redts_nb_releasing_route::select(
                    //NOTE: THIS DATA ARE COMMENTED BEACUSE IT IS NOT IN USE AND ALSO TO MAKE QUERY FASTER
                    // 'redts_nb_releasing_routes.id',
                    // 'redts_nb_releasing_routes.origin_act',
                    // 'redts_nb_releasing_routes.released_act',
                    // 'redts_nb_releasing_routes.deleted_at',

                    // 'action.subject',
                    // 'action.doc_id',
                    // 'action.sender_client_id',
                    // 'action.sender_user_id',
                    // 'action.sender_type',
                    // 'action.referred_by_office',
                    // 'action.action_taken',
                    // 'action.send_to_office',
                    // 'action.validated',
                    'action.received_id', //
                    'action.received_uuid', //
                    // 'action.received',
                    // 'action.released',
                    'action.final_action', //
                    // 'action.rejected',
                    // 'action.verification_date',
                    // 'action.in_transit_remarks',
                    // 'action.document_remarks',
                    // 'action.action_remarks',
                    // 'action.attachment_remarks',

                    #region send to office
                    'send_to.office as send_to_abbrv',
                    'send_to.full_office_name as send_to_full_office_name',
                    #endregion send to office

                    #region action has been seen if null means it is not
                    'act_seen.id as act_seen_id', //exception on uuid its not in relationship
                    #region action has been seen if null means it is not
                )
                    ->leftJoin('redts_n_actions as action', 'action.uuid', '=', 'redts_nb_releasing_routes.released_act_uuid')
                    ->leftJoin('redts_f_offices as send_to', 'send_to.uuid', '=', 'action.send_to_office_uuid')
                    ->leftJoin('redts_nc_act_seens as act_seen', 'act_seen.action_uuid', '=', 'redts_nb_releasing_routes.released_act_uuid') //check if this is seen released action
                    ->where('redts_nb_releasing_routes.origin_act_uuid', $dt->uuid)
                    ->whereNull('redts_nb_releasing_routes.deleted_at')
                    ->get();


                $dt->releasing_route = $releasing_route;
            } else {
                $dt->releasing_route = null;
            }

            //check if document process is archived / ended
            if (redts_n_action::where('doc_uuid', $dt->doc_uuid)->whereNotNull('final_action')->exists()) {
                $dt->doc_archived = true;
            } else {
                $dt->doc_archived = false;
            }
        }

        return dataTables($data)->toJson();
    }
    #endregion released

    #region archived
    public function fetchclientReqAchived()
    {
        $response = $this->fetchotheruserinfo();
        $data = json_decode($response->getContent(), true); // Decoding the JSON response to an associative array
        $user_offices_uuid = $data['user_offices_uuid'];
        $user_uuid = Auth::user()->uuid;

        $data = redts_n_action::select(
            'redts_n_actions.id',
            'redts_n_actions.uuid',
            'redts_n_actions.subject',
            'redts_n_actions.doc_id',
            'redts_n_actions.doc_uuid',
            'redts_n_actions.doc_no',
            'redts_n_actions.sender_client_id',
            'redts_n_actions.sender_user_id',
            'redts_n_actions.sender_user_uuid',
            'redts_n_actions.sender_type',
            'redts_n_actions.referred_by_office',
            'redts_n_actions.referred_by_office_uuid',
            'redts_n_actions.action_taken',
            'redts_n_actions.send_to_office',
            'redts_n_actions.send_to_office_uuid',
            'redts_n_actions.validated',
            'redts_n_actions.received_id',
            'redts_n_actions.received_uuid',
            'redts_n_actions.received',
            'redts_n_actions.released',
            'redts_n_actions.final_action',
            'redts_n_actions.rejected',
            'redts_n_actions.verification_date',
            'redts_n_actions.in_transit_remarks',
            'redts_n_actions.document_remarks',
            'redts_n_actions.action_remarks',
            'redts_n_actions.attachment_remarks',
            'redts_n_actions.deleted_at',
            'redts_n_actions.created_at',
            'redts_n_actions.updated_at',

            #region document info
            'doc_info.doc_no',
            'doc_info.validated',
            'doc_info.class_slug',
            'doc_info.compliance_deadline',
            'app_type.applicant',
            #endregion document info

            #region user sender
            'sender_user.username as sender_username',
            #endregion user sender

            #region referred by office
            'referred_by.office as referred_by_abbrv',
            'referred_by.full_office_name as referred_by_full_office_name',
            #endregion referred by office

            #region send to office
            'send_to.office as send_to_abbrv',
            'send_to.full_office_name as send_to_full_office_name',
            #endregion send to office
        )
            ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.uuid', '=', 'redts_n_actions.doc_uuid')
            ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'doc_info.application_type_uuid')
            ->leftJoin('redts_b_user as sender_user', 'sender_user.uuid', '=', 'redts_n_actions.sender_user_uuid')
            ->leftJoin('redts_f_offices as referred_by', 'referred_by.uuid', '=', 'redts_n_actions.referred_by_office_uuid')
            ->leftJoin('redts_f_offices as send_to', 'send_to.uuid', '=', 'redts_n_actions.send_to_office_uuid')
            ->where('redts_n_actions.send_to_office_uuid', $user_offices_uuid)
            ->where('redts_n_actions.received_uuid', $user_uuid)
            ->whereNotNull('redts_n_actions.final_action')
            ->whereNull('redts_n_actions.rejected')
            ->whereNull('redts_n_actions.deleted_at')
            ->get();

        foreach ($data as $key => $dt) {
            // document attachments
            $req_attachments_arr = array();
            $req_attachments = redts_ze_client_doc_attachments::where('doc_info_uuid', $dt->doc_uuid)->where('attachment_type', 'file')->whereNull('deleted_at')->get();
            foreach ($req_attachments as $key => $attach) {
                array_push($req_attachments_arr, [
                    'slug' => $attach->req_slug,
                    'app_form_no' => $attach->app_form_no,
                    'file_path' => $attach->file_path,
                    'file_name' => $attach->file_name,
                ]);
            }
            $dt->req_attachments = $req_attachments_arr;

            // action attachments
            $act_attachments_arr = array();
            $act_attachments = redts_na_action_attachments::where('action_uuid', $dt->uuid)->whereNull('deleted_at')->get();
            foreach ($act_attachments as $key => $attach) {
                array_push($act_attachments_arr, [
                    'slug' => $attach->act_slug,
                    'file_path' => $attach->file_path,
                    'file_name' => $attach->file_name,
                    'remarks' => $attach->remarks,
                ]);
            }
            $dt->act_attachments = $act_attachments_arr;
        }

        return dataTables($data)->toJson();
    }
    #endregion archived

    #region created
    public function fetchclientReqCreated()
    {
        if (Auth::user()->access_id != null) { //protect the data from leaking if someone remove the access code restriction in on the display
            $response = $this->fetchotheruserinfo();
            $data = json_decode($response->getContent(), true); // Decoding the JSON response to an associative array
            $user_offices_uuid = $data['user_offices_uuid'];
            $user_uuid = Auth::user()->uuid;

            $data = redts_zd_client_doc_info::select(
                #region document info
                'redts_zd_client_doc_infos.id',
                'redts_zd_client_doc_infos.uuid',
                'redts_zd_client_doc_infos.doc_no',
                'redts_zd_client_doc_infos.application_type_id',
                'redts_zd_client_doc_infos.application_type_uuid',
                'redts_zd_client_doc_infos.transaction_type_id',
                'redts_zd_client_doc_infos.transaction_type_uuid',
                'redts_zd_client_doc_infos.agency',
                'redts_zd_client_doc_infos.client_id',
                'redts_zd_client_doc_infos.class_id',
                'redts_zd_client_doc_infos.class_uuid',
                'redts_zd_client_doc_infos.class_slug',
                'redts_zd_client_doc_infos.subclass_id',
                'redts_zd_client_doc_infos.subclass_slug',
                'redts_zd_client_doc_infos.remarks',
                'redts_zd_client_doc_infos.validated',
                'redts_zd_client_doc_infos.doc_date',
                'redts_zd_client_doc_infos.compliance_deadline',
                'redts_zd_client_doc_infos.created_at',
                #endregion document info

                #region applicant type
                'app_type.applicant as app_type',
                #endregion applicant type

                #region transaction type
                // 'transact_type.transaction', //merged to the application column
                'transact_type.slug as transact_slug', //displayed only as slug / abbreviation
                #endregion transaction type

                #region class
                'class.description as class_title',
                #endregion class

                #region office
                'office.full_office_name',
                #endregion office
            )
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'redts_zd_client_doc_infos.application_type_uuid')
                ->leftJoin('redts_za_transaction_types as transact_type', 'transact_type.uuid', '=', 'redts_zd_client_doc_infos.transaction_type_uuid')
                ->leftJoin('redts_ee_classification as class', 'class.uuid', '=', 'redts_zd_client_doc_infos.class_uuid')
                ->leftJoin('redts_zi_origin_offices as origin', 'origin.doc_uuid', '=', 'redts_zd_client_doc_infos.uuid')
                ->leftJoin('redts_f_offices as office', 'office.uuid', '=', 'origin.origin_office_uuid')
                ->where('origin.user_uuid', $user_uuid)
                ->whereNull('redts_zd_client_doc_infos.deleted_at')
                ->get();

            foreach ($data as $key => $dt) {
                // document attachments
                $req_attachments_arr = array();
                $req_attachments = redts_ze_client_doc_attachments::where('doc_info_uuid', $dt->uuid)->where('attachment_type', 'file')->whereNull('deleted_at')->get();
                foreach ($req_attachments as $key => $attach) {
                    array_push($req_attachments_arr, [
                        'slug' => $attach->req_slug,
                        'app_form_no' => $attach->app_form_no,
                        'file_path' => $attach->file_path,
                        'file_name' => $attach->file_name,
                    ]);
                }
                $dt->req_attachments = $req_attachments_arr;

                // get all action with specific doc_id
                $doc_action_query = redts_n_action::where('doc_uuid', $dt->uuid)->whereNull('deleted_at')->get(['uuid']); //all action for the document
                $last_doc_action_query = redts_n_action::where('doc_uuid', $dt->uuid)
                    ->whereNull('deleted_at')
                    ->latest('created_at')
                    ->first(); //get the last action
                $last_doc_action = redts_n_action::select(
                    'redts_n_actions.id',
                    'redts_n_actions.uuid',
                    'redts_n_actions.subject',
                    'redts_n_actions.doc_id',
                    'redts_n_actions.doc_uuid',
                    'redts_n_actions.doc_no',
                    'redts_n_actions.sender_client_id',
                    'redts_n_actions.sender_user_id',
                    'redts_n_actions.sender_user_uuid',
                    'redts_n_actions.sender_type',
                    'redts_n_actions.referred_by_office',
                    'redts_n_actions.referred_by_office_uuid',
                    'redts_n_actions.action_taken',
                    'redts_n_actions.send_to_office',
                    'redts_n_actions.send_to_office_uuid',
                    'redts_n_actions.validated',
                    'redts_n_actions.received_id',
                    'redts_n_actions.received_uuid',
                    'redts_n_actions.received',
                    'redts_n_actions.released',
                    'redts_n_actions.final_action',
                    'redts_n_actions.rejected',
                    'redts_n_actions.verification_date',
                    'redts_n_actions.in_transit_remarks',
                    'redts_n_actions.document_remarks',
                    'redts_n_actions.action_remarks',
                    'redts_n_actions.attachment_remarks',
                    'redts_n_actions.deleted_at',
                    'redts_n_actions.created_at',

                    #region referred by office
                    'referred_by.office as referred_by_abbrv',
                    'referred_by.full_office_name as referred_by_full_office_name',
                    #endregion referred by office

                    #region send to office
                    'send_to.office as send_to_abbrv',
                    'send_to.full_office_name as send_to_full_office_name',
                    #endregion send to office
                )
                    ->leftJoin('redts_f_offices as referred_by', 'referred_by.uuid', '=', 'redts_n_actions.referred_by_office_uuid')
                    ->leftJoin('redts_f_offices as send_to', 'send_to.uuid', '=', 'redts_n_actions.send_to_office_uuid')
                    ->where('redts_n_actions.uuid', $last_doc_action_query->uuid)
                    ->whereNull('redts_n_actions.deleted_at')
                    ->first();

                $stat_msg = '';
                $stat_msg_stat = '';
                if ($last_doc_action->final_action == null) {
                    if ($last_doc_action->received_id != null) {
                        $stat_msg = 'Received,' . strtoupper($last_doc_action->send_to_abbrv) . '';
                        $stat_msg_stat = 'received';
                    } else {
                        $stat_msg = 'In-Transit,' . strtoupper($last_doc_action->send_to_abbrv) . '';
                        $stat_msg_stat = 'intransit';
                    }
                } else {
                    $stat_msg = 'Archived,' . strtoupper($last_doc_action->send_to_abbrv) . '';
                    $stat_msg_stat = 'completed';
                }
                $dt->stat_msg = $stat_msg;
                $dt->stat_msg_stat = $stat_msg_stat;

                // action attachments
                $act_attachments_arr = array();

                // Check if there are any actions before trying to get attachments
                // if ($last_doc_action_query->isNotEmpty()) {
                foreach ($doc_action_query as $key => $daq) {
                    $act_attachments = redts_na_action_attachments::where('action_uuid', $daq->uuid)->whereNull('deleted_at')->get();
                    foreach ($act_attachments as $key => $attach) {
                        array_push($act_attachments_arr, [
                            'slug' => $attach->act_slug,
                            'file_path' => $attach->file_path,
                            'file_name' => $attach->file_name,
                            'remarks' => $attach->remarks,
                        ]);
                    }

                    $dt->act_attachments = $act_attachments_arr;
                }
                $dt->act_attachments = $act_attachments_arr;
                // } else {
                //     $dt->act_attachments = null;
                // }
            }

            return dataTables($data)->toJson();
        }
    }
    #endregion created

    #region add new document
    /* 
    public function fetchclientfullnameandid()
    {
        //get id and fullname only
        $all_clients_names_and_id = redts_zc_client_info::select(
            'redts_zc_client_infos.id',
            'redts_zc_client_infos.fname',
            'redts_zc_client_infos.mname',
            'redts_zc_client_infos.sname'
        )
            //By using join, the query will only include clients that have a matching client_id in the redts_zd_client_doc_infos table
            ->join('redts_zd_client_doc_infos as doc_info', 'doc_info.client_id', '=', 'redts_zc_client_infos.id')
            ->whereNull('redts_zc_client_infos.deleted_at')
            ->distinct()
            ->get();

        return response()->json([
            'success' => true,
            'clients' => $all_clients_names_and_id,
        ]);
    } 
    */

    //get classification
    public function fetchclassslug(Request $request)
    {
        $class_id = $request->input('class_id');

        // get application classification
        $class_slug = redts_ee_classification::where('id', $class_id)->whereNull('deleted_at')->first(['slug']);

        return response()->json([
            'class_id' => $class_id,
            'success' => true,
            'class_slug' => $class_slug->slug,
        ]);
    }

    //get user offfice
    public function fetchuseroffice()
    {
        $user_uuid = Auth::user()->uuid;

        $user_office = redts_j_user_offices::select(
            'office.office',
        )
            ->leftJoin('redts_f_offices as office', 'office.uuid', '=', 'redts_j_user_offices.offices_uuid')
            ->where('redts_j_user_offices.user_uuid', $user_uuid)
            ->whereNull('redts_j_user_offices.deleted_at')
            ->first();

        return response()->json([
            "success" => true,
            "user_office" => $user_office->office,
        ]);
    }
    public function fetchapptransacttype()
    {
        $app_type = redts_z_applicant_type::select(
            'redts_z_applicant_types.id as app_id',
            'redts_z_applicant_types.uuid as app_uuid',
            'redts_z_applicant_types.applicant',
            'transac_type.uuid as transac_uuid',
            'transac_type.slug as transac_slug',
        )
            ->leftJoin('redts_za_transaction_types as transac_type', 'transac_type.uuid', '=', 'redts_z_applicant_types.transaction_uuid')
            ->whereNull('redts_z_applicant_types.deleted_at')
            ->get();

        return response()->json([
            "success" => true,
            "app_type" => $app_type,
        ]);
    }
    public function generateUuid() //universal unique ID generator
    {
        $generated_uuid = (string) Str::uuid();
        return $generated_uuid;
    }
    public function storenewdoc(Request $request)
    {
        $success = true;
        $new_doc_uuid = $this->generateUuid(); //new uuid
        $doc_no = $request->input('doc_no');
        $doc_date = $request->input('doc_date');
        $class_slug = $request->input('class_slug');
        $confidential = $request->input('confidential');
        $compliance_deadline = $request->input('compliance_deadline');
        $app_type_uuid = $request->input('app_type_uuid');
        $transac_uuid = $request->input('transac_uuid');
        $subject = $request->input('subject');
        $AttchRemarks = $request->input('AttchRemarks');
        $dt = $request->all();

        //get application type details
        $app_type = redts_z_applicant_type::select('redts_z_applicant_types.id as app_id', 'transac_type.id as transac_id')
            ->leftJoin('redts_za_transaction_types as transac_type', 'transac_type.uuid', '=', 'redts_z_applicant_types.transaction_uuid')
            ->whereNull('redts_z_applicant_types.deleted_at')
            ->first();

        //get class id and uuid
        $class_info = redts_ee_classification::where('slug', $class_slug)->whereNull('deleted_at')->first(['id', 'uuid']);

        $user_office = user::select(
            'offices.id as office_id',
            'bind.offices_uuid',
        )
            ->leftJoin('redts_j_user_offices as bind', 'bind.user_uuid', '=', 'redts_b_user.uuid')
            ->leftJoin('redts_f_offices as offices', 'offices.uuid', '=', 'bind.offices_uuid')
            ->where('redts_b_user.uuid', Auth::user()->uuid)
            ->whereNull('redts_b_user.deleted_at')
            ->first();

        // check offices and files
        $officeCollectionCheck = array();
        $filearrCollectionCheck = array();

        #region store doc info
        $create_doc = redts_zd_client_doc_info::create([
            'uuid' => $new_doc_uuid,
            'doc_no' => $doc_no,
            'application_type_id' => $app_type->app_id,
            'application_type_uuid' => $app_type_uuid,
            'transaction_type_id' => $app_type->transac_id,
            'transaction_type_uuid' => $transac_uuid,
            'agency' => null,
            'client_id' => null,
            'class_id' => $class_info->id,
            'class_uuid' => $class_info->uuid,
            'class_slug' => $class_slug,
            'subclass_id' => null,
            'subclass_slug' => null,
            'remarks' => $subject,
            'validated' => 1,
            'doc_date' => $doc_date,
            'compliance_deadline' => $compliance_deadline,
        ]);
        #endregion store doc info

        if ($create_doc) { //if doc info is created successfuly continue
            foreach ($dt['addndoc_office'] as $key => $value) { //get each office needed for uploading
                $office_id = $dt['addndoc_id'][$key]; //office destination id
                $office_uuid = $dt['addndoc_uuid'][$key]; //office destination uuid
                $office = $dt['addndoc_office'][$key]; //office name slug


                #region store origin office of the created request
                redts_zi_origin_office::create([
                    'user_id' => Auth::user()->id,
                    'user_uuid' => Auth::user()->uuid,
                    'doc_id' => $create_doc->id,
                    'doc_uuid' => $create_doc->uuid,
                    'origin_office_id' => $user_office->office_id,
                    'origin_office_uuid' => $user_office->offices_uuid,
                ]);
                #endregion store origin office of the created request

                #region store action
                $action_uuid = $this->generateUuid(); //new uuid
                redts_n_action::create([
                    'uuid' => $action_uuid,
                    'subject' => $subject,
                    'doc_id' => $create_doc->id,
                    'doc_uuid' => $create_doc->uuid,
                    'doc_no' => $doc_no,
                    'sender_client_id' => null,
                    'sender_user_id' =>  Auth::user()->id,
                    'sender_user_uuid' => Auth::user()->uuid,
                    'sender_type' => 'User',
                    'referred_by_office' => $user_office->office_id,
                    'referred_by_office_uuid' => $user_office->offices_uuid,
                    'action_taken' => null, /* change when needed */
                    'send_to_office' => $office_id = $dt['addndoc_id'][$key],
                    'send_to_office_uuid' => $office_uuid = $dt['addndoc_uuid'][$key],
                    'validated' => date('Y-m-d H:m:s'),
                    'received_id' => null,
                    'received_uuid' => null,
                    'received' => null,
                    'released' => null,
                    'final_action' => null,
                    'rejected' => null,
                    'verification_date' => date('Y-m-d H:m:s'),
                    'in_transit_remarks' => null,
                    'document_remarks' => null,
                    'action_remarks' => null,
                    'attachment_remarks' => null,
                ]);
                #endregion store action

                //attachment remarks here
                if ($AttchRemarks != '' && $AttchRemarks != null) {
                    //update attachment remarks details
                    $newAttachment = redts_ze_client_doc_attachments::create([
                        'doc_info_id' => $create_doc->id,
                        'doc_info_uuid' => $create_doc->uuid,
                        'req_id' => null,
                        'app_form_no' => 1,
                        'req_slug' => 'Attachment Remarks',
                        'file_path' => 'n/a',
                        'file_name' => 'n/a',
                        'file_link' => 'n/a',
                        'text_input' => $AttchRemarks,
                        'attachment_type' => 'text',
                    ]);
                }

                // for file uploading
                if ($request->file('addndocFileUploads') != null) {
                    #region retrieve document here
                    $upload_limit = redts_w_upload_size_limit::where('id', 1)->first();
                    $upload_path = "public/assets/doc/doc_req_files";
                    #endregion retrieve document here

                    foreach ($request->file('addndocFileUploads') as $key => $file) {
                        if ($file->isValid()) {
                            $extension = $file->getClientOriginalExtension();
                            $origFileName = $file->getClientOriginalName();
                            $fileName = $origFileName . '[' . date('YmdHi') . ']' . $extension;
                            $size = $file->getSize();
                            if ($size <= $upload_limit->size) {
                                // get stop sending error if uploaded
                                try {

                                    /* 
                                        upload files here
                                        You can move the uploaded file to a specific directory if needed 
                                    */
                                    $file->move(storage_path($upload_path), $fileName);
                                    $file_path = 'doc_req_files/' . $fileName;

                                    //update file details
                                    $newAttachment = redts_ze_client_doc_attachments::create([
                                        'doc_info_id' => $create_doc->id,
                                        'doc_info_uuid' => $create_doc->uuid,
                                        'req_id' => null,
                                        'app_form_no' => 1,
                                        'req_slug' => 'Attachment',
                                        'file_path' => 'doc_req_files',
                                        'file_name' => $fileName,
                                        'file_link' => 'n/a',
                                        'text_input' => 'n/a',
                                        'attachment_type' => 'file',
                                    ]);

                                    // check file names
                                    array_push($filearrCollectionCheck, $file->getClientOriginalName());
                                } catch (\Exception $e) {
                                    // Handle the exception
                                    $success = false;
                                }
                            }
                        } else {
                            array_push($filearrCollectionCheck, 'Denied file size: ' . $file->getClientOriginalName());
                        }
                    }
                }

                array_push($officeCollectionCheck, [
                    'office_id' => $office_id,
                    'office_uuid' => $office_uuid,
                    'office' => $office,
                ]);
            } //end of foreach creating action for each office
        } //end of if condiion creating doc

        return response()->json([
            'success' => $success,
            'msg' => 'success upload',
            'data' => array([
                '1_doc_date' => $doc_date,
                '2_class_slug' => $class_slug,
                '3_doc_no' => $doc_no,
                '4_confidential' => $confidential,
                '5_compliance_deadline' => $compliance_deadline,
                '6_app_type_uuid' => $app_type_uuid,
                '7_transac_uuid' => $transac_uuid,
                '8_subject' => $subject,
            ]),
            'filearrCollectionCheck' => $filearrCollectionCheck,
            'officeCollectionCheck' => $officeCollectionCheck,
            'user_office' => $user_office,
        ]);
    }
    #endregion add new document

    #region view id decrypt
    public function fetchclientIdView($username, $client_id)
    {
        $client_inf = redts_zc_client_info::where('id', $client_id)->first();

        if (Auth::check()) {
            if (User::where('username', $username)->where('status', 1)->whereNull('deleted_at')->exists()) {
                if (Auth::check()) {
                    return view('general-dash-view-client-id', [
                        'username' => $username,
                        'client_id' => $client_id,
                        'pathfront' => $client_inf->valid_id_front,
                        'pathback' => $client_inf->valid_id_back,
                    ]);
                } else {
                    // alert message html message sample
                    return $this->pageResponse()['page403'];
                }
            } else {
                // alert message html message sample
                return $this->pageResponse()['usernameQuestioned'];
            }
        } else {
            return $this->pageResponse()['page403'];
        }
    }
    #endregion view id decrypt

    #region id reencryption
    public function fetchclientIdViewReencrypt($client_id)
    {
        $client_inf = redts_zc_client_info::where('id', $client_id)->first();

        $this->idreencryption($client_inf->valid_id_front);
        $this->idreencryption($client_inf->valid_id_back);
    }
    public function idreencryption($id_path)
    {
        $path = $id_path;

        if ($path != null) { //prevent encrypting null
            $cryptedPath = public_path($path);

            // Check if the file is already encrypted
            $fileContents = file_get_contents($cryptedPath);
            $isEncrypted = Str::startsWith($fileContents, 'eyJpdiI6I');

            if (!$isEncrypted) {
                // reencrypt image here
                try {
                    $reencryptImage = Crypt::encryptString(file_get_contents($cryptedPath));
                    file_put_contents($cryptedPath, $reencryptImage);
                } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'failed image reincryption',
                    ]);
                }
            }
        }
    }
    #endregion id reencryption

    #region fetch document infos
    public  function fetchdocInfos($doc_uuid) // CONVERTED TO UUID
    {
        $doc_info = redts_zd_client_doc_info::select(
            'redts_zd_client_doc_infos.uuid',
            'redts_zd_client_doc_infos.doc_no',
            'redts_zd_client_doc_infos.application_type_id',
            'redts_zd_client_doc_infos.application_type_uuid',
            'redts_zd_client_doc_infos.transaction_type_id',
            'redts_zd_client_doc_infos.transaction_type_uuid',
            'redts_zd_client_doc_infos.agency',
            'redts_zd_client_doc_infos.client_id',
            'redts_zd_client_doc_infos.class_id',
            'redts_zd_client_doc_infos.class_uuid',
            'redts_zd_client_doc_infos.class_slug',
            'redts_zd_client_doc_infos.subclass_id',
            'redts_zd_client_doc_infos.subclass_slug',
            'redts_zd_client_doc_infos.remarks',
            'redts_zd_client_doc_infos.validated',
            'redts_zd_client_doc_infos.doc_date',
            'redts_zd_client_doc_infos.compliance_deadline',
            'redts_zd_client_doc_infos.created_at',

            #region app type
            'app_type.applicant',
            #endregion app type

            #region transaction type
            'transac_type.transaction',
            'transac_type.slug as transaction_slug',
            #endregion transaction type

            #region doc clas
            'doc_class.description as doc_class_full',
            #endregion doc clas
        )
            ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'redts_zd_client_doc_infos.application_type_uuid')
            ->leftJoin('redts_za_transaction_types as transac_type', 'transac_type.uuid', '=', 'redts_zd_client_doc_infos.transaction_type_uuid')
            ->leftJoin('redts_ee_classification as doc_class', 'doc_class.uuid', '=', 'redts_zd_client_doc_infos.class_uuid')
            ->where('redts_zd_client_doc_infos.uuid', $doc_uuid)
            ->whereNull('redts_zd_client_doc_infos.deleted_at')
            ->first();

        $doc_stats = redts_n_action::select(
            'redts_n_actions.id',
            'redts_n_actions.uuid',
            'redts_n_actions.subject',
            'redts_n_actions.doc_id',
            'redts_n_actions.doc_uuid',
            'redts_n_actions.doc_no',
            'redts_n_actions.sender_client_id',
            'redts_n_actions.sender_user_id',
            'redts_n_actions.sender_user_uuid',
            'redts_n_actions.sender_type',
            'redts_n_actions.referred_by_office',
            'redts_n_actions.referred_by_office_uuid',
            'redts_n_actions.action_taken',
            'redts_n_actions.send_to_office',
            'redts_n_actions.send_to_office_uuid',
            'redts_n_actions.validated',
            'redts_n_actions.received_id',
            'redts_n_actions.received_uuid',
            'redts_n_actions.received',
            'redts_n_actions.released',
            'redts_n_actions.final_action',
            'redts_n_actions.rejected',
            'redts_n_actions.verification_date',
            'redts_n_actions.in_transit_remarks',
            'redts_n_actions.document_remarks',
            'redts_n_actions.action_remarks',
            'redts_n_actions.attachment_remarks',
            'redts_n_actions.uploaded_act',
            'redts_n_actions.deleted_at',
            'redts_n_actions.created_at',

            #region document info
            'doc_info.doc_no',
            'doc_info.validated',
            'doc_info.class_slug',
            'doc_info.compliance_deadline',
            'app_type.applicant',
            #endregion document info

            #region user sender
            'sender_user.username as sender_username',
            #endregion user sender

            #region referred by office
            'referred_by.office as referred_by_abbrv',
            'referred_by.full_office_name as referred_by_full_office_name',
            #endregion referred by office

            #region send to office
            'send_to.office as send_to_abbrv',
            'send_to.full_office_name as send_to_full_office_name',
            #endregion send to office

            #region received by
            'received_by.fname as receiver_fname',
            'received_by.mname as receiver_mname',
            'received_by.sname as receiver_sname',
            'received_by.suffix as receiver_suffix',
            #endregion received by
        )
            ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.uuid', '=', 'redts_n_actions.doc_uuid')
            ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'doc_info.application_type_uuid')
            ->leftJoin('redts_b_user as sender_user', 'sender_user.uuid', '=', 'redts_n_actions.sender_user_uuid')
            ->leftJoin('redts_f_offices as referred_by', 'referred_by.uuid', '=', 'redts_n_actions.referred_by_office_uuid')
            ->leftJoin('redts_f_offices as send_to', 'send_to.uuid', '=', 'redts_n_actions.send_to_office_uuid')
            ->leftJoin('redts_d_profile as received_by', 'received_by.user_uuid', '=', 'redts_n_actions.received_uuid')
            ->where('redts_n_actions.doc_uuid', $doc_uuid)
            ->orderBy('redts_n_actions.created_at', 'asc')
            ->whereNull('redts_n_actions.deleted_at')
            ->get();

        #region get document attachments
        $doc_attachments  = redts_ze_client_doc_attachments::select(
            'redts_ze_client_doc_attachments.id',
            'redts_ze_client_doc_attachments.doc_info_id',
            'redts_ze_client_doc_attachments.doc_info_uuid',
            //'redts_ze_client_doc_attachments.req_id', //DEPRECATED
            'redts_ze_client_doc_attachments.app_form_no',
            'redts_ze_client_doc_attachments.req_slug',
            'redts_ze_client_doc_attachments.file_path',
            'redts_ze_client_doc_attachments.file_name',
            'redts_ze_client_doc_attachments.file_link',
            'redts_ze_client_doc_attachments.text_input',
            'redts_ze_client_doc_attachments.attachment_type',
            'redts_ze_client_doc_attachments.deleted_at',
        )
            // ->leftJoin('redts_y_requirements as req', 'req.uuid', '=', 'redts_ze_client_doc_attachments.req_uuid') //DEPRECATED
            ->where('redts_ze_client_doc_attachments.doc_info_uuid', $doc_uuid)
            ->whereNull('redts_ze_client_doc_attachments.deleted_at')
            ->orderBy('redts_ze_client_doc_attachments.app_form_no', 'asc')
            ->get();

        $doc_info->attachments = $doc_attachments;
        #endregion get document attachments

        #region get action attachments
        foreach ($doc_stats as $key => $dt) {
            $attachments  = redts_na_action_attachments::where('action_uuid', $dt['uuid'])->whereNull('deleted_at')->get();
            $dt->attachments = $attachments;
        }
        #endregion get action attachments

        return response()->json([
            'success' => true,
            'doc_info' => $doc_info,
            'doc_stats' => $doc_stats,
        ]);
    }
    #endregion fetch document infos

    #region fetch offices
    public function fetchoffice()
    {
        $offices = redts_f_offices::whereNull('deleted_at')->get(['id', 'full_office_name', 'slug']);

        return response()->json([
            'success' => true,
            'offices' => $offices,
        ]);
    }
    public function fetchoffice_via_search(Request $request)
    {

        $type = $request->input('type');
        $search = $request->input('search');

        // Search result
        if ($type == 1) {
            $data = redts_f_offices::select(
                'redts_f_offices.id',
                'redts_f_offices.uuid',
                'redts_f_offices.region_id',
                'redts_f_offices.slug',
                'redts_f_offices.office',
                'redts_f_offices.full_office_name',
                'redts_f_offices.office_type',
                'redts_f_offices.mother_unit',
                'redts_f_offices.header_office_title',
                'redts_f_offices.email',
                'redts_f_offices.tel_no',
                'redts_f_offices.cp_no',
                'redts_f_offices.office_address',
                'redts_f_offices.deleted_at',

                'user.username'
            )
                ->leftJoin('redts_j_user_offices as user_office', 'user_office.offices_uuid', '=', 'redts_f_offices.uuid')
                ->leftJoin('redts_b_user as user', 'user.uuid', '=', 'user_office.user_uuid')
                ->where(function ($query) use ($search) {
                    $query->where('redts_f_offices.slug', 'like', '%' . $search . '%')
                        ->orWhere('redts_f_offices.office', 'like', '%' . $search . '%')
                        ->orWhere('redts_f_offices.full_office_name', 'like', '%' . $search . '%')
                        ->orWhere('redts_f_offices.office_type', 'like', '%' . $search . '%')
                        ->orWhere('user.username', 'like', '%' . $search . '%');
                })->whereNull('redts_f_offices.deleted_at')->take(50)->get();

            return response()->json([
                'data' => $data,
            ]);
        }
    }
    #endregion fetch offices

    #region routing slip
    public function fetchroutingslip($doc_no) //DEPRECATED
    {
        if (Auth::check()) {
            $doc_info = redts_zd_client_doc_info::select(
                'redts_zd_client_doc_infos.id',
                'redts_zd_client_doc_infos.doc_no',
                'redts_zd_client_doc_infos.application_type_id',
                'redts_zd_client_doc_infos.transaction_type_id',
                'redts_zd_client_doc_infos.agency',
                'redts_zd_client_doc_infos.client_id',
                'redts_zd_client_doc_infos.class_id',
                'redts_zd_client_doc_infos.class_slug',
                'redts_zd_client_doc_infos.subclass_id',
                'redts_zd_client_doc_infos.subclass_slug',
                'redts_zd_client_doc_infos.remarks',
                'redts_zd_client_doc_infos.validated',
                'redts_zd_client_doc_infos.compliance_deadline',
                'redts_zd_client_doc_infos.created_at',

                #region app type
                'app_type.applicant',
                #endregion app type

                #region transaction type
                'transac_type.transaction',
                'transac_type.slug as transaction_slug',
                #endregion transaction type

                #region doc clas
                'doc_class.description as doc_class_full',
                #endregion doc clas
            )
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'redts_zd_client_doc_infos.application_type_uuid')
                ->leftJoin('redts_za_transaction_types as transac_type', 'transac_type.uuid', '=', 'redts_zd_client_doc_infos.transaction_type_uuid')
                ->leftJoin('redts_ee_classification as doc_class', 'doc_class.uuid', '=', 'redts_zd_client_doc_infos.class_uuid')
                ->where('redts_zd_client_doc_infos.doc_no', $doc_no)
                ->whereNull('redts_zd_client_doc_infos.deleted_at')
                ->first();


            $doc_stats = redts_n_action::select(
                'redts_n_actions.id',
                'redts_n_actions.doc_id',
                'redts_n_actions.sender_client_id',
                'redts_n_actions.sender_user_id',
                'redts_n_actions.sender_type',
                'redts_n_actions.referred_by_office',
                'redts_n_actions.action_taken',
                'redts_n_actions.send_to_office',
                'redts_n_actions.received_id',
                'redts_n_actions.received',
                'redts_n_actions.released',
                'redts_n_actions.validated',
                'redts_n_actions.released',
                'redts_n_actions.final_action',
                'redts_n_actions.rejected',
                'redts_n_actions.verification_date',
                'redts_n_actions.subject',
                'redts_n_actions.in_transit_remarks',
                'redts_n_actions.action_remarks',
                'redts_n_actions.attachment_remarks',
                'redts_n_actions.deleted_at',
                'redts_n_actions.created_at',

                #region document info
                'doc_info.doc_no',
                'doc_info.validated',
                'doc_info.subclass_slug',
                'doc_info.compliance_deadline',
                'app_type.applicant',
                #endregion document info

                #region user sender
                'sender_user.username as sender_username',
                #endregion user sender

                #region referred by office
                'referred_by.office as referred_by_abbrv',
                'referred_by.full_office_name as referred_by_full_office_name',
                #endregion referred by office

                #region send to office
                'send_to.office as send_to_abbrv',
                'send_to.full_office_name as send_to_full_office_name',
                #endregion send to office


                #region received by
                'received_by.fname as receiver_fname',
                'received_by.mname as receiver_mname',
                'received_by.sname as receiver_sname',
                'received_by.suffix as receiver_suffix',
                #endregion received by
            )
                ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.id', '=', 'redts_n_actions.doc_id')
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.id', '=', 'doc_info.application_type_id')
                ->leftJoin('redts_b_user as sender_user', 'sender_user.id', '=', 'redts_n_actions.sender_user_id')
                ->leftJoin('redts_f_offices as referred_by', 'referred_by.id', '=', 'redts_n_actions.referred_by_office')
                ->leftJoin('redts_f_offices as send_to', 'send_to.id', '=', 'redts_n_actions.send_to_office')
                ->leftJoin('redts_d_profile as received_by', 'received_by.id', '=', 'redts_n_actions.received_id')
                ->where('redts_n_actions.doc_uuid', $doc_info->id)
                ->whereNull('redts_n_actions.deleted_at')
                ->get();

            return view('general-dash-routingSlip', [
                'doc_info' => $doc_info,
                'doc_stats' => $doc_stats,
            ]);
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    public function fetchroutingslipid($doc_uuid) //CONVERTED TO UUID
    {
        //allow access in public
        // if (Auth::check()) {
        if ($doc_info = redts_zd_client_doc_info::where('uuid', $doc_uuid)->exists() ||
            $doc_info = redts_zd_client_doc_info::where('id', $doc_uuid)->exists() ||
            $doc_info = redts_zd_client_doc_info::where('doc_no', $doc_uuid)->exists()
        ) {

            $doc_info = redts_zd_client_doc_info::select(
                'redts_zd_client_doc_infos.id',
                'redts_zd_client_doc_infos.uuid',
                'redts_zd_client_doc_infos.doc_no',
                'redts_zd_client_doc_infos.application_type_id',
                'redts_zd_client_doc_infos.application_type_uuid',
                'redts_zd_client_doc_infos.transaction_type_id',
                'redts_zd_client_doc_infos.transaction_type_uuid',
                'redts_zd_client_doc_infos.agency',
                'redts_zd_client_doc_infos.client_id',
                'redts_zd_client_doc_infos.class_id',
                'redts_zd_client_doc_infos.class_uuid',
                'redts_zd_client_doc_infos.class_slug',
                'redts_zd_client_doc_infos.subclass_id',
                'redts_zd_client_doc_infos.subclass_slug',
                'redts_zd_client_doc_infos.remarks',
                'redts_zd_client_doc_infos.validated',
                'redts_zd_client_doc_infos.doc_date',
                'redts_zd_client_doc_infos.compliance_deadline',
                'redts_zd_client_doc_infos.deleted_at',

                #region app type
                'app_type.applicant',
                #endregion app type

                #region transaction type
                'transac_type.transaction',
                'transac_type.slug as transaction_slug',
                #endregion transaction type

                #region doc class
                'doc_class.description as doc_class_full',
                #endregion doc class

                #region doc type
                // 'doc_type.description as doc_type_full',
                #endregion doc type
            )
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'redts_zd_client_doc_infos.application_type_uuid')
                ->leftJoin('redts_za_transaction_types as transac_type', 'transac_type.uuid', '=', 'redts_zd_client_doc_infos.transaction_type_uuid')
                ->leftJoin('redts_ee_classification as doc_class', 'doc_class.uuid', '=', 'redts_zd_client_doc_infos.class_uuid')
                ->where('redts_zd_client_doc_infos.uuid', $doc_uuid)
                ->orwhere('redts_zd_client_doc_infos.id', $doc_uuid)
                ->orwhere('redts_zd_client_doc_infos.doc_no', $doc_uuid)
                ->whereNull('redts_zd_client_doc_infos.deleted_at')
                ->first();


            $doc_stats = redts_n_action::select(
                'redts_n_actions.id',
                'redts_n_actions.uuid',
                'redts_n_actions.subject',
                'redts_n_actions.doc_id',
                'redts_n_actions.doc_uuid',
                'redts_n_actions.doc_no',
                'redts_n_actions.sender_client_id',
                'redts_n_actions.sender_user_id',
                'redts_n_actions.sender_user_uuid',
                'redts_n_actions.sender_type',
                'redts_n_actions.referred_by_office',
                'redts_n_actions.referred_by_office_uuid',
                'redts_n_actions.action_taken',
                'redts_n_actions.send_to_office',
                'redts_n_actions.send_to_office_uuid',
                'redts_n_actions.validated',
                'redts_n_actions.received_id',
                'redts_n_actions.received_uuid',
                'redts_n_actions.received',
                'redts_n_actions.released',
                'redts_n_actions.final_action',
                'redts_n_actions.rejected',
                'redts_n_actions.verification_date',
                'redts_n_actions.in_transit_remarks',
                'redts_n_actions.document_remarks',
                'redts_n_actions.action_remarks',
                'redts_n_actions.attachment_remarks',
                'redts_n_actions.deleted_at',

                #region document info
                'doc_info.doc_no',
                'doc_info.validated',
                'doc_info.class_slug',
                'doc_info.compliance_deadline',
                'app_type.applicant',
                #endregion document info

                #region user sender
                'sender_user.username as sender_username',
                #endregion user sender

                #region referred by office
                'referred_by.office as referred_by_abbrv',
                'referred_by.full_office_name as referred_by_full_office_name',
                #endregion referred by office

                #region send to office
                'send_to.office as send_to_abbrv',
                'send_to.full_office_name as send_to_full_office_name',
                #endregion send to office


                #region received by
                'received_by.fname as receiver_fname',
                'received_by.mname as receiver_mname',
                'received_by.sname as receiver_sname',
                'received_by.suffix as receiver_suffix',
                #endregion received by
            )
                ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.uuid', '=', 'redts_n_actions.doc_uuid')
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'doc_info.application_type_uuid')
                ->leftJoin('redts_b_user as sender_user', 'sender_user.uuid', '=', 'redts_n_actions.sender_user_uuid')
                ->leftJoin('redts_f_offices as referred_by', 'referred_by.uuid', '=', 'redts_n_actions.referred_by_office_uuid')
                ->leftJoin('redts_f_offices as send_to', 'send_to.uuid', '=', 'redts_n_actions.send_to_office_uuid')
                ->leftJoin('redts_d_profile as received_by', 'received_by.user_uuid', '=', 'redts_n_actions.received_uuid')
                ->where('redts_n_actions.doc_uuid', $doc_info->uuid)
                ->orwhere('redts_n_actions.doc_id', $doc_info->uuid)
                ->orwhere('redts_n_actions.doc_no', $doc_info->uuid)
                ->whereNull('redts_n_actions.deleted_at')
                ->get();

            return view('general-dash-routingSlip-id', [
                'doc_info' => $doc_info,
                'doc_stats' => $doc_stats,
            ]);
        } else {
            return $this->pageResponse()['page404'];
        }
        /* } else {
            return $this->pageResponse()['usernameQuestioned'];
        } */
    }
    #endregion routing slip

    #region manage client requests
    public function indexadmindashmngclireq()
    {
        if (Auth::check()) {
            return view('general-dash-manage-clients-requests');
        } else {
            return $this->pageResponse()['page403'];
        }
    }
    public function fetchspecificClientReqsReceived()
    {
        $response = $this->fetchotheruserinfo();
        $data = json_decode($response->getContent(), true); // Decoding the JSON response to an associative array
        $user_offices_id = $data['user_offices_id'];

        $data = redts_zd_client_doc_info::select(
            #region document info
            'redts_zd_client_doc_infos.id',
            'redts_zd_client_doc_infos.doc_no',
            'redts_zd_client_doc_infos.application_type_id',
            'redts_zd_client_doc_infos.transaction_type_id',
            'redts_zd_client_doc_infos.agency',
            'redts_zd_client_doc_infos.client_id',
            'redts_zd_client_doc_infos.class_id',
            'redts_zd_client_doc_infos.class_slug',
            'redts_zd_client_doc_infos.subclass_id',
            'redts_zd_client_doc_infos.subclass_slug',
            'redts_zd_client_doc_infos.remarks',
            'redts_zd_client_doc_infos.validated',
            'redts_zd_client_doc_infos.compliance_deadline',
            'redts_zd_client_doc_infos.deleted_at',
            'redts_zd_client_doc_infos.created_at',
            #endregion document info

            #region applicant type
            'app_type.applicant as app_type',
            #endregion applicant type

            #region transaction type
            'transact_type.transaction',
            #endregion transaction type

            #region client info
            'client.id as client_id',
            'client.fname',
            'client.mname',
            'client.sname',
            'client.suffix',
            'client.sex',
            'client.email',
            'client.email_verify',
            'client.contact_no',
            'client.access_token',
            'client.address',
            'client.valid_id_front',
            'client.valid_id_back',
            #endregion client info

            #region class
            'class.description as class_title',
            #endregion class

            #region subclass
            'subclass.description as subclass_title',
            #endregion subclass

            #region office
            'office.full_office_name',
            #endregion office
        )
            ->leftJoin('redts_z_applicant_types as app_type', 'app_type.id', '=', 'redts_zd_client_doc_infos.application_type_id')
            ->leftJoin('redts_za_transaction_types as transact_type', 'transact_type.id', '=', 'redts_zd_client_doc_infos.transaction_type_id')
            ->leftJoin('redts_zc_client_infos as client', 'client.id', '=', 'redts_zd_client_doc_infos.client_id')
            ->leftJoin('redts_ee_classification as class', 'class.id', '=', 'redts_zd_client_doc_infos.class_id')
            ->leftJoin('redts_l_sub_class as subclass', 'subclass.id', '=', 'redts_zd_client_doc_infos.subclass_id')
            ->leftJoin('redts_zi_origin_offices as origin', 'origin.doc_id', '=', 'redts_zd_client_doc_infos.id')
            ->leftJoin('redts_f_offices as office', 'office.uuid', '=', 'origin.origin_office_uuid')
            ->whereNull('redts_zd_client_doc_infos.deleted_at')
            ->where(function ($query) { /* this query will select all action with the doc id and check if the user received / process the document if not it will not add to the fetch data */
                $query->whereIn('redts_zd_client_doc_infos.id', function ($subquery) {
                    $subquery->select('doc_id')
                        ->from('redts_n_actions')
                        ->whereColumn('doc_id', '=', 'redts_zd_client_doc_infos.id')
                        ->where('received_id', Auth::user()->id);
                });
            })
            ->get();

        foreach ($data as $key => $dt) {
            // document attachments
            $req_attachments_arr = array();
            $req_attachments = redts_ze_client_doc_attachments::where('doc_info_id', $dt->id)->where('attachment_type', 'file')->whereNull('deleted_at')->get();
            foreach ($req_attachments as $key => $attach) {
                array_push($req_attachments_arr, [
                    'slug' => $attach->req_slug,
                    'app_form_no' => $attach->app_form_no,
                    'file_path' => $attach->file_path,
                    'file_name' => $attach->file_name,
                ]);
            }
            $dt->req_attachments = $req_attachments_arr;

            // get all action with specific doc_id
            $doc_actions =  redts_n_action::select('id')->where('doc_id', $dt->id)->whereNull('deleted_at')->orderBy('id', 'ASC')->get();
            $last_doc_action_id = $doc_actions->last();
            $last_doc_action = redts_n_action::select(
                'redts_n_actions.id',
                'redts_n_actions.doc_id',
                'redts_n_actions.sender_client_id',
                'redts_n_actions.sender_user_id',
                'redts_n_actions.sender_type',
                'redts_n_actions.referred_by_office',
                'redts_n_actions.action_taken',
                'redts_n_actions.send_to_office',
                'redts_n_actions.received_id',
                'redts_n_actions.received',
                'redts_n_actions.released',
                'redts_n_actions.validated',
                'redts_n_actions.released',
                'redts_n_actions.final_action',
                'redts_n_actions.rejected',
                'redts_n_actions.verification_date',
                'redts_n_actions.subject',
                'redts_n_actions.in_transit_remarks',
                'redts_n_actions.action_remarks',
                'redts_n_actions.attachment_remarks',
                'redts_n_actions.deleted_at',
                'redts_n_actions.created_at',

                #region referred by office
                'referred_by.office as referred_by_abbrv',
                'referred_by.full_office_name as referred_by_full_office_name',
                #endregion referred by office

                #region send to office
                'send_to.office as send_to_abbrv',
                'send_to.full_office_name as send_to_full_office_name',
                #endregion send to office
            )
                ->leftJoin('redts_f_offices as referred_by', 'referred_by.id', '=', 'redts_n_actions.referred_by_office')
                ->leftJoin('redts_f_offices as send_to', 'send_to.id', '=', 'redts_n_actions.send_to_office')
                ->where('redts_n_actions.id', $last_doc_action_id->id)
                ->whereNull('redts_n_actions.deleted_at')
                ->first();

            $stat_msg_stat = '';
            $stat_msg = '';
            if ($last_doc_action->final_action == null) {
                if ($last_doc_action->rejected != null) { // DEPRECATED
                    $stat_msg = strtoupper($last_doc_action->action_taken) . ' Rejected';
                    $stat_msg_stat = 'rejected';
                } else {
                    if ($last_doc_action->received_id != null) {
                        $stat_msg = strtoupper($last_doc_action->send_to_full_office_name) . ' <i class="fa fa-envelope" aria-hidden="true"></i> Received';
                    } else {
                        $stat_msg = strtoupper($last_doc_action->send_to_full_office_name) . ' <i class="fa fa-plane" aria-hidden="true"></i> In-Transit';
                    }
                }
            } else {
                $stat_msg = strtoupper($last_doc_action->send_to_full_office_name) . ' <i class="fa fa-archive" aria-hidden="true"></i> Archived';
                $stat_msg_stat = 'completed';
            }
            $dt->stat_msg = $stat_msg;
            $dt->stat_msg_stat = $stat_msg_stat;

            // action attachments
            $act_attachments_arr = array();

            // Check if there are any actions before trying to get attachments
            if ($doc_actions->isNotEmpty()) {
                $act_attachments = redts_na_action_attachments::whereIn('action_id', $doc_actions->pluck('id'))->whereNull('deleted_at')->get();

                foreach ($act_attachments as $key => $attach) {
                    array_push($act_attachments_arr, [
                        'slug' => $attach->act_slug,
                        'file_path' => $attach->file_path,
                        'file_name' => $attach->file_name,
                        'remarks' => $attach->remarks,
                    ]);
                }
                $dt->act_attachments = $act_attachments_arr;
            }
            // order of payment
            $order_of_payment_arr = array();
            if (redts_zf_order_of_payment::where('doc_id', $dt->id)->whereNull('deleted_at')->exists()) {
                $order_of_payment = redts_zf_order_of_payment::where('doc_id', $dt->id)->whereNull('deleted_at')->get();
                foreach ($order_of_payment as $key => $ofp) {
                    array_push($order_of_payment_arr, [
                        'id' => $ofp->id,
                        'doc_id' => $ofp->doc_id,
                        'order_of_payment' => $ofp->order_of_payment,
                        'payment_receipt' => $ofp->payment_receipt,
                        'verified' => $ofp->verified,
                    ]);
                }
            };

            $dt->order_of_payment = $order_of_payment_arr;
        }

        return dataTables($data)->toJson();
    }
    public function fetchspecificClientReqsReceivedOverall()
    {
        if (Auth::user()->access_id != null) { //protect the data from leaking if someone remove the access code restriction in on the display
            $response = $this->fetchotheruserinfo();
            $data = json_decode($response->getContent(), true); // Decoding the JSON response to an associative array

            $data = redts_zd_client_doc_info::select(
                #region document info
                'redts_zd_client_doc_infos.id',
                'redts_zd_client_doc_infos.doc_no',
                'redts_zd_client_doc_infos.application_type_id',
                'redts_zd_client_doc_infos.transaction_type_id',
                'redts_zd_client_doc_infos.agency',
                'redts_zd_client_doc_infos.client_id',
                'redts_zd_client_doc_infos.class_id',
                'redts_zd_client_doc_infos.class_slug',
                'redts_zd_client_doc_infos.subclass_id',
                'redts_zd_client_doc_infos.subclass_slug',
                'redts_zd_client_doc_infos.remarks',
                'redts_zd_client_doc_infos.validated',
                'redts_zd_client_doc_infos.compliance_deadline',
                'redts_zd_client_doc_infos.deleted_at',
                'redts_zd_client_doc_infos.created_at',
                #endregion document info

                #region applicant type
                'app_type.applicant as app_type',
                #endregion applicant type

                #region transaction type
                'transact_type.transaction',
                #endregion transaction type

                #region client info
                'client.id as client_id',
                'client.fname',
                'client.mname',
                'client.sname',
                'client.suffix',
                'client.sex',
                'client.email',
                'client.email_verify',
                'client.contact_no',
                'client.access_token',
                'client.address',
                'client.valid_id_front',
                'client.valid_id_back',
                #endregion client info

                #region class
                'class.description as class_title',
                #endregion class

                #region subclass
                'subclass.description as subclass_title',
                #endregion subclass

                #region office
                'office.full_office_name',
                #endregion office
            )
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.id', '=', 'redts_zd_client_doc_infos.application_type_id')
                ->leftJoin('redts_za_transaction_types as transact_type', 'transact_type.id', '=', 'redts_zd_client_doc_infos.transaction_type_id')
                ->leftJoin('redts_zc_client_infos as client', 'client.id', '=', 'redts_zd_client_doc_infos.client_id')
                ->leftJoin('redts_ee_classification as class', 'class.id', '=', 'redts_zd_client_doc_infos.class_id')
                ->leftJoin('redts_l_sub_class as subclass', 'subclass.id', '=', 'redts_zd_client_doc_infos.subclass_id')
                ->leftJoin('redts_zi_origin_offices as origin', 'origin.doc_id', '=', 'redts_zd_client_doc_infos.id')
                ->leftJoin('redts_f_offices as office', 'office.uuid', '=', 'origin.origin_office_uuid')
                ->whereNull('redts_zd_client_doc_infos.deleted_at')
                ->get();

            foreach ($data as $key => $dt) {
                // document attachments
                $req_attachments_arr = array();
                $req_attachments = redts_ze_client_doc_attachments::where('doc_info_id', $dt->id)->where('attachment_type', 'file')->whereNull('deleted_at')->get();
                foreach ($req_attachments as $key => $attach) {
                    array_push($req_attachments_arr, [
                        'slug' => $attach->req_slug,
                        'app_form_no' => $attach->app_form_no,
                        'file_path' => $attach->file_path,
                        'file_name' => $attach->file_name,
                    ]);
                }
                $dt->req_attachments = $req_attachments_arr;

                // get all action with specific doc_id
                $doc_actions =  redts_n_action::select('id')->where('doc_id', $dt->id)->whereNull('deleted_at')->orderBy('id', 'ASC')->get();
                $last_doc_action_id = $doc_actions->last();
                $last_doc_action = redts_n_action::select(
                    'redts_n_actions.id',
                    'redts_n_actions.doc_id',
                    'redts_n_actions.sender_client_id',
                    'redts_n_actions.sender_user_id',
                    'redts_n_actions.sender_type',
                    'redts_n_actions.referred_by_office',
                    'redts_n_actions.action_taken',
                    'redts_n_actions.send_to_office',
                    'redts_n_actions.received_id',
                    'redts_n_actions.received',
                    'redts_n_actions.released',
                    'redts_n_actions.validated',
                    'redts_n_actions.released',
                    'redts_n_actions.final_action',
                    'redts_n_actions.rejected',
                    'redts_n_actions.verification_date',
                    'redts_n_actions.subject',
                    'redts_n_actions.in_transit_remarks',
                    'redts_n_actions.action_remarks',
                    'redts_n_actions.attachment_remarks',
                    'redts_n_actions.deleted_at',
                    'redts_n_actions.created_at',

                    #region referred by office
                    'referred_by.office as referred_by_abbrv',
                    'referred_by.full_office_name as referred_by_full_office_name',
                    #endregion referred by office

                    #region send to office
                    'send_to.office as send_to_abbrv',
                    'send_to.full_office_name as send_to_full_office_name',
                    #endregion send to office
                )
                    ->leftJoin('redts_f_offices as referred_by', 'referred_by.id', '=', 'redts_n_actions.referred_by_office')
                    ->leftJoin('redts_f_offices as send_to', 'send_to.id', '=', 'redts_n_actions.send_to_office')
                    ->where('redts_n_actions.id', $last_doc_action_id->id)
                    ->whereNull('redts_n_actions.deleted_at')
                    ->first();

                $stat_msg = '';
                $stat_msg_stat = '';
                if ($last_doc_action->final_action == null) {
                    if ($last_doc_action->rejected != null) {
                        $stat_msg = 'Rejected: "' . strtoupper($last_doc_action->action_taken) . '"';
                        $stat_msg_stat = 'rejected';
                    } else {
                        if ($last_doc_action->received_id != null) {
                            $stat_msg = 'Received: "' . strtoupper($last_doc_action->send_to_full_office_name) . '"';
                        } else {
                            $stat_msg = 'In-Transit: "' . strtoupper($last_doc_action->send_to_full_office_name) . '"';
                        }
                    }
                } else {
                    $stat_msg = 'Approved & Released: "' . strtoupper($last_doc_action->send_to_full_office_name) . '"';
                    $stat_msg_stat = 'completed';
                }
                $dt->stat_msg = $stat_msg;
                $dt->stat_msg_stat = $stat_msg_stat;

                // action attachments
                $act_attachments_arr = array();

                // Check if there are any actions before trying to get attachments
                if ($doc_actions->isNotEmpty()) {
                    $act_attachments = redts_na_action_attachments::whereIn('action_id', $doc_actions->pluck('id'))->whereNull('deleted_at')->get();

                    foreach ($act_attachments as $key => $attach) {
                        array_push($act_attachments_arr, [
                            'slug' => $attach->act_slug,
                            'file_path' => $attach->file_path,
                            'file_name' => $attach->file_name,
                            'remarks' => $attach->remarks,
                        ]);
                    }
                    $dt->act_attachments = $act_attachments_arr;
                }
                // order of payment
                $order_of_payment_arr = array();
                if (redts_zf_order_of_payment::where('doc_id', $dt->id)->whereNull('deleted_at')->exists()) {
                    $order_of_payment = redts_zf_order_of_payment::where('doc_id', $dt->id)->whereNull('deleted_at')->get();
                    foreach ($order_of_payment as $key => $ofp) {
                        array_push($order_of_payment_arr, [
                            'id' => $ofp->id,
                            'doc_id' => $ofp->doc_id,
                            'order_of_payment' => $ofp->order_of_payment,
                            'payment_receipt' => $ofp->payment_receipt,
                            'verified' => $ofp->verified,
                        ]);
                    }
                };

                $dt->order_of_payment = $order_of_payment_arr;
            }

            return dataTables($data)->toJson();
        }
    }
    public function fetchspecificClientReqsReceivedOrigin()
    {
        if (Auth::user()->access_id != null) { //protect the data from leaking if someone remove the access code restriction in on the display
            $response = $this->fetchotheruserinfo();
            $data = json_decode($response->getContent(), true); // Decoding the JSON response to an associative array
            $user_offices_id = $data['user_offices_id'];
            $user_id = Auth::user()->id;
            //get origin office id
            $user_allowed_origin = redts_ba_view_reqs_spec::where('user_id', $user_id)->whereNull('deleted_at')->first();

            if ($user_allowed_origin != null) {
                $data = redts_zd_client_doc_info::select(
                    #region document info
                    'redts_zd_client_doc_infos.id',
                    'redts_zd_client_doc_infos.doc_no',
                    'redts_zd_client_doc_infos.application_type_id',
                    'redts_zd_client_doc_infos.transaction_type_id',
                    'redts_zd_client_doc_infos.agency',
                    'redts_zd_client_doc_infos.client_id',
                    'redts_zd_client_doc_infos.class_id',
                    'redts_zd_client_doc_infos.class_slug',
                    'redts_zd_client_doc_infos.subclass_id',
                    'redts_zd_client_doc_infos.subclass_slug',
                    'redts_zd_client_doc_infos.remarks',
                    'redts_zd_client_doc_infos.validated',
                    'redts_zd_client_doc_infos.compliance_deadline',
                    'redts_zd_client_doc_infos.deleted_at',
                    'redts_zd_client_doc_infos.created_at',
                    #endregion document info

                    #region applicant type
                    'app_type.applicant as app_type',
                    #endregion applicant type

                    #region transaction type
                    'transact_type.transaction',
                    #endregion transaction type

                    #region client info
                    'client.id as client_id',
                    'client.fname',
                    'client.mname',
                    'client.sname',
                    'client.suffix',
                    'client.sex',
                    'client.email',
                    'client.email_verify',
                    'client.contact_no',
                    'client.access_token',
                    'client.address',
                    'client.valid_id_front',
                    'client.valid_id_back',
                    #endregion client info

                    #region class
                    'class.description as class_title',
                    #endregion class

                    #region subclass
                    'subclass.description as subclass_title',
                    #endregion subclass

                    #region office
                    'office.full_office_name',
                    #endregion office
                )
                    ->leftJoin('redts_z_applicant_types as app_type', 'app_type.id', '=', 'redts_zd_client_doc_infos.application_type_id')
                    ->leftJoin('redts_za_transaction_types as transact_type', 'transact_type.id', '=', 'redts_zd_client_doc_infos.transaction_type_id')
                    ->leftJoin('redts_zc_client_infos as client', 'client.id', '=', 'redts_zd_client_doc_infos.client_id')
                    ->leftJoin('redts_ee_classification as class', 'class.id', '=', 'redts_zd_client_doc_infos.class_id')
                    ->leftJoin('redts_l_sub_class as subclass', 'subclass.id', '=', 'redts_zd_client_doc_infos.subclass_id')
                    ->leftJoin('redts_zi_origin_offices as origin', 'origin.doc_id', '=', 'redts_zd_client_doc_infos.id')
                    ->leftJoin('redts_f_offices as office', 'office.uuid', '=', 'origin.origin_office_uuid')
                    ->where('origin.origin_office_id', $user_allowed_origin->office_id)
                    ->whereNull('redts_zd_client_doc_infos.deleted_at')
                    ->get();



                foreach ($data as $key => $dt) {
                    // document attachments
                    $req_attachments_arr = array();
                    $req_attachments = redts_ze_client_doc_attachments::where('doc_info_id', $dt->id)->where('attachment_type', 'file')->whereNull('deleted_at')->get();
                    foreach ($req_attachments as $key => $attach) {
                        array_push($req_attachments_arr, [
                            'slug' => $attach->req_slug,
                            'app_form_no' => $attach->app_form_no,
                            'file_path' => $attach->file_path,
                            'file_name' => $attach->file_name,
                        ]);
                    }
                    $dt->req_attachments = $req_attachments_arr;

                    // get all action with specific doc_id
                    $doc_actions =  redts_n_action::select('id')->where('doc_id', $dt->id)->whereNull('deleted_at')->orderBy('id', 'ASC')->get();
                    $last_doc_action_id = $doc_actions->last();
                    $last_doc_action = redts_n_action::select(
                        'redts_n_actions.id',
                        'redts_n_actions.doc_id',
                        'redts_n_actions.sender_client_id',
                        'redts_n_actions.sender_user_id',
                        'redts_n_actions.sender_type',
                        'redts_n_actions.referred_by_office',
                        'redts_n_actions.action_taken',
                        'redts_n_actions.send_to_office',
                        'redts_n_actions.received_id',
                        'redts_n_actions.received',
                        'redts_n_actions.released',
                        'redts_n_actions.validated',
                        'redts_n_actions.released',
                        'redts_n_actions.final_action',
                        'redts_n_actions.rejected',
                        'redts_n_actions.verification_date',
                        'redts_n_actions.subject',
                        'redts_n_actions.in_transit_remarks',
                        'redts_n_actions.action_remarks',
                        'redts_n_actions.attachment_remarks',
                        'redts_n_actions.deleted_at',
                        'redts_n_actions.created_at',

                        #region referred by office
                        'referred_by.office as referred_by_abbrv',
                        'referred_by.full_office_name as referred_by_full_office_name',
                        #endregion referred by office

                        #region send to office
                        'send_to.office as send_to_abbrv',
                        'send_to.full_office_name as send_to_full_office_name',
                        #endregion send to office
                    )
                        ->leftJoin('redts_f_offices as referred_by', 'referred_by.id', '=', 'redts_n_actions.referred_by_office')
                        ->leftJoin('redts_f_offices as send_to', 'send_to.id', '=', 'redts_n_actions.send_to_office')
                        ->where('redts_n_actions.id', $last_doc_action_id->id)
                        ->whereNull('redts_n_actions.deleted_at')
                        ->first();

                    $stat_msg = '';
                    $stat_msg_stat = '';
                    if ($last_doc_action->final_action == null) {
                        if ($last_doc_action->rejected != null) {
                            $stat_msg = 'Rejected: "' . strtoupper($last_doc_action->action_taken) . '"';
                            $stat_msg_stat = 'rejected';
                        } else {
                            if ($last_doc_action->received_id != null) {
                                $stat_msg = 'Received: "' . strtoupper($last_doc_action->send_to_full_office_name) . '"';
                            } else {
                                $stat_msg = 'In-Transit: "' . strtoupper($last_doc_action->send_to_full_office_name) . '"';
                            }
                        }
                    } else {
                        $stat_msg = 'Approved & Released: "' . strtoupper($last_doc_action->send_to_full_office_name) . '"';
                        $stat_msg_stat = 'completed';
                    }
                    $dt->stat_msg = $stat_msg;
                    $dt->stat_msg_stat = $stat_msg_stat;

                    // action attachments
                    $act_attachments_arr = array();

                    // Check if there are any actions before trying to get attachments
                    if ($doc_actions->isNotEmpty()) {
                        $act_attachments = redts_na_action_attachments::whereIn('action_id', $doc_actions->pluck('id'))->whereNull('deleted_at')->get();

                        foreach ($act_attachments as $key => $attach) {
                            array_push($act_attachments_arr, [
                                'slug' => $attach->act_slug,
                                'file_path' => $attach->file_path,
                                'file_name' => $attach->file_name,
                                'remarks' => $attach->remarks,
                            ]);
                        }
                        $dt->act_attachments = $act_attachments_arr;
                    }
                    // order of payment
                    $order_of_payment_arr = array();
                    if (redts_zf_order_of_payment::where('doc_id', $dt->id)->whereNull('deleted_at')->exists()) {
                        $order_of_payment = redts_zf_order_of_payment::where('doc_id', $dt->id)->whereNull('deleted_at')->get();
                        foreach ($order_of_payment as $key => $ofp) {
                            array_push($order_of_payment_arr, [
                                'id' => $ofp->id,
                                'doc_id' => $ofp->doc_id,
                                'order_of_payment' => $ofp->order_of_payment,
                                'payment_receipt' => $ofp->payment_receipt,
                                'verified' => $ofp->verified,
                            ]);
                        }
                    };

                    $dt->order_of_payment = $order_of_payment_arr;
                }

                return dataTables($data)->toJson();
            } else {

                //return nothing or null data
                $data = collect([]);

                return dataTables($data)->toJson();
            }
        }
    }
    public function fetchcheckiforiginviewer()
    {

        $user_id = Auth::user()->id;
        if (redts_ba_view_reqs_spec::where('user_id', $user_id)->exists()) {
            $data = redts_ba_view_reqs_spec::select(
                'redts_f_offices.id',
                'redts_f_offices.full_office_name'
            )
                ->leftJoin('redts_f_offices', 'redts_f_offices.id', '=', 'redts_ba_view_reqs_specs.office_id')
                ->where('user_id', $user_id)->get();

            return response()->json([
                'success' => true,
                'full_office_name' => $data[0]->full_office_name,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
    public function fetchotherclireqinputs($doc_uuid) //CONVERTED TO UUID
    {
        $req_inputs = redts_ze_client_doc_attachments::select(
            'redts_ze_client_doc_attachments.id',
            'redts_ze_client_doc_attachments.doc_info_id',
            // 'redts_ze_client_doc_attachments.req_id', //DEPRECATED
            'redts_ze_client_doc_attachments.app_form_no',
            'redts_ze_client_doc_attachments.req_slug',
            'redts_ze_client_doc_attachments.file_path',
            'redts_ze_client_doc_attachments.file_name',
            'redts_ze_client_doc_attachments.file_link',
            'redts_ze_client_doc_attachments.text_input',
            'redts_ze_client_doc_attachments.attachment_type',
            'redts_ze_client_doc_attachments.deleted_at',
        )
            ->where('redts_ze_client_doc_attachments.doc_info_uuid', $doc_uuid)
            ->where('file_name', 'n/a')
            ->get();

        return response()->json([
            'success' => true,
            'req_inputs' => $req_inputs,
        ]);
    }
    #endregion manage client requests

    #region qr scanner
    public function indexgendashqrscanner()
    {
        if (Auth::check()) {
            return view('general-dashboard-qr-scanner');
        } else {
            return $this->pageResponse()['page403'];
        }
    }
    #endregion qr scanner

    #region certification for chainsaw registration
    public function indexpermcertroutechecker($doc_no, $subclass_id)
    {
        if (redts_zh_cert_perm_routes::where('sub_class_id',  $subclass_id)->exists()) {
            return $this->indexgendashcertchainsawreg($doc_no);
        } else {
            return '' .
                '<div ' .
                '   style="' .
                '       text-align: center; ' .
                '       background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); ' .
                '       font: small-caps bold 24px/1 sans-serif;' .
                '       height: 100%;' .
                '       padding-top: 20%;' .
                '   "' .
                '>' .
                '   <span> ' .
                '       <h2>𓆩♡𓆪</h2>' .
                '       <h2><404))))><</h2>' .
                '       <h2>Denr RFSOATS: permit / certification page not available</h2>' .
                '       <h3>Contact Admin For More Details. . .</h3>' .
                '   </span>' .
                '</div>' .
                '';
        }
    }

    public function indexgendashcertchainsawreg($doc_no)
    {
        if (Auth::check()) {
            $doc_info = redts_zd_client_doc_info::select(
                'redts_zd_client_doc_infos.id',
                'redts_zd_client_doc_infos.doc_no',
                'redts_zd_client_doc_infos.application_type_id',
                'redts_zd_client_doc_infos.transaction_type_id',
                'redts_zd_client_doc_infos.agency',
                'redts_zd_client_doc_infos.client_id',
                'redts_zd_client_doc_infos.class_id',
                'redts_zd_client_doc_infos.class_slug',
                'redts_zd_client_doc_infos.subclass_id',
                'redts_zd_client_doc_infos.subclass_slug',
                'redts_zd_client_doc_infos.remarks',
                'redts_zd_client_doc_infos.validated',
                'redts_zd_client_doc_infos.compliance_deadline',
                'redts_zd_client_doc_infos.created_at',

                #region app type
                'app_type.applicant',
                #endregion app type

                #region transaction type
                'transac_type.transaction',
                'transac_type.slug as transaction_slug',
                #endregion transaction type

                #region client info
                'clientInf.fname as client_fname',
                'clientInf.mname as client_mname',
                'clientInf.sname as client_sname',
                'clientInf.suffix as client_suffix',
                'clientInf.address as client_address',
                'clientInf.email as client_email',
                'clientInf.email_verify as client_email_verify',
                'clientInf.contact_no as client_contact_no',
                #endregion client info

                #region doc clas
                'doc_class.description as doc_class_full',
                #endregion doc clas

                #region doc type
                'doc_type.description as doc_type_full',
                #endregion doc type
            )
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.id', '=', 'redts_zd_client_doc_infos.application_type_id')
                ->leftJoin('redts_za_transaction_types as transac_type', 'transac_type.id', '=', 'redts_zd_client_doc_infos.transaction_type_id')
                ->leftJoin('redts_zc_client_infos as clientInf', 'clientInf.id', '=', 'redts_zd_client_doc_infos.client_id')
                ->leftJoin('redts_ee_classification as doc_class', 'doc_class.id', '=', 'redts_zd_client_doc_infos.class_id')
                ->leftJoin('redts_l_sub_class as doc_type', 'doc_type.id', '=', 'redts_zd_client_doc_infos.subclass_id')
                ->where('redts_zd_client_doc_infos.doc_no', $doc_no)
                ->whereNull('redts_zd_client_doc_infos.deleted_at')
                ->first();


            $doc_stats = redts_n_action::select(
                'redts_n_actions.id',
                'redts_n_actions.doc_id',
                'redts_n_actions.sender_client_id',
                'redts_n_actions.sender_user_id',
                'redts_n_actions.sender_type',
                'redts_n_actions.referred_by_office',
                'redts_n_actions.action_taken',
                'redts_n_actions.send_to_office',
                'redts_n_actions.received_id',
                'redts_n_actions.received',
                'redts_n_actions.released',
                'redts_n_actions.validated',
                'redts_n_actions.released',
                'redts_n_actions.final_action',
                'redts_n_actions.rejected',
                'redts_n_actions.verification_date',
                'redts_n_actions.subject',
                'redts_n_actions.in_transit_remarks',
                'redts_n_actions.action_remarks',
                'redts_n_actions.attachment_remarks',
                'redts_n_actions.deleted_at',
                'redts_n_actions.created_at',

                #region document info
                'doc_info.doc_no',
                'doc_info.validated',
                'doc_info.subclass_slug',
                'doc_info.compliance_deadline',
                'app_type.applicant',
                #endregion document info

                #region user sender
                'sender_user.username as sender_username',
                #endregion user sender

                #region referred by office
                'referred_by.office as referred_by_abbrv',
                'referred_by.full_office_name as referred_by_full_office_name',
                #endregion referred by office

                #region send to office
                'send_to.office as send_to_abbrv',
                'send_to.full_office_name as send_to_full_office_name',
                #endregion send to office


                #region received by
                'received_by.fname as receiver_fname',
                'received_by.mname as receiver_mname',
                'received_by.sname as receiver_sname',
                'received_by.suffix as receiver_suffix',
                #endregion received by
            )
                ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.id', '=', 'redts_n_actions.doc_id')
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.id', '=', 'doc_info.application_type_id')
                ->leftJoin('redts_b_user as sender_user', 'sender_user.id', '=', 'redts_n_actions.sender_user_id')
                ->leftJoin('redts_f_offices as referred_by', 'referred_by.id', '=', 'redts_n_actions.referred_by_office')
                ->leftJoin('redts_f_offices as send_to', 'send_to.id', '=', 'redts_n_actions.send_to_office')
                ->leftJoin('redts_d_profile as received_by', 'received_by.id', '=', 'redts_n_actions.received_id')
                ->where('redts_n_actions.doc_id', $doc_info->id)
                ->whereNull('redts_n_actions.deleted_at')
                ->get();
            $user_office = redts_j_user_offices::select(
                'office.slug',
                'office.office',
                'office.full_office_name',
                'office.office_type',
                'office.mother_unit',
                'office.header_office_title',
                'office.office_address',
            )
                ->leftJoin('redts_f_offices as office', 'office.uuid', '=', 'redts_j_user_offices.offices_uuid')
                ->where('redts_j_user_offices.user_id', Auth::user()->id)
                ->first();

            //Check if document request is a chainsaw registration
            // if(){

            // }

            return view('general-dash-cert-chainsaw-reg', [
                'doc_info' => $doc_info,
                'doc_stats' => $doc_stats,
                'user_office' => $user_office,
            ]);
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    #endregion certification for chainsaw registration

    #region statistical graphs
    public function indexgeneraldashboardstats()
    {
        if (Auth::check()) {
            return view('general-dashboard-stats');
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    public function fetchmonthlyrequestpermonthall(Request $request)
    {
        $stat_origin_year = $request['stat_origin_year']; //get year

        //get total request for the year
        $monthlyCounts = array(); //store month data
        for ($month = 1; $month <= 12; $month++) { //get every month for the year
            $count = redts_zd_client_doc_info::whereYear('created_at', $stat_origin_year)
                ->whereMonth('created_at', $month)
                ->whereNull('deleted_at')
                ->count();

            //order: 1 - 12 or january to december of the year
            array_push($monthlyCounts, $count);
        }

        //return data for charts
        return response()->json([
            'success' => true,
            'monthlyCounts' => $monthlyCounts,
        ]);
    }
    public function fetchdashstats(Request $request)
    {
        $stat_origin_year = $request['stat_origin_year']; //get year

        // requests this month
        $thisMonth = redts_zd_client_doc_info::whereYear('created_at', date('Y')) //will always get data from current year
            ->whereMonth('created_at', date('m'))
            ->whereNull('deleted_at')
            ->count();

        // request annual
        $annual = redts_zd_client_doc_info::whereYear('created_at', $stat_origin_year)
            ->whereNull('deleted_at')
            ->count();

        //get completed
        $approved = redts_zd_client_doc_info::select(
            'redts_zd_client_doc_infos.id',
            'redts_n_actions.doc_id',
            'redts_zd_client_doc_infos.created_at',
            'redts_n_actions.final_action',
            'redts_n_actions.rejected',
        )->leftJoin('redts_n_actions', 'redts_zd_client_doc_infos.id', '=', 'redts_n_actions.doc_id')
            ->whereYear('redts_zd_client_doc_infos.created_at', $stat_origin_year)
            ->whereNotNull('redts_n_actions.final_action')
            ->whereNull('redts_zd_client_doc_infos.deleted_at')
            ->count();


        $rejected = redts_zd_client_doc_info::select(
            'redts_zd_client_doc_infos.id',
            'redts_n_actions.doc_id',
            'redts_zd_client_doc_infos.created_at',
            'redts_n_actions.final_action',
            'redts_n_actions.rejected',
        )->leftJoin('redts_n_actions', 'redts_zd_client_doc_infos.id', '=', 'redts_n_actions.doc_id')
            ->whereYear('redts_zd_client_doc_infos.created_at', $stat_origin_year)
            ->whereNotNull('redts_n_actions.rejected')
            ->whereNull('redts_zd_client_doc_infos.deleted_at')
            ->count();

        //get pending
        $count_pending = 0;
        $alldocreq = redts_zd_client_doc_info::whereYear('created_at', $stat_origin_year)
            ->whereNull('deleted_at')
            ->get();
        foreach ($alldocreq as $adr) {
            if (redts_n_action::where('doc_id', $adr->id)->whereNotNull('final_action')->whereNull('deleted_at')->exists()) {
            } else {
                if (redts_n_action::where('doc_id', $adr->id)->whereNotNull('rejected')->whereNull('deleted_at')->exists()) {
                } else {
                    $count_pending += 1;
                }
            }
        }


        return response()->json([
            'success' => true,
            'month' => $stat_origin_year,
            'month' => date('m'),
            'thisMonth' => $thisMonth,
            'annual' => $annual,
            'completed' => $approved + $rejected,
            'pending' => $count_pending,
        ]);
    }
    public function fetchtotalreqperclassannually(Request $request)
    {
        $stat_origin_year = $request['stat_origin_year']; //get year

        // request annual per classification
        $classification = redts_ee_classification::whereNull('deleted_at')->get();

        $annual_count_per_class_label = array();
        $annual_count_per_class = array();
        foreach ($classification as $class) {
            $class_count = redts_zd_client_doc_info::whereYear('created_at', $stat_origin_year)
                ->where('class_id', $class->id)
                ->whereNull('deleted_at')
                ->count();

            array_push($annual_count_per_class_label, $class->description);
            array_push($annual_count_per_class, $class_count);
        }

        return response()->json([
            'success' => true,
            'annual_count_per_class_label' => $annual_count_per_class_label,
            'annual_count_per_class' => $annual_count_per_class,
            'msg' => 'class data here',
        ]);
    }
    public function fetchannualsubclassrequests(Request $request)
    {
        $stat_origin_year = $request['stat_origin_year']; //get year

        //get count per subclass
        $subclass = redts_l_sub_class::whereNull('deleted_at')->get();
        $annual_count_per_sub_class_label = array();
        $annual_count_per_sub_class = array();
        foreach ($subclass as $sc) {

            $class_count = redts_zd_client_doc_info::whereYear('created_at', $stat_origin_year)
                ->where('subclass_id', $sc->id)
                ->whereNull('deleted_at')
                ->count();

            array_push($annual_count_per_sub_class_label, $sc->description);
            array_push($annual_count_per_sub_class, $class_count);
        }

        return response()->json([
            'success' => true,
            'annual_count_per_sub_class_label' => $annual_count_per_sub_class_label,
            'annual_count_per_sub_class' => $annual_count_per_sub_class,
        ]);
    }
    public function fetchtotalclientpergenderannually(Request $request)
    {
        $stat_origin_year = $request['stat_origin_year']; //get year

        $male_client = redts_zc_client_info::where('sex', 'M')->whereYear('created_at', $stat_origin_year)->whereNull('deleted_at')->count();
        $female_client = redts_zc_client_info::where('sex', 'F')->whereYear('created_at', $stat_origin_year)->whereNull('deleted_at')->count();

        return response()->json([
            'success' => true,
            'male_client' => $male_client,
            'female_client' => $female_client,
        ]);
    }
    public function fetchannualrequestsperreceivingoffice(Request $request)
    {
        $stat_origin_year = $request['stat_origin_year']; //get year

        //get count per receiving office
        $offices = redts_f_offices::where('office_type', 'Receiving')->whereNull('deleted_at')->get();
        $annual_count_per_receiving_office_label = array();
        $annual_count_per_receiving_office = array();
        foreach ($offices as $office) {

            $class_count = redts_zd_client_doc_info::leftJoin('redts_zi_origin_offices as origin_office', 'origin_office.doc_id', 'redts_zd_client_doc_infos.id')
                ->where('origin_office.origin_office_id', $office->id)
                ->whereYear('redts_zd_client_doc_infos.created_at', $stat_origin_year)
                ->whereNull('redts_zd_client_doc_infos.deleted_at')
                ->count();

            array_push($annual_count_per_receiving_office_label, $office->office);
            array_push($annual_count_per_receiving_office, $class_count);
        }

        return response()->json([
            'success' => true,
            'annual_count_per_receiving_office_label' => $annual_count_per_receiving_office_label,
            'annual_count_per_receiving_office' => $annual_count_per_receiving_office,
        ]);
        return response()->json([
            'success' => true,
        ]);
    }
    #endregion statistical graphs

    #region log function
    function recordAction($action)
    {
        #region record login in log
        $fetchExternalIp = $this->fetchExternalIp();
        $ip = $fetchExternalIp['ip'];
        $country = $fetchExternalIp['country'];

        $file = 'login_' .  date('Y_m') . '.txt';
        $upload_path = "public/assets/doc/login_records";
        $full_path = storage_path($upload_path . '/' . $file);
        $text = '' .
            '{ ' .
            '  "user_id": "' .  (Auth::user()->id ?? '') . '", ' .
            '  "user": "' .  (Auth::user()->username ?? '') . '", ' .
            '  "action_taken": "' .   $action . '",' .
            '  "email": "' . (Auth::user()->email ?? '') . '", ' .
            '  "ip_address": "' . $ip . '", ' .
            '  "date_time": "' . date('Y-m-d H:i:s') . '" ' .
            '} ' .
            PHP_EOL;

        $directory = storage_path($upload_path);

        // Create the directory if it doesn't exist
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        file_put_contents($full_path, $text, FILE_APPEND);
        #endregion record login in log
    }
    #endregion log function

    #region mobile user layout
    public function indexuserdashboardmobile()
    {
        if (Auth::check()) {
            return view('general-dashboard-mobile');
        } else {
            return $this->pageResponse()['page403'];
        }
    }
    #endregion mobile user layout

    public function indexgeneraldashimgtopdf()
    {
        if (Auth::check()) {
            return view('general-dash-img-to-pdf');
        } else {
            return $this->pageResponse()['page403'];
        }
    }

    #region eredts server hand-shake
    public function eredtsserverhandshake()
    {
        // 👇 API call before rendering sign-in view
        $baseUrl = config('app.bapiu'); // e.g. from APP_BAPIU in .env

        try {
            $apiCall = Http::get($baseUrl . '251e7804-0934-493a-a175-8fb304e6d362');
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "msg" => "api failed to respond",
            ]);
        }

        // count users from the api
        $apiCallData = $apiCall->ok() ? $apiCall->json() : [];

        $classCounted = 0;
        $applicantTypeCounted = 0;
        $transactionTypeCounted = 0;
        if ($apiCallData != []) {
            $classCounted = $apiCallData['classCounted'] ?? 0;
            $applicantTypeCounted = $apiCallData['applicantTypeCounted'] ?? 0;
            $transactionTypeCounted = $apiCallData['transactionTypeCounted'] ?? 0;
        }

        // local count here
        $classCountedLocal = redts_ee_classification::whereNull('deleted_at')->count();
        $applicantTypeCountedLocal = redts_z_applicant_type::whereNull('deleted_at')->count();
        $transactionTypeCountedLocal = redts_za_transaction_type::whereNull('deleted_at')->count();

        // check update classifications
        $classUptMsg = false;
        if ($classCounted == $classCountedLocal) {
            //do nothing if class count is the same
        } else {
            //get api class data and insert to local
            $apiClasses = http::get($baseUrl . '22e179f2-2430-4610-8e64-a3d58fe0a481');
            $apiClassesArr = $apiClasses->ok() ? $apiClasses->json() : [];
            $apiClassesData = $apiClassesArr['classes'] ?? [];

            foreach ($apiClassesData as $key => $class) {
                redts_ee_classification::create([
                    'uuid' => $class['uuid'],
                    'description' => $class['description'],
                    'classification_type' => $class['classification_type'],
                    'slug' => $class['slug'],
                ]);
            }
            $classUptMsg = true;
        }

        // check app types
        $appTypeUptMsg = false;
        if ($applicantTypeCounted == $applicantTypeCountedLocal) {
            //do nothing
        } else {
            //get api app type data and insert to local
            $apiAppTypes = http::get($baseUrl . '71ac292f-c6e0-4af1-ac3d-6c756fc50c71');
            $apiAppTypesArr = $apiAppTypes->ok() ? $apiAppTypes->json() : [];
            $apiAppTypesData = $apiAppTypesArr['appTypes'] ?? [];

            foreach ($apiAppTypesData as $key => $appType) {
                redts_z_applicant_type::create([
                    'uuid' => $appType['uuid'],
                    'transaction_uuid' => $appType['transaction_uuid'],
                    'applicant' => $appType['applicant'],
                ]);
            }

            $appTypeUptMsg = true;
        }

        // check transaction types

        $transactTypeUptMsg = false;
        if ($transactionTypeCounted == $transactionTypeCountedLocal) {
            //do nothing
        } else {
            //get api app type data and insert to local
            $apiTransactType = http::get($baseUrl . '7c63a6de-c592-409b-a6cc-50af1b85a0db');
            $apiTransactTypeArr = $apiTransactType->ok() ? $apiTransactType->json() : [];
            $apiTransactTypeData = $apiTransactTypeArr['transacTypes'] ?? [];

            foreach ($apiTransactTypeData as $key => $transactType) {
                redts_za_transaction_type::create([
                    'uuid' => $transactType['uuid'],
                    'transaction' => $transactType['transaction'],
                    'slug' => $transactType['slug'],
                ]);
            }

            $transactTypeUptMsg = true;
        }

        return response()->json([
            'success' => true,
            'apiCallData' => $apiCallData,
        ]);
    }
    #endregion eredts server hand-shake

    #region get ip
    public function fetchExternalIp()
    {
        try {
            $response = Http::get('https://api.myip.com');
            return $response->json();
        } catch (\Exception $e) {
            return ["ip" => "myip web api returns error", "country" => "N/A", "cc" => "N/A"];
        }
    }
    #endregion get ip

    #region page response
    public function pageResponse()
    {
        // Page Found But Unathorized to open view
        $page404 = '' .
            '<div ' .
            '   style="' .
            '       text-align: center; ' .
            '       background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); ' .
            '       font: small-caps bold 24px/1 sans-serif;' .
            '       height: 100%;' .
            '       padding-top: 20%;' .
            '   "' .
            '>' .
            '   <span> ' .
            '       <h2>𓆩♡𓆪</h2>' .
            '       <h2><404))))><</h2>' .
            '       <h2>Denr RFSOATS: page not found</h2>' .
            '       <h3>Contact Admin For More Details. . .</h3>' .
            '       <h5><a href="/">Go to home page<a></h5>' .
            '   </span>' .
            '</div>' .
            '';

        $page403 = '' .
            '<div ' .
            '   style="' .
            '       text-align: center; ' .
            '       background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); ' .
            '       font: small-caps bold 24px/1 sans-serif;' .
            '       height: 100%;' .
            '       padding-top: 20%;' .
            '   "' .
            '>' .
            '   <span> ' .
            '       <h2>𓆩♡𓆪</h2>' .
            '       <h2><º))))><</h2>' .
            '       <h2>Denr RFSOATS: You Don\'t Have Permission to Access this page</h2>' .
            '       <h3>Contact Admin For More Details. . .</h3>' .
            '       <h5><a href="/">Go to home page<a></h5>' .
            '   </span>' .
            '</div>' .
            '';

        $usernameQuestioned = '' .
            '<div ' .
            '   style="' .
            '       text-align: center; ' .
            '       background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); ' .
            '       font: small-caps bold 24px/1 sans-serif;' .
            '       height: 100%;' .
            '       padding-top: 20%;' .
            '   "' .
            '>' .
            '   <span> ' .
            '       <h2>𓆩♡𓆪</h2>' .
            '       <h2><º))))><</h2>' .
            '       <h2>Denr RFSOATS: Who are you!?</h2>' .
            '       <h3>Contact Admin For More Details. . .</h3>' .
            '       <h5><a href="/">Go to home page<a></h5>' .
            '   </span>' .
            '</div>' .
            '';

        return [
            'page404' => $page404,
            'page403' => $page403,
            'usernameQuestioned' => $usernameQuestioned,
        ];
    }
    #endregion page response
}
