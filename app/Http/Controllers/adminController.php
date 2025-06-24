<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\redts_p_logs;
use Illuminate\Http\Request;
use App\Models\redts_a_access;
use App\Models\redts_e_region;
use App\Models\redts_d_profile;
use App\Models\redts_f_offices;
use App\Models\redts_l_sub_class;
use App\Models\redts_g_carousel_img;
use App\Models\redts_j_user_offices;
use App\Models\redts_y_requirements;
use App\Models\redts_zc_client_info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\redts_ba_view_reqs_spec;
use App\Models\redts_ee_classification;
use App\Models\redts_zd_client_doc_info;
use App\Models\redts_w_upload_size_limit;
use App\Models\redts_na_action_attachments;
use App\Models\redts_ze_client_doc_attachments;

class adminController extends Controller
{
    #region manage clients
    public function indexadmindashmngcli()
    {
        if (Auth::check()) {
            if (Auth::user()->access_id == 1 || Auth::user()->access_id == 2) {
                return view('admin-dashboard-manage-clients');
            } else {
                return $this->pageResponse()['usernameQuestioned'];
            }
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    #endregion manage clients

    #region client infos
    public function fetchDTclientinfos()
    {
        $clients = redts_zc_client_info::whereNull('deleted_at')->get();

        foreach ($clients as $cli) {
            $request_count = redts_zd_client_doc_info::where('client_id', $cli->id)->whereNull('deleted_at')->count();
            $cli->request_count = $request_count;
        }
        return datatables($clients)->toJson();
    }
    public function removeregisterClient(Request $request)
    {
        $id = $request->input('id');

        if (redts_zd_client_doc_info::where('client_id', $id)->whereNull('deleted_at')->exists()) {
            return response()->json([
                'success' => false,
                'haveRequest' => true,
                'msg' => '',
            ]);
        } else {
            if (Auth::user()->admin_delete == 1) {
                $update = redts_zc_client_info::where('id', $id)->whereNull('deleted_at')->update([
                    'deleted_at' => date('Y-m-d H:m:s'),
                ]);

                if ($update) {
                    //record log
                    $this->recordAction('Registered client with id ' . $id . ' has been removed');

                    return response()->json([
                        'success' => true,
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'haveRequest' => false,
                        'msg' => '',
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'haveRequest' => false,
                    'msg' => 'Admin delete is not enabled for this user',
                ]);
            }
        }
    }
    #endregion client infos

    #region admin dashboard for requests
    public function indexadmindashreq()
    {

        if (Auth::check() && Auth::user()->access_id == 1) {
            return view('admin-dash-requests');
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    #endregion admin dashboard for requests

    #region get statistics
    public function getredtsstats()
    {
        $documents = redts_ze_client_doc_attachments::whereNull('deleted_at')->count();
        $action_atch = redts_na_action_attachments::whereNull('deleted_at')->count();
        $classifications = redts_ee_classification::whereNull('deleted_at')->count();
        $subclassifications = redts_l_sub_class::whereNull('deleted_at')->count();
        $users = User::whereNull('deleted_at')->count();
        $users_active = User::where('status', 1)->whereNull('deleted_at')->count();
        $users_inactive = User::where('status', 0)->whereNull('deleted_at')->count();
        // $logs = redts_p_logs::count();

        #region log reports
        $upload_path = 'public/assets/doc/login_records';
        $directory = storage_path($upload_path);
        // Initialize an array to store file names
        $logs = 0;

        // Check if the directory exists
        if (is_dir($directory)) {
            // Open the directory
            if ($handle = opendir($directory)) {
                // Loop through each file in the directory
                while (false !== ($file = readdir($handle))) {
                    // Exclude "." and ".." entries
                    if ($file != '.' && $file != '..') {
                        $filepath = storage_path($upload_path . '/' . $file);
                        // Read the file line by line
                        $lines = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                        if ($lines === false) {
                        } else {
                            // Loop through each line
                            foreach ($lines as $line) {
                                // Parse each line as JSON
                                $logEntry = json_decode($line, true);

                                // Check if decoding was successful
                                if ($logEntry === null) {
                                    //do nothing
                                } else {
                                    $logs += 1;
                                }
                            }
                        }
                    }
                }

                // Close the directory handle
                closedir($handle);

                // Output the total count and list of file names
                // $totalCount = count($fileList);
            } else {
                // do nothing
            }
        } else {
            // do nothing
        }
        #endregion log reports

        return response()->json([
            'success' => true,
            'documents' => $documents,
            'action_atch' => $action_atch,
            'classifications' => $classifications,
            'subclassifications' => $subclassifications,
            'users' => $users,
            'users_active' => $users_active,
            'users_inactive' => $users_inactive,
            'logs' => $logs,
        ]);
    }
    #endregion get statistics

    #region classifications
    public function getredtsClassifications()
    {
        $class = redts_ee_classification::whereNull('deleted_at')->get();
        foreach ($class as $c) {
            $count_sub_class = redts_l_sub_class::where('classification_id', $c->id)->whereNull('deleted_at')->count();
            $c->count_sub_class = $count_sub_class;
        }
        return datatables($class)->toJson();
    }
    public function fetchredtsClassifications()
    {
        return response()->json([
            'success' => true,
            'classifications' => redts_ee_classification::whereNull('deleted_at')->get(),
        ]);
    }
    public function storeredtsClassifications(Request $request)
    {
        $description = $request->input('description');
        $slug = $request->input('slug');

        if (redts_ee_classification::where('slug', $slug)->exists()) {
            return response()->json([
                'success' => false,
            ]);
        } else {
            redts_ee_classification::create([
                'description' => $description,
                'slug' => $slug,
                'duration' => 3,
                'status' => 1,
                'new' => 0,
                'deleted' => 0,
            ]);

            //record log
            $this->recordAction('classification  ' . $description . ' has been added');

            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function updateredtsClassifications(Request $request)
    {
        $id = $request->input('id');
        $description = $request->input('description');
        $slug = $request->input('slug');

        if (redts_ee_classification::where('id', '!=', $id)->where('slug', $slug)->exists()) {
            return response()->json([
                'success' => false,
                'message' => '',
            ]);
        } else {
            $updated = redts_ee_classification::where('id', $id)->update([
                'description' => $description,
                'slug' => $slug,
            ]);

            if ($updated) {

                //record log
                $this->recordAction('Classification with slug ' . $slug . ' has been updated');

                return response()->json([
                    'success' => true,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'server error',
                ]);
            }
        }
    }
    public function removeredtsClassifications(Request $request)
    {
        $id = $request->input('id');

        if (Auth::user()->admin_delete == 1) {
            $update = redts_ee_classification::where('id', $id)->whereNull('deleted_at')->update([
                'deleted_at' => date('Y-m-d H:m:s'),
            ]);

            if ($update) {
                //record log
                $this->recordAction('Classification with id ' . $id . ' has been removed');

                return response()->json([
                    'success' => true,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'Admin delete is not enabled for this user',
            ]);
        }
    }
    #endregion classifications

    #region sub classifications
    public function getredtsSubClass()
    {
        $sb =  redts_l_sub_class::select(
            'redts_l_sub_class.id',
            'redts_l_sub_class.classification_id',
            'redts_ee_classification.description as main_class',
            'redts_l_sub_class.description as sub_class',
            'redts_l_sub_class.full_description',
            'redts_l_sub_class.slug',
            'redts_l_sub_class.classification_type',
        )->leftJoin('redts_ee_classification', 'redts_ee_classification.id', '=', 'redts_l_sub_class.classification_id')
            ->whereNull('redts_l_sub_class.deleted_at')
            ->get();

        return datatables($sb)->toJson();
    }
    public function fetchredtsSubClass()
    {
        return response()->json([
            'success' => true,
            'classifications' => redts_l_sub_class::whereNull('deleted_at')->get(),
        ]);
    }
    public function fetchredtsSubClass_by($class_id)
    {
        return response()->json([
            'success' => true,
            'subclass' => redts_l_sub_class::where('classification_id', $class_id)->whereNull('deleted_at')->get(),
        ]);
    }
    public function storeredtsSubClass(Request $request)
    {
        $classification_id = $request->input('classification_id');
        $description = $request->input('description');
        $full_description = $request->input('full_description');
        $slug = $request->input('slug');

        if (redts_l_sub_class::where('slug', $slug)->exists()) {
            return response()->json([
                'success' => false,
            ]);
        } else {
            redts_l_sub_class::create([
                'classification_id' => $classification_id,
                'description' => $description,
                'full_description' => $full_description,
                'slug' => $slug,
            ]);

            //record log
            $this->recordAction('subclass  ' . $description . ' has been added');

            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function updateredtsSubClass(Request $request)
    {
        $id = $request->input('id');
        $description = $request->input('description');
        $full_description = $request->input('full_description');
        $slug = $request->input('slug');

        if (redts_l_sub_class::where('id', '!=', $id)->where('slug', $slug)->exists()) {
            return response()->json([
                'success' => false,
                'message' => '',
            ]);
        } else {
            $updated = redts_l_sub_class::where('id', $id)->update([
                'description' => $description,
                'full_description' => $full_description,
                'slug' => $slug,
            ]);

            if ($updated) {

                //record log
                $this->recordAction('Sub class with slug ' . $slug . ' has been updated');

                return response()->json([
                    'success' => true,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'server error',
                ]);
            }
        }
    }
    public function removeredtsSubClass(Request $request)
    {
        $id = $request->input('id');


        if (Auth::user()->admin_delete == 1) {
            $update = redts_l_sub_class::where('id', $id)->whereNull('deleted_at')->update([
                'deleted_at' => date('Y-m-d H:m:s'),
            ]);

            if ($update) {
                //record log
                $this->recordAction('Subclass with id ' . $id . ' has been removed');

                return response()->json([
                    'success' => true,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'Admin delete is not enabled for this user',
            ]);
        }
    }
    #endregion sub classifications

    #region sub-class requirements
    public function getredtsSubClassReq()
    {
        $sb =  redts_y_requirements::select(
            'redts_y_requirements.id',
            'redts_y_requirements.subclass_id',
            'redts_l_sub_class.description as sub_class',
            'redts_y_requirements.title',
            'redts_y_requirements.slug',
            'redts_y_requirements.description',
            'redts_y_requirements.attachment_type',
            'redts_y_requirements.requirement_type',
        )->leftJoin('redts_l_sub_class', 'redts_l_sub_class.id', '=', 'redts_y_requirements.subclass_id')
            ->whereNull('redts_y_requirements.deleted_at')
            ->get();

        return datatables($sb)->toJson();
    }
    public function storeredtsSubClassReq(Request $request)
    {
        $subclass_id = $request->input('subclass_id');
        $title = $request->input('title');
        $slug = $request->input('slug');
        $description = $request->input('description');
        $attachment_type = $request->input('attachment_type');
        $requirement_type = $request->input('requirement_type');

        redts_y_requirements::create([
            'subclass_id' => $subclass_id,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'attachment_type' => $attachment_type,
            'requirement_type' => $requirement_type,
        ]);

        //record log
        $this->recordAction('requirement ' . $title . ' for subclass with id  ' . $subclass_id . ' has been added');

        return response()->json([
            'success' => true,
        ]);
    }
    public function updateredtsSubClassReq(Request $request)
    {
        $id = $request->input('id');
        $subclass_id = $request->input('subclass_id');
        $title = $request->input('title');
        $slug = $request->input('slug');
        $description = $request->input('description');
        $attachment_type = $request->input('attachment_type');
        $requirement_type = $request->input('requirement_type');

        $update = redts_y_requirements::where('id', $id)->update([
            'subclass_id' => $subclass_id,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'attachment_type' => $attachment_type,
            'requirement_type' => $requirement_type,
        ]);

        if ($update) {
            //record log
            $this->recordAction('Subclass requirement [' . $id . '] with slug ' . $slug . ' has been updated');

            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
    public function fetchredtsReqStats_by($subclass_id, $transaction_type)
    {
        $req = redts_y_requirements::where('subclass_id', $subclass_id)->whereNull('deleted_at');
        $get_req = array();
        if ($transaction_type == 1) { //if G2G only get required
            // $get_req = $req->where('requirement_type', 'required')->get(); //just get all and disabled restrictions in getting just required
            $get_req = $req->get();
        } else {
            // if ($transaction_type == 2 || $transaction_type == 3 || $transaction_type == 4) { //add restrictions for transaction types if not added it will not appear outside
            $get_req = $req->get();
            // }
        }

        return response()->json([
            'success' => true,
            'get_req' => $get_req,
        ]);
    }
    public function removeredtsSubClassReq(Request $request)
    {
        $id = $request->input('id');

        if (Auth::user()->admin_delete == 1) {
            $updated = redts_y_requirements::where('id', $id)->update([
                'deleted_at' => date('Y-m-d H:m:s'),
            ]);


            if ($updated) {
                //record log
                $this->recordAction('Subclass requirement with id ' . $id . ' has been removed');

                return response()->json([
                    'success' => true,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'server error',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'Admin delete is not enabled for this user',
            ]);
        }
    }
    #endregion sub-class requirements

    #region user
    public function fetchuserInfos()
    {
        $users = User::select(
            'redts_b_user.id',
            'redts_b_user.username',
            'redts_b_user.email',
            'redts_b_user.access_id',
            'redts_b_user.status',
            'redts_b_user.admin_delete',
            'redts_b_user.updated_at',

            // access types
            'access.type as access_type',

            // profile
            'profile.fname',
            'profile.mname',
            'profile.sname',
            'profile.suffix',
            'profile.image',

            //office
            'u_office.offices_id',
            'office.slug',
            'office.office',
            'office.full_office_name',
        )
            ->leftJoin('redts_d_profile as profile', 'profile.user_id', '=', 'redts_b_user.id')
            ->leftJoin('redts_a_accesss as access', 'access.id', '=', 'redts_b_user.access_id')
            ->leftJoin('redts_j_user_offices as u_office', 'u_office.user_id', '=', 'redts_b_user.id')
            ->leftJoin('redts_f_offices as office', 'office.id', '=', 'u_office.offices_id')
            ->whereNull('redts_b_user.deleted_at')->get();

        return dataTables($users)->toJson();
    }
    public function fetchusers()
    {
        if (Auth::check()) {
            $users = User::whereNull('deleted_at')->get(['id', 'username', 'email']);

            return response()->json([
                'success' => true,
                'users' => $users,
            ]);
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    public function fetchaccesstypes()
    {
        $access = redts_a_access::whereNull('deleted_at')->get(['id', 'type']);

        return response()->json([
            'success' => true,
            'access' => $access,
        ]);
    }
    public function fetchoffices()
    {
        if (Auth::check()) {
            $offices = redts_f_offices::whereNull('deleted_at')->get(['id', 'region_id', 'slug', 'office', 'full_office_name', 'office_type']);

            return response()->json([
                'success' => true,
                'offices' => $offices,
            ]);
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    public function storeUsers(Request $request)
    {
        $dt = $request->all();

        $collection_msg = array();
        $collection_arr = array();
        $collection_remove = array();

        if (isset($dt['collection'])) {
            foreach ($dt['collection'] as $key => $collection) {
                $collection = $dt['collection'][$key];
                $username = $dt['username'][$key];
                $email = $dt['email'][$key];
                $pass = $dt['pass'][$key];
                $repass = $dt['repass'][$key];
                $access_id = $dt['access_id'][$key];
                $office_id = $dt['office_id'][$key];
                $status = $dt['status'][$key];
                $admin_delete = $dt['admin_delete'][$key];
                $fname = $dt['fname'][$key];
                $mname = $dt['mname'][$key] ?? '';
                $sname = $dt['sname'][$key];
                $suffix = $dt['suffix'][$key] ?? '';

                //get access uuid
                $access_uuid = redts_a_access::where('id', $access_id)->whereNull('deleted_at')->first();
                if($access_uuid){
                    $access_uuid = $access_uuid->uuid;
                }else{
                    $access_uuid = '';
                }

                //get office uuid
                $office_uuid = redts_f_offices::where('id', $office_id)->whereNull('deleted_at')->first();
                if($office_uuid){
                    $office_uuid = $office_uuid->uuid;
                }else{
                    $office_uuid = '';
                }

                // check if all fields are field 
                if (
                    $username != '' &&
                    $email != '' &&
                    $pass != '' &&
                    $repass != '' &&
                    $access_uuid != '' &&
                    $office_uuid != '' &&
                    $status != '' &&
                    $admin_delete != '' &&
                    $fname != '' &&
                    $sname != ''
                ) {
                    if ($pass == $repass) {
                        array_push($collection_arr, [
                            'username' => $username,
                            'email' => $email,
                            'pass' => $pass,
                            'repass' => $repass,
                            'access_id' => $access_id,
                            'access_uuid' => $access_uuid,
                            'office_id' => $office_id,
                            'office_uuid' => $office_uuid,
                            'status' => $status,
                            'admin_delete' => $admin_delete,
                            'fname' => $fname,
                            'mname' => $mname,
                            'sname' => $sname,
                            'suffix' => $suffix,
                            'office_id' => $office_id,
                        ]);

                        if (User::where('username', $username)->whereNull('deleted_at')->exists()) {
                            array_push($collection_msg, [
                                'msg' => 'Username already exists',
                                'status' => 'error',
                            ]);
                        } else {
                            if (User::where('email', $email)->whereNull('deleted_at')->exists()) {
                                array_push($collection_msg, [
                                    'msg' => 'Email already exists',
                                    'status' => 'error',
                                ]);
                            } else {
                                #region data insert here
                                $user = User::create([                                
                                    'uuid' => $this->generateUuid(), //new uuid
                                    'username' => $username,
                                    'password' => bcrypt($pass),
                                    'email' => $email,
                                    'access_id' => $access_id,
                                    'access_uuid' => $access_uuid,
                                    'status' => $status,
                                    'remember_token' => 0,
                                    'admin_delete' => $admin_delete,
                                ]);
                                #endregion data insert here

                                #region input other 
                                if ($user) {
                                    $profile = redts_d_profile::create([
                                        'user_id' => $user->id,
                                        'user_uuid' => $user->uuid,
                                        'fname' => $fname,
                                        'mname' => $mname,
                                        'sname' => $sname,
                                        'suffix' => $suffix,
                                        'image' => '',
                                    ]);

                                    $user_office = redts_j_user_offices::create([
                                        'user_id' => $user->id,
                                        'user_uuid' => $user->uuid,
                                        'offices_id' => $office_id,
                                        'offices_uuid' => $office_uuid,
                                    ]);

                                    array_push($collection_msg, [
                                        'profile' => $profile,
                                        'user_office' => $user_office,
                                        'msg' => '' . $collection . ' has been saved',
                                        'status' => 'success',
                                    ]);
                                    // array_push($collection_remove, [
                                    //     'collection_id' => $collection,
                                    // ]);

                                    //record log
                                    $this->recordAction('user with username ' . $username . ' has been added');
                                }
                                #endregion input other 
                            }
                        }
                    } else {
                        array_push($collection_msg, [
                            'msg' => 'Password in ' . $collection . ' does not match',
                            'status' => 'error',
                        ]);
                    }
                } else {
                    array_push($collection_msg, [
                        'msg' => 'Empty field in ' . $collection,
                        'status' => 'error',
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'collection' => $collection_arr,
            'collection_msg' => $collection_msg,
            'collection_remove' => $collection_remove,
        ]);
    }
    public function updateUsers(Request $request)
    {
        $dt = $request->all();

        $collection_msg = array();
        $collection_arr = array();
        $collection_remove = array();

        if (isset($dt['collection'])) {
            foreach ($dt['collection'] as $key => $collection) {
                $collection = $dt['collection'][$key];
                $id = $dt['id'][$key];
                $username = $dt['username'][$key];
                $email = $dt['email'][$key];
                $access_id = $dt['access_id'][$key];
                $office_id = $dt['office_id'][$key];
                $status = $dt['status'][$key];
                $admin_delete = $dt['admin_delete'][$key];
                $fname = $dt['fname'][$key];
                $mname = $dt['mname'][$key] ?? '';
                $sname = $dt['sname'][$key];
                $suffix = $dt['suffix'][$key] ?? '';
                $password = $dt['password'][$key];

                // check if all fields are field 
                if (
                    $username != '' &&
                    $email != '' &&
                    $access_id != '' &&
                    $office_id != '' &&
                    $status != '' &&
                    $admin_delete != '' &&
                    $fname != '' &&
                    $sname != ''
                ) {
                    if ($mname == '' || $mname == null) {
                        $mname = ' ';
                    }

                    array_push($collection_arr, [
                        'username' => $username,
                        'email' => $email,
                        'access_id' => $access_id,
                        'office_id' => $office_id,
                        'password' => $password,
                        'status' => $status,
                        'admin_delete' => $admin_delete,
                        'fname' => $fname,
                        'mname' => $mname,
                        'sname' => $sname,
                        'suffix' => $suffix,
                        'office_id' => $office_id,
                    ]);

                    #region data insert here
                    $user = User::where('id', $id)->update([
                        'username' => $username,
                        // 'password' => bcrypt($pass),
                        'email' => $email,
                        'access_id' => $access_id,
                        'status' => $status,
                        'remember_token' => 0,
                        'admin_delete' => $admin_delete,
                    ]);
                    #endregion data insert here

                    #region input other 
                    if ($user) {

                        //record log
                        $this->recordAction('user with username ' . $username . ' has been updated');

                        redts_d_profile::where('user_id', $id)->update([
                            'fname' => $fname,
                            'mname' => $mname,
                            'sname' => $sname,
                            'suffix' => $suffix,
                        ]);

                        redts_j_user_offices::where('user_id', $id)->update([
                            'offices_id' => $office_id,
                        ]);

                        array_push($collection_msg, [
                            'msg' => '' . $collection . ' has been saved',
                            'status' => 'success',
                        ]);
                        array_push($collection_remove, [
                            'collection_id' => $collection,
                        ]);

                        //reset password
                        if ($password == 1) {
                            $user = User::where('id', $id)->update([
                                'password' => bcrypt('rfsoats123'),
                            ]);
                            array_push($collection_msg, [
                                'msg' => '' . $collection . ' password reset successful',
                                'status' => 'success',
                            ]);
                        }
                    }
                    #endregion input other 

                } else {
                    array_push($collection_msg, [
                        'msg' => 'Empty field in ' . $collection,
                        'status' => 'error',
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'collection' => $collection_arr,
            'collection_msg' => $collection_msg,
            'collection_remove' => $collection_remove,
        ]);
    }
    public function removeuser(Request $request)
    {
        $id = $request->input('id');

        if (Auth::user()->admin_delete == 1) {
            $update = User::where('id', $id)->whereNull('deleted_at')->update([
                'deleted_at' => date('Y-m-d H:m:s'),
            ]);

            if ($update) {
                //record log
                $this->recordAction('User with id ' . $id . ' has been removed');

                return response()->json([
                    'success' => true,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'Admin delete is not enabled for this user',
            ]);
        }
    }
    #endregion user

    #region office
    public function fetchofficeInfo()
    {
        $offices = redts_f_offices::select(
            'redts_f_offices.id',
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

            // region info
            'region.region',
            'region.slug as region_slug',
        )
            ->leftJoin('redts_e_region as region', 'region.id', '=', 'redts_f_offices.region_id')
            ->whereNull('redts_f_offices.deleted_at')->get();

        foreach ($offices as $key => $office) {
            $office_users = redts_j_user_offices::where('offices_id', $office->id)->whereNull('deleted_at')->get();
            $office->office_users = $office_users;
            $office->office_users_count = count($office_users);
        }

        return dataTables($offices)->toJson();
    }
    public function fetchregions()
    {
        $region = redts_e_region::whereNull('deleted_at')->get();

        return response()->json([
            'success' => true,
            'region' => $region,
        ]);
    }
    public function storeOffices(Request $request)
    {
        $dt = $request->all();

        $collection_msg = array();
        $collection_arr = array();
        $collection_remove = array();

        if (isset($dt['collection'])) {
            foreach ($dt['collection'] as $key => $collection) {
                $collection = $dt['collection'][$key];
                $region = $dt['region'][$key];
                $office_type = $dt['office_type'][$key];
                $full_office_name = $dt['full_office_name'][$key];
                $office = $dt['office'][$key];
                $slug = $dt['slug'][$key];

                // check if all fields are field 
                if (
                    $region != '' &&
                    $office_type != '' &&
                    $full_office_name != '' &&
                    $office != '' &&
                    $slug != ''
                ) {
                    array_push($collection_arr, [
                        'region' => $region,
                        'office_type' => $office_type,
                        'full_office_name' => $full_office_name,
                        'office' => $office,
                        'slug' => $slug,
                    ]);

                    #region data insert here
                    $add = redts_f_offices::create([
                        'region_id' => $region,
                        'office_type' => $office_type,
                        'full_office_name' => $full_office_name,
                        'office' => $office,
                        'slug' => $slug,
                    ]);
                    #endregion data insert here

                    if ($add) {
                        //record log
                        $this->recordAction('office ' . $office . ' has been added');

                        array_push($collection_msg, [
                            'msg' => '' . $full_office_name . ' has been saved',
                            'status' => 'success',
                        ]);
                        array_push($collection_remove, [
                            'collection_id' => $collection,
                        ]);
                    }
                } else {
                    array_push($collection_msg, [
                        'msg' => 'Empty field in ' . $collection,
                        'status' => 'error',
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'collection' => $collection_arr,
            'collection_msg' => $collection_msg,
            'collection_remove' => $collection_remove,
        ]);
    }
    public function updateOffices(Request $request)
    {
        $dt = $request->all();

        $collection_msg = array();
        $collection_arr = array();
        $collection_remove = array();

        if (isset($dt['collection'])) {
            foreach ($dt['collection'] as $key => $collection) {
                $collection = $dt['collection'][$key];
                $id = $dt['id'][$key];
                $region = $dt['region'][$key];
                $office_type = $dt['office_type'][$key];
                $full_office_name = $dt['full_office_name'][$key];
                $office = $dt['office'][$key];
                $slug = $dt['slug'][$key];

                // check if all fields are field 
                if (
                    $region != '' &&
                    $office_type != '' &&
                    $full_office_name != '' &&
                    $office != '' &&
                    $slug != ''
                ) {
                    array_push($collection_arr, [
                        'region' => $region,
                        'office_type' => $office_type,
                        'full_office_name' => $full_office_name,
                        'office' => $office,
                        'slug' => $slug,
                    ]);

                    #region data insert here
                    $add = redts_f_offices::where('id', $id)->update([
                        'region_id' => $region,
                        'office_type' => $office_type,
                        'full_office_name' => $full_office_name,
                        'office' => $office,
                        'slug' => $slug,
                    ]);
                    #endregion data insert here

                    if ($add) {
                        //record log
                        $this->recordAction('Office [' . $full_office_name . '] has been updated');

                        array_push($collection_msg, [
                            'msg' => '' . $full_office_name . ' has been saved',
                            'status' => 'success',
                        ]);
                        array_push($collection_remove, [
                            'collection_id' => $collection,
                        ]);
                    }
                } else {
                    array_push($collection_msg, [
                        'msg' => 'Empty field in ' . $collection,
                        'status' => 'error',
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'collection' => $collection_arr,
            'collection_msg' => $collection_msg,
            'collection_remove' => $collection_remove,
        ]);
    }
    public function removeredtsOffice(Request $request)
    {
        $id = $request->input('id');

        if (Auth::user()->admin_delete == 1) {
            if (redts_j_user_offices::where('offices_id', $id)->exists()) {
                return response()->json([
                    'success' => false,
                    'msg' => 'Office contains users, please remove users before removing the office',
                ]);
            } else {
                $update = redts_f_offices::where('id', $id)->whereNull('deleted_at')->update([
                    'deleted_at' => date('Y-m-d H:m:s'),
                ]);

                if ($update) {
                    //record log
                    $this->recordAction('Office with id ' . $id . ' has been removed');

                    return response()->json([
                        'success' => true,
                        'msg' => '',
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'msg' => '',
                    ]);
                }
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'Admin delete is not enabled for this user',
            ]);
        }
    }
    #endregion office

    #region carousel imgs
    public function fetchredtsCarouselImgs()
    {
        $data = redts_g_carousel_img::whereNull('deleted_at')->get();

        return dataTables($data)->toJson();
    }
    public function storecarouselImg(Request $request)
    {
        $attachmentsMsg = array();

        #region retrieve document here
        $upload_limit = redts_w_upload_size_limit::where('id', 1)->first();
        $upload_path = "assets\img\carousel\\";
        #endregion retrieve document here

        $file = $request->file('addCrslImgs_file');
        if ($file->isValid()) {

            // $extension = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName() /* . '.' . $extension */;
            $size = $file->getSize();

            if ($size <= $upload_limit->size) {
                // You can move the uploaded file to a specific directory if needed
                $file->move(public_path($upload_path), $fileName);
                $file_path = $upload_path . '\\' . $fileName;

                redts_g_carousel_img::create([
                    'file_path' => $upload_path,
                    'file_name' => $fileName,
                ]);

                //record log
                $this->recordAction('carousel image [' . $fileName . '] has been uploaded');

                // message
                array_push($attachmentsMsg, ['msg' => 'uploaded: ' . $file_path]);
            } else {
                array_push($attachmentsMsg, ['msg' => 'denied: - file size exceeded ']);
            }

            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'file not valid',
            ]);
        }
    }
    public function removeredtsgcarouselimgs(Request $request)
    {
        $id = $request->input('id');

        if (Auth::user()->admin_delete == 1) {
            $update = redts_g_carousel_img::where('id', $id)->whereNull('deleted_at')->update([
                'deleted_at' => date('Y-m-d H:m:s'),
            ]);

            if ($update) {
                //record log
                $this->recordAction('Carousel with id ' . $id . ' has been removed');

                return response()->json([
                    'success' => true,
                    'msg' => '',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'msg' => '',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'Admin delete is not enabled for this user',
            ]);
        }
    }
    #endregion carousel imgs

    #region generate qr
    public function indexadmindashgenqr()
    {
        // if (Auth::check() && Auth::user()->access_id == 1) {
        if (Auth::check()) { /* Allow access to normal users */
            return view('admin-dashboard-generate-qr');
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    public function fetchgenqr(Request $request)
    {
        // if (Auth::check() && Auth::user()->access_id == 1) {
        if (Auth::check()) { /* Allow access to normal users */
            $genQRcontent = $request->input('genQRcontent');

            //record log
            $this->recordAction('Qr has been generated with content: ' . $genQRcontent);

            return view(('admin-dash-qr-generated'), [
                'genQRcontent' => $genQRcontent
            ]);
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    #endregion generate qr

    #region logs
    public function indexadmindashlogs()
    {
        if (Auth::check() && Auth::user()->access_id == 1) {
            return view('admin-dashboard-logs');
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    public function indexadmindashviewlogfile()
    {
        if (Auth::check() && Auth::user()->access_id == 1) {
            return view('admin-dashboard-view-log-file');
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    #endregion logs

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

    #region general setting
    public function indexadmindashgenset()
    {
        if (Auth::check() && Auth::user()->access_id == 1) {
            return view('admin-dash-gen-settings');
        } else {
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    public function fetchuploadsize()
    {
        //get upload size
        $upload_limit = redts_w_upload_size_limit::where('id', 1)->first(['size']);

        return response()->json([
            'success' => true,
            'upload' => $upload_limit->size,
        ]);
    }
    public function updateuploadsizelimit(Request $request)
    {
        $inputUploadSize = $request->input('inputUploadSize');

        if ($inputUploadSize == null || $inputUploadSize <= 100000) {
            return response()->json(['success' => false]);
        } else {
            //get upload size
            $upload_size = redts_w_upload_size_limit::where('id', 1)->update([
                'size' => $inputUploadSize,
            ]);

            if ($upload_size) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }
    #endregion general setting

    #region user designation to office viewer
    public function fetchuserDesigOffice()
    {
        //fetch all user with designation office by id
        $UserDesigOffice = redts_ba_view_reqs_spec::select(
            'redts_ba_view_reqs_specs.id',
            'redts_ba_view_reqs_specs.user_id',
            'redts_ba_view_reqs_specs.office_id',
            'redts_ba_view_reqs_specs.deleted_at',

            //user info
            'user.username',

            //office 
            'office.slug',
            'office.office',
            'office.full_office_name',
        )
            ->leftJoin('redts_b_user as user', 'redts_ba_view_reqs_specs.user_id', '=', 'user.id')
            ->leftJoin('redts_f_offices as office', 'redts_ba_view_reqs_specs.office_id', '=', 'office.id')
            ->whereNull('redts_ba_view_reqs_specs.deleted_at')
            ->get();

        return dataTables($UserDesigOffice)->toJson();
    }
    public function storeUpdateUserDesig(Request $request)
    {
        $dt = $request->all();
        $collection_arr = array();
        $collection_msg = array();

        if (isset($dt['userId'])) {
            foreach ($dt['userId'] as $key => $userId) {
                $officeId = $dt['officeId'][$key];

                //check if collection is not empty
                if (
                    $userId != '' &&
                    $officeId != ''
                ) {
                    //check if designation already exist
                    if (redts_ba_view_reqs_spec::where('user_id', $userId)->whereNull('deleted_at')->exists()) {
                        //update designation
                        redts_ba_view_reqs_spec::where('user_id', $userId)->whereNull('deleted_at')->update([
                            'office_id' => $officeId,
                        ]);
                        array_push($collection_msg, [
                            'msg' => 'Data has been updated: 🙍‍♂️' . $userId . ' ➤ 🏢' . $officeId,
                            'status' => 'success',
                        ]);


                        //record log
                        $this->recordAction('Office designation has been updated: 🙍‍♂️' . $userId . ' ➤ 🏢' . $officeId);
                    } else {
                        //create new designation
                        redts_ba_view_reqs_spec::create([
                            'user_id' => $userId,
                            'office_id' => $officeId,
                        ]);
                        array_push($collection_msg, [
                            'msg' => 'Data has been added: 🙍‍♂️' . $userId . ' ➤ 🏢' . $officeId,
                            'status' => 'success',
                        ]);

                        //record log
                        $this->recordAction('Office designation has been added: 🙍‍♂️' . $userId . ' ➤ 🏢' . $officeId);
                    }
                }
            }
        } else {
            array_push($collection_msg, [
                'msg' => 'Empty field',
                'status' => 'error',
            ]);
        }

        return response()->json([
            'success' => true,
            'collection' => $collection_arr,
            'collection_msg' => $collection_msg,
        ]);
    }
    #endregion user designation to office viewer

    #region get ip
    public function fetchExternalIp()
    {
        try {
            $response = Http::get('https://api.myip.comxxx');
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
            'page403' => $page403,
            'usernameQuestioned' => $usernameQuestioned,
        ];
    }
    #endregion page response

    #region generate uuid
    public function generateUuid() //universal unique ID generator
    {
        $generated_uuid = (string) Str::uuid();
        return $generated_uuid;
    }
    #endregion generate uuid
}
