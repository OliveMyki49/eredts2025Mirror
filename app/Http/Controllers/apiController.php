<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\redts_a_access;
use App\Models\redts_n_action;
use App\Models\redts_d_profile;
use App\Models\redts_f_offices;
use App\Http\Controllers\Controller;
use App\Models\redts_j_user_offices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\redts_ee_classification;
use App\Models\redts_zd_client_doc_info;

class apiController extends Controller
{
    public function localareYouOnline()
    {
        return response()->json([
            'success' => true,
        ]);
    }

    // verify user
    public function localverifyUser(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($password != null && User::where('username', $username)->whereNull('deleted_at')->exists()) {
            $user = User::where('username', $username)->whereNull('deleted_at')->first();
            if (Hash::check($password, $user->password)) {
                //get the generat user information
                $this->recordAction('User request local verification: ' . $username);

                $user_uuid = $user->uuid;
                $access_uuid = $user->access_uuid;

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
                    'user' => $user,
                    'user_profile' => $user_profile,
                    'access_type' => $access_type,
                    'user_offices' => $user_offices,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'data' => null,
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'data' => null,
            ]);
        }
    }

    // get office locally also fetch classes here
    public function localfetchoffice(Request $request)
    {
        //get uuid of the request local app
        $user_uuid = $request->input('user_uuid');
        if (User::where('uuid', $user_uuid)->whereNull('deleted_at')->exists()) {

            $office = redts_f_offices::select(
                'uuid',
                'slug',
                'office',
                'full_office_name',
            )->whereNull('deleted_at')->get();

            $classification = redts_ee_classification::whereNull('deleted_at')->get();
            return response()->json([
                'success' => true,
                'office' => $office,
                'classification' => $classification,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'user_uuid' => $user_uuid,
                'msg' => 'user credentials invalid',
            ]);
        }
    }

    //upload local actions
    public function storelocalactions(Request $request)
    {
        //get uuid of the request local app
        $user_uuid = $request->input('user_uuid');
        $payload = $request->input('payload');
        if (User::where('uuid', $user_uuid)->whereNull('deleted_at')->exists()) {

            //check status of each payload
            $payload_status = [];
            foreach ($payload as $key => $item) { //write status of each payload
                if (redts_zd_client_doc_info::where('doc_no', $item['doc_no'])->whereNull('deleted_at')->exists()) { //check doc_no if it exists
                    //check action is for update or new
                    if (redts_n_action::where('uuid', $item['ol_act_uuid'])->whereNull('deleted_at')->exists() && $item['ol_act_uuid'] != null) {
                        // check if doc_action status
                        $last_doc_action_query = redts_n_action::where('doc_no', $item['doc_no'])
                            ->whereNull('deleted_at')
                            ->latest('created_at')
                            ->first(); //get the last action

                        //remove in-transit action that is uploaded if new local action is created
                        if ($last_doc_action_query->uploaded_act != null && $last_doc_action_query->action_taken == null) {
                            $last_doc_action_query->deleted_at = date('Y-m-d H:i:s');
                            $last_doc_action_query->save();
                        }

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

                        //check if action is aleady released
                        if (redts_n_action::where('uuid', $item['ol_act_uuid'])->whereNull('released')->exists()) {
                            //update identified as existing action
                            $upt_action = redts_n_action::where('uuid', $item['ol_act_uuid'])->whereNull('deleted_at')->update([
                                'action_taken' => $item['action_taken'], // user input
                                'send_to_office' => null, //recipient office
                                'send_to_office_uuid' => $item['send_to_office_uuid'], //recipient office
                                'received_uuid' => $item['received_uuid'], //null
                                'received' => $item['received'],
                                'released' => $item['released'],
                                'in_transit_remarks' => $item['in_transit_remarks'], // null
                                'document_remarks' => null, // null
                                'action_remarks' => $item['action_taken'],
                                'attachment_remarks' => $item['attachment_remarks'], //user input
                                'uploaded_act' => date('Y-m-d H:i:s'), //date uploaded
                            ]);

                            //created action for continuation
                            $new_send_action_uuid = $this->generateUuid(); //new uuid
                            $new_send_action = redts_n_action::create([
                                'uuid' => $new_send_action_uuid,
                                'subject' =>  $last_doc_action->subject, //as is
                                'doc_id' => $last_doc_action->doc_id, //as is
                                'doc_uuid' => $last_doc_action->doc_uuid,
                                'doc_no' => $item['doc_no'],
                                'sender_client_id' => null, //as is
                                'sender_user_id' => null, //since cannot be identified offline
                                'sender_user_uuid' => null, //since cannot be identified offline
                                'sender_type' => 'offline user', //user info
                                'referred_by_office' => null, //user info
                                'referred_by_office_uuid' => $item['referred_by_office_uuid'], //user info
                                'action_taken' => null, // user input
                                'send_to_office' => null, //recipient office
                                'send_to_office_uuid' => $item['send_to_next_office_uuid'], //recipient office
                                'received_uuid' => null,
                                // 'received' => $item['received'],
                                // 'released' => $item['released'],
                                'in_transit_remarks' => null, // null
                                'document_remarks' => null, // null
                                'action_remarks' => null,
                                'attachment_remarks' => $item['attachment_remarks'], //user input
                                'uploaded_act' => date('Y-m-d H:i:s'), //date uploaded
                                'updated_at' => $item['updated_at'], //local updated_at
                                'created_at' => $item['created_at'], //local created_at
                            ]);

                            $payload_status[] = [
                                'act_id' => $item['id'],
                                'doc_no' => $item['doc_no'],
                                'upload_status' => 1,
                                'remarks' => 'doc_source exists',
                                'stat_msg' => 'exisiting action updated',
                                'stat_msg_stat' => 'exisiting action updated',
                                'upt_action' => $upt_action,
                                'released_time' => $item['released'],
                                'upload_date' => date('Y-m-d H:i:s'),
                                'upload_failed' => null,
                                'upload_fail_remarks' => null,
                            ];
                        } else {
                            //Document action already released
                            $payload_status[] = [
                                'act_id' => $item['id'],
                                'doc_no' => $item['doc_no'],
                                'upload_status' => 0,
                                'remarks' => 'doc_source exists',
                                'stat_msg' => 'exisiting action updated',
                                'stat_msg_stat' => 'exisiting action updated',
                                'upload_date' => null,
                                'upload_failed' => date('Y-m-d H:i:s'),
                                'upload_fail_remarks' => "Document action already forwarded",
                            ];
                        }
                    } else {
                        // check if doc_action status
                        $last_doc_action_query = redts_n_action::where('doc_no', $item['doc_no'])
                            ->whereNull('deleted_at')
                            ->latest('created_at')
                            ->first(); //get the last action

                        if (redts_n_action::where('doc_no', $item['doc_no'])->whereNull('deleted_at')->count() == 1) {
                            //if only 1 action is found then just update it
                            redts_n_action::where('doc_no', $item['doc_no'])
                                ->where('action_taken', null)
                                ->where('received_uuid', null)
                                //add send to excific office so that when multiple instansit only pic the sent to office action
                                ->whereNull('deleted_at')
                                ->latest('created_at')
                                ->update([
                                    'received' => date('Y-m-d H:i:s'),
                                    'released' => date('Y-m-d H:i:s'),
                                    'action_taken' => 'The action continues to be performed offline.',
                                    'action_remarks' => 'The action continues to be performed offline.',
                                ]);
                        } else {
                            if ($last_doc_action_query->created_at > $item['created_at']) {
                            } else {
                                //remove in-transit action that is uploaded if new local action is created
                                redts_n_action::where('doc_no', $item['doc_no'])
                                    ->where('action_remarks', null) //action taken is given when action is forwarded within the system
                                    ->where('received_uuid', null)
                                    //add send to excific office so that when multiple instansit only pic the sent to office action
                                    ->whereNull('deleted_at')
                                    ->latest('created_at')
                                    ->update(['deleted_at' => date('Y-m-d H:i:s')]);
                            }
                        }

                        if ($last_doc_action_query->created_at > $item['created_at']) {
                        } else {
                            //release forward received action that is if new local action is created
                            redts_n_action::where('doc_no', $item['doc_no'])
                                ->whereNotNull('received_uuid')
                                // ->whereNull('action_taken') //action taken is given when action is forwarded within the system
                                ->whereNull('action_remarks')
                                ->whereNull('released')
                                ->whereNull('deleted_at')
                                ->latest('created_at')
                                ->update([
                                    'released' => date('Y-m-d H:i:s'),
                                    'action_taken' => 'The action continues to be performed offline.',
                                    'action_remarks' => 'The action continues to be performed offline.',
                                ]); // Get the last action and update if found
                        }

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

                        if (redts_n_action::where('doc_no', $item['doc_no'])->whereNotNull('final_action')->exists()) {
                            $payload_status[] = [
                                'act_id' => $item['id'],
                                'doc_no' => $item['doc_no'],
                                'upload_status' => 0,
                                'remarks' => 'doc_source exists',
                                'stat_msg' => $stat_msg,
                                'stat_msg_stat' => $stat_msg_stat,
                                'upload_date' => null,
                                'upload_failed' => date('Y-m-d H:i:s'),
                                'upload_fail_remarks' => "Document action already ended",
                            ];
                        } else {
                            if ($stat_msg_stat == 'completed') { //deny action taken and return as failed upload
                                $payload_status[] = [
                                    'act_id' => $item['id'],
                                    'doc_no' => $item['doc_no'],
                                    'upload_status' => 0,
                                    'remarks' => 'doc_source exists',
                                    'stat_msg' => $stat_msg,
                                    'stat_msg_stat' => $stat_msg_stat,
                                    'upload_date' => null,
                                    'upload_failed' => date('Y-m-d H:i:s'),
                                    'upload_fail_remarks' => "Document action already ended",
                                ];
                            } else if ($stat_msg_stat == 'received' || $stat_msg_stat == 'intransit') { //check if action is intransit and received
                                // store action query
                                $new_action_uuid = $this->generateUuid(); //new uuid
                                $new_action = redts_n_action::create([
                                    'uuid' => $new_action_uuid,
                                    'subject' => $last_doc_action->subject, //as is
                                    'doc_id' => $last_doc_action->doc_id, //as is
                                    'doc_uuid' => $last_doc_action->doc_uuid,
                                    'doc_no' => $item['doc_no'],
                                    'sender_client_id' => null, //as is
                                    'sender_user_id' => null, //since cannot be identified offline
                                    'sender_user_uuid' => null, //since cannot be identified offline
                                    'sender_type' => 'offline user', //user info
                                    'referred_by_office' => null, //user info
                                    'referred_by_office_uuid' => $item['referred_by_office_uuid'], //user info
                                    'action_taken' => $item['action_taken'], // user input
                                    'send_to_office' => null, //recipient office
                                    'send_to_office_uuid' => $item['send_to_office_uuid'], //recipient office
                                    'received_uuid' => $item['received_uuid'], //null
                                    'received' => $item['received'],
                                    'released' => $item['released'],
                                    'in_transit_remarks' => $item['in_transit_remarks'], // null
                                    'document_remarks' => null, // null
                                    'action_remarks' => $item['action_taken'],
                                    'attachment_remarks' => $item['attachment_remarks'], //user input
                                    'uploaded_act' => date('Y-m-d H:i:s'), //date uploaded
                                    'created_at' => $item['created_at'], //local created_at
                                    'updated_at' => $item['updated_at'], //local updated_at
                                ]);

                                //compare latest action create_at date and time with the uploaded created date and time
                                if ($last_doc_action->created_at > $item['created_at']) {
                                    //do not create new action
                                } else {
                                    //create a new action for intransit to continue

                                    //created action for continuation
                                    $new_send_action_uuid = $this->generateUuid(); //new uuid
                                    $new_send_action = redts_n_action::create([
                                        'uuid' => $new_send_action_uuid,
                                        'subject' => $last_doc_action->subject, //as is
                                        'doc_id' => $last_doc_action->doc_id, //as is
                                        'doc_uuid' => $last_doc_action->doc_uuid,
                                        'doc_no' => $item['doc_no'],
                                        'sender_client_id' => null, //as is
                                        'sender_user_id' => null, //since cannot be identified offline
                                        'sender_user_uuid' => null, //since cannot be identified offline
                                        'sender_type' => 'offline user', //user info
                                        'referred_by_office' => null, //user info
                                        'referred_by_office_uuid' => $item['referred_by_office_uuid'], //user info
                                        'action_taken' => null, // user input
                                        'send_to_office' => null, //recipient office
                                        'send_to_office_uuid' => $item['send_to_next_office_uuid'], //recipient office
                                        'received_uuid' => null,
                                        // 'received' => $item['received'],
                                        // 'released' => $item['released'],
                                        'in_transit_remarks' => null, // null
                                        'document_remarks' => null, // null
                                        'action_remarks' => null,
                                        'attachment_remarks' => $item['attachment_remarks'], //user input
                                        'uploaded_act' => date('Y-m-d H:i:s'), //date uploaded
                                        'updated_at' => $item['updated_at'], //local updated_at
                                        'created_at' => $item['created_at'], //local created_at
                                    ]);
                                }

                                $payload_status[] = [
                                    'act_id' => $item['id'],
                                    'doc_no' => $item['doc_no'],
                                    'upload_status' => 1,
                                    'remarks' => 'doc_source exists',
                                    'stat_msg' => $stat_msg,
                                    'stat_msg_stat' => $stat_msg_stat,
                                    'new_action' => $new_action,
                                    'released_time' => $item['released'],
                                    'upload_date' => date('Y-m-d H:i:s'),
                                    'upload_failed' => null,
                                    'upload_fail_remarks' => null,
                                ];
                            } else { // if status us unknown set as failed upload
                                $payload_status[] = [
                                    'act_id' => $item['id'],
                                    'doc_no' => $item['doc_no'],
                                    'upload_status' => 0,
                                    'remarks' => 'no such doc_no found',
                                    'stat_msg' => null,
                                    'stat_msg_stat' => null,
                                    'upload_date' => null,
                                    'upload_failed' => date('Y-m-d H:i:s'),
                                    'upload_fail_remarks' => "Uknown doc_no current status",
                                ];
                            }
                        }
                    }
                } else {
                    $payload_status[] = [
                        'act_id' => $item['id'],
                        'doc_no' => $item['doc_no'],
                        'upload_status' => 0,
                        'remarks' => 'no such doc_no found',
                        'stat_msg' => null,
                        'stat_msg_stat' => null,
                        'upload_date' => null,
                        'upload_failed' => date('Y-m-d H:i:s'),
                        'upload_fail_remarks' => "Document does not exist",
                    ];
                }
            }

            return response()->json([
                'success' => true,
                'msg' => 'api responded',
                'payload' => $payload,
                'payload_status' => $payload_status,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'no such user found',
            ]);
        }
    }

    //sync intransit on local eredts app
    public function localintransitsync(Request $request)
    {
        //get uuid of the request local app
        $user_uuid = $request->input('user_uuid');
        $office_uuid = $request->input('office_uuid');
        if (User::where('uuid', $user_uuid)->whereNull('deleted_at')->exists()) {
            //get the latest date update_at of action of an intransit from the specific office
            $data = redts_n_action::select(
                'redts_n_actions.id',
                'redts_n_actions.uuid',
                'redts_n_actions.doc_id',
                'redts_n_actions.doc_no',
                'redts_n_actions.doc_uuid',
                'redts_n_actions.sender_user_id',
                'redts_n_actions.sender_user_uuid',
                'redts_n_actions.sender_type',
                'redts_n_actions.referred_by_office',
                'redts_n_actions.referred_by_office_uuid',
                'redts_n_actions.action_taken',
                'redts_n_actions.send_to_office',
                'redts_n_actions.send_to_office_uuid',
                // 'redts_n_actions.received_id',
                // 'redts_n_actions.received_uuid',
                // 'redts_n_actions.received',
                // 'redts_n_actions.validated',
                // 'redts_n_actions.released',
                'redts_n_actions.in_transit_remarks',
                // 'redts_n_actions.final_action',
                // 'redts_n_actions.rejected',
                // 'redts_n_actions.verification_date',
                'redts_n_actions.subject',
                'redts_n_actions.action_remarks',
                'redts_n_actions.attachment_remarks',
                // 'redts_n_actions.uploaded_act',
                'redts_n_actions.deleted_at',
                'redts_n_actions.created_at',
                'redts_n_actions.updated_at',

                #region document info
                // 'doc_info.doc_no',
                // 'doc_info.validated',
                // 'doc_info.class_slug',
                // 'app_type.applicant',
                // #endregion document info

                // #region user sender
                // 'sender_user.username as sender_username',
                // #endregion user sender

                #region referred by office
                'referred_by.slug as referred_by_slug',
                // 'referred_by.office as referred_by_abbrv',
                'referred_by.full_office_name as referred_by_full_office_name',
                #endregion referred by office

                // #region send to office
                // 'send_to.office as send_to_abbrv',
                // 'send_to.full_office_name as send_to_full_office_name',
                #endregion send to office
            )
                ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.uuid', '=', 'redts_n_actions.doc_uuid')
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.uuid', '=', 'doc_info.application_type_uuid')
                ->leftJoin('redts_b_user as sender_user', 'sender_user.uuid', '=', 'redts_n_actions.sender_user_uuid')
                ->leftJoin('redts_f_offices as referred_by', 'referred_by.uuid', '=', 'redts_n_actions.referred_by_office_uuid')
                ->leftJoin('redts_f_offices as send_to', 'send_to.uuid', '=', 'redts_n_actions.send_to_office_uuid')
                ->where('redts_n_actions.send_to_office_uuid', $office_uuid)
                ->whereNull('redts_n_actions.received')
                ->whereNull('redts_n_actions.final_action')
                ->whereNull('redts_n_actions.rejected')
                ->whereNull('redts_n_actions.deleted_at')
                ->orderBy('redts_n_actions.created_at', 'desc')
                ->get();

            // Fetch the most recent created_at
            $recentActDate = redts_n_action::where('redts_n_actions.send_to_office_uuid', $office_uuid)
                ->whereNull('redts_n_actions.received')
                ->whereNull('redts_n_actions.final_action')
                ->whereNull('redts_n_actions.rejected')
                ->whereNull('redts_n_actions.deleted_at')
                ->orderBy('redts_n_actions.created_at', 'desc')
                ->first(['id', 'redts_n_actions.created_at']);

            return response()->json([
                'success' => true,
                'msg' => 'user exists, commensing sync',
                'data' => $data,
                'recentActDate' => $recentActDate,
            ]);
        }
    }

    #region upload file sync from app
    function uploadfilesync(Request $request)
    {
        $upload_path = 'public/assets/doc/action_files'; // Path inside storage/app
        $arr_response = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    $file_name = $file->getClientOriginalName();
                    $destination = storage_path($upload_path) . '/' . $file_name;

                    // Move file
                    $file->move(storage_path($upload_path), $file_name);

                    // Check if the file was successfully moved
                    if (file_exists($destination)) {
                        $arr_response[] = [
                            'file_name' => $file_name,
                            'success' => true,
                        ];
                    } else {
                        $arr_response[] = [
                            'file_name' => $file_name,
                            'success' => false,
                        ];
                    }
                }
            }
            return response()->json(['message' => 'Files uploaded successfully to action files folder', 'arr_response' => $arr_response]);
        }
        return response()->json(['message' => 'No files found'], 400);
    }
    #endregion upload file sync from app

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

    #region generate uuid
    public function generateUuid() //universal unique ID generator
    {
        $generated_uuid = (string) Str::uuid();
        return $generated_uuid;
    }
    #region generate uuid
}
