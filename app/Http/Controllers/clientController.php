<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\redts_n_action;
use App\Models\redts_f_offices;
use App\Models\redts_l_sub_class;
use App\Models\redts_lc_rstct_sbmsn_of_req;
use App\Models\redts_zb_agencies;
use App\Models\redts_zc_client_info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\redts_z_applicant_type;
use App\Models\redts_zi_origin_office;
use App\Models\redts_ee_classification;
use App\Models\redts_zd_client_doc_info;
use App\Models\redts_w_upload_size_limit;
use App\Models\redts_za_transaction_type;
use App\Models\redts_zf_order_of_payment;
use App\Models\redts_na_action_attachments;
use App\Models\redts_ze_client_doc_attachments;

class clientController extends Controller
{
    #region create client request module
    public function indexclientdashboard()
    {
        return view('client-dashboard');
    }

    public function indexclientdashboardhome()
    {
        return view('client-dashboard-home-carousel');
    }

    public function indexclientdashboardkiosk()
    {
        return view('client-dashboard-home-original');
    }

    public function storeclientInfo(Request $request)
    {
        $fname = $request->input('fname');
        $mname = $request->input('mname') ?? '';
        $sname = $request->input('sname');
        $suffix = $request->input('suffix') ?? '';
        $email = $request->input('email');
        $sex = $request->input('sex');
        $contact_no = $request->input('contact_no');
        $address = $request->input('address');

        // create random token
        $access_token = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5) . substr(str_shuffle('123456789'), 0, 3);
        // encrypt
        $shiftAmount = 15;  // You can choose any positive integer as the shift amount
        $encryptedaccess_token = $this->cc_encrypt($access_token, $shiftAmount);
        $decryptedaccess_token = $this->cc_decrypt($encryptedaccess_token, $shiftAmount);

        if (redts_zc_client_info::where('email', $email)->whereNull('deleted_at')->exists()) {
            return response()->json([
                'success' => false,
            ]);
        } else {
            redts_zc_client_info::create([
                'fname' => $fname,
                'mname' => $mname,
                'sname' => $sname,
                'suffix' => $suffix,
                'email' => $email,
                'sex' => $sex,
                'contact_no' => $contact_no,
                'address' => $address,
                'access_token' => $encryptedaccess_token,
            ]);

            return response()->json([
                'success' => true,
                'access_token' => $decryptedaccess_token,
            ]);
        }
    }

    #region encryption and decryption using ceasar cipher
    // Function to encrypt text using a Caesar cipher
    function cc_encrypt($text, $shift)
    {
        $result = '';
        $textLength = strlen($text);

        for ($i = 0; $i < $textLength; $i++) {
            $char = $text[$i];

            if (ctype_alpha($char)) {
                $ascii = ord($char);

                if (ctype_upper($char)) {
                    $encryptedAscii = (($ascii - 65 + $shift) % 26) + 65;
                } else {
                    $encryptedAscii = (($ascii - 97 + $shift) % 26) + 97;
                }

                $result .= chr($encryptedAscii);
            } else {
                $result .= $char;  // Keep non-alphabet characters unchanged
            }
        }

        return $result;
    }

    // Function to decrypt text encrypted with the same Caesar cipher
    function cc_decrypt($encryptedText, $shift)
    {
        return $this->cc_encrypt($encryptedText, 26 - $shift);  // Decrypting is shifting in the opposite direction
    }
    #endregion encryption and decryption using ceasar cipher


    public function verifytokenemail(Request $request)
    {
        $fname = $request->input('fname');
        $email = $request->input('email');
        $access_token = $request->input('access_token');

        // decrypt
        $shiftAmount = 15;  // You can choose any positive integer as the shift amount
        $encryptedaccess_token = $this->cc_encrypt($access_token, $shiftAmount);

        $ci = redts_zc_client_info::where('fname', $fname)->where('email', $email)->where('access_token', $encryptedaccess_token)->whereNull('deleted_at');
        if ($ci->exists()) {
            $get_ci = $ci->first();

            // region update token email verified
            if ($get_ci->email_verify == 0) {
                $ci->update([
                    'email_verify' => 1,
                ]);
            }
            // endregion update token email verified

            #region get client info
            $id = $get_ci->id;
            // $fname = $get_ci->fname;
            $mname = $get_ci->mname;
            $sname = $get_ci->sname;
            $suffix = $get_ci->suffix;
            // $email = $get_ci->email;
            $sex = $get_ci->sex;
            $contact_no = $get_ci->contact_no;
            $address = $get_ci->address;
            $valid_id_front = $get_ci->valid_id_front;
            $valid_id_back = $get_ci->valid_id_back;
            #endregion get client info

            $no_id_upload = false;
            if ($valid_id_front == null && $valid_id_back == null) {
                $no_id_upload = true;
            }

            return response()->json([
                'success' => true,
                'id' => $id,
                'fname' => $fname,
                'mname' => $mname,
                'sname' => $sname,
                'suffix' => $suffix,
                'email' => $email,
                'sex' => $sex,
                'contact_no' => $contact_no,
                'address' => $address,
                'no_id_upload' => $no_id_upload,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function updateclientInfo(Request $request)
    {
        $id = $request->input('id');
        $fname = $request->input('fname');
        $mname = $request->input('mname') ?? '';
        $sname = $request->input('sname');
        $suffix = $request->input('suffix') ?? '';
        $sex = $request->input('sex');
        $contact_no = $request->input('contact_no');
        $address = $request->input('address');

        $ci = redts_zc_client_info::where('id', $id)->whereNull('deleted_at');
        $updated = $ci->update([
            'fname' => $fname,
            'mname' => $mname,
            'sname' => $sname,
            'suffix' => $suffix,
            'sex' => $sex,
            'contact_no' => $contact_no,
            'address' => $address,
        ]);

        #region update documents
        // retrieve document here
        $upload_limit = redts_w_upload_size_limit::where('id', 1)->first();
        $upload_path = "assets/img/client_files/";

        // for front
        $valid_id_front_fileUpMsg = "successful";
        $valid_id_front_filePath = null;
        if ($request->hasFile('valid_id_front')) {
            $file = $request->file('valid_id_front');
            // $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = 'client_' . $id . '' . date('YmdHms') . '_front.' . $extension;
            $size = $file->getSize();

            if ($size <= $upload_limit->size) {

                // Load and encrypt the image using Laravel's encryption
                $valid_id_front_filePath = $upload_path . '' . $fileName;
                $encrypt_path = public_path($valid_id_front_filePath);
                $encryptedImage = Crypt::encryptString(file_get_contents($file));
                file_put_contents($encrypt_path, $encryptedImage);

                #region update upload paths of file
                $ci->update([
                    'valid_id_front' => $valid_id_front_filePath,
                ]);
                #endregion update upload paths of file
            } else {
                $valid_id_front_fileUpMsg = "file size error";
            }
        } else {
            $valid_id_front_fileUpMsg = "no file uploaded";
        }

        // for back
        $valid_id_back_fileUpMsg = "successful";
        $valid_id_back_filePath = null;
        if ($request->hasFile('valid_id_back')) {
            $file = $request->file('valid_id_back');
            // $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = 'client_' . $id . '' . date('YmdHms') . '_back.' . $extension;
            $size = $file->getSize();

            if ($size <= $upload_limit->size) {

                // Load and encrypt the image using Laravel's encryption
                $valid_id_back_filePath = $upload_path . '' . $fileName;
                $encrypt_path = public_path($valid_id_back_filePath);
                $encryptedImage = Crypt::encryptString(file_get_contents($file));
                file_put_contents($encrypt_path, $encryptedImage);

                #region update upload paths of file
                $ci->update([
                    'valid_id_back' => $valid_id_back_filePath,
                ]);
                #endregion update upload paths of file
            } else {
                $valid_id_back_fileUpMsg = "file size error";
            }
        } else {
            $valid_id_back_fileUpMsg = "no file uploaded";
        }
        #endregion update documents

        #region response
        if ($updated) {
            return response()->json([
                'success' => true,
                'valid_id_front_fileUpMsg' => $valid_id_front_fileUpMsg,
                'valid_id_back_fileUpMsg' => $valid_id_back_fileUpMsg,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
        #endregion response
    }

    public function fetchdocInfoSelectTags()
    {
        // get application type 
        /* 
            NOT NEEDED HERE 
        */
        // $applicant_type = redts_z_applicant_type::select(
        //     'redts_z_applicant_types.id',
        //     'redts_z_applicant_types.transaction_id',
        //     'redts_za_transaction_types.transaction',
        //     'redts_za_transaction_types.slug',
        //     'redts_z_applicant_types.applicant',
        //     'redts_z_applicant_types.deleted_at'
        // )
        //     ->leftJoin('redts_za_transaction_types', 'redts_za_transaction_types.id', 'redts_z_applicant_types.transaction_id')
        //     ->whereNull('redts_z_applicant_types.deleted_at')->get();

        // get transaction type
        // $transaction_type = redts_za_transaction_type::whereNull('deleted_at')->get();

        // get agency
        // $agencies = redts_zb_agencies::whereNull('deleted_at')->get();
        
        // get application sub-class
        // $sub_class = redts_l_sub_class::whereNull('deleted_at')->get();

        // get application classification
        $classification = redts_ee_classification::whereNull('deleted_at')->get();

        return response()->json([
            'success' => true,
            'classification' => $classification,
        ]);
    }

    // ORIGINCAL storeclientRequest
    public function storeclientRequest(Request $request)
    {

        #reggion client and document info
        $client_id = $request->input('id');
        $client_ = redts_zc_client_info::where('id', $client_id)->first();
        $data_privacy_consent = $request->input('data_privacy_consent') ?? 0;
        $office_id = $request->input('office_id');
        $application_type_id = $request->input('application_type_id');
        $transaction_type_id = $request->input('transaction_type_id');
        $agency = $request->input('agency');
        $class_id = $request->input('class_id');
        $class_ = redts_ee_classification::where('id', $class_id)->first();
        $subclass_id = $request->input('subclass_id');
        $subclass_ = redts_l_sub_class::where('id', $subclass_id)->first();
        #endreggion client and document info

        if ($client_->valid_id_front != null) {
            #region store doc info
            $doc = redts_zd_client_doc_info::create([
                'doc_no' => 'unset',
                'application_type_id' => $application_type_id,
                'transaction_type_id' => $transaction_type_id,
                'agency' => $agency,
                'client_id' => $client_id,
                'class_id' => $class_id,
                'class_slug' => $class_->slug,
                'subclass_id' => $subclass_id,
                'subclass_slug' => $subclass_->slug,
                'remarks' => null,
                'validated' => null,
            ]);
            #endregion store doc info

            #region store origin office of the created request
            redts_zi_origin_office::create([
                'doc_id' => $doc->id,
                'origin_office_id' => $office_id,
            ]);
            #endregion store origin office of the created request

            #region store action
            redts_n_action::create([
                'doc_id' => $doc->id,
                'sender_client_id' => $client_id,
                'sender_user_id' => null,
                'sender_type' => 'Client',
                'referred_by_office' => $office_id,
                'action_taken' => null,
                'send_to_office' => $office_id,
                'received_id' => null,
                'received' => null, //date time
                'subject' => 'Request for ' . $subclass_->description,
                'action_remarks' => null,
                'attachment_remarks' => null,
            ]);
            #endregion store action

            #region update data_privacy_consent
            redts_zc_client_info::where('id', $client_id)->update([
                'data_privacy_consent' => $data_privacy_consent,
            ]);
            #endregion update data_privacy_consent

            #region get office full name
            $office_receiving_req = redts_f_offices::select('slug', 'full_office_name')->where('id', $office_id)->first();
            #endregion get office full name

            return response()->json([
                'success' => true,
                'new_id' => $doc->id,
                'client_email' => $client_->email,
                'client_fname' => $client_->fname,
                'request_type' => $subclass_->description,
                'office_receiving_req' => $office_receiving_req->full_office_name,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'new_id' => null,
                'no_id' => true,
            ]);
        }
    }

    public function storeclientDocFiles(Request $request)
    {
        $doc_info_id = $request->input('new_id');

        #region retrieve document here
        $upload_limit = redts_w_upload_size_limit::where('id', 1)->first();
        $upload_path = "public/assets/doc/doc_req_files";
        #endregion retrieve document here

        #region uploading of documents
        $dt = $request->all();
        $attachmentsMsg = array();
        $count_files = 0;
        $success = true;

        if ($request->file('req_attachement_file') != null) {
            #region get all files to be uploaded
            foreach ($request->file('req_attachement_file') as $key => $file) {
                $count_files += 1;
                $file_path = null;
                $req_id = $dt['req_id'][$key];
                $req_app_form = $dt['req_app_form'][$key];
                $req_slug = $dt['req_slug'][$key];
                $req_title = $dt['req_title'][$key];
                $req_attachment_type = $dt['req_attachment_type'][$key];

                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = 'cli' . $doc_info_id . '-' .  $req_title . '-' . $req_id . '-' . $req_app_form . '-' . $key . '-' . date('YmdHi') . '.' . $extension;
                    $size = $file->getSize();

                    if ($size <= $upload_limit->size) {

                        // get stop sending error if uploaded
                        try {
                            // You can move the uploaded file to a specific directory if needed
                            $file->move(storage_path($upload_path), $fileName);
                            $file_path = 'doc_req_files/' . $fileName;

                            $newAttachment = redts_ze_client_doc_attachments::create([
                                'doc_info_id' => $doc_info_id,
                                'req_id' => $req_id,
                                'app_form_no' => $req_app_form,
                                'req_slug' => $req_slug,
                                'file_path' => 'doc_req_files',
                                'file_name' => $fileName,
                                'file_link' => 'n/a',
                                'text_input' => 'n/a',
                                'attachment_type' => 'file',
                            ]);

                            if ($newAttachment) {
                                // message
                                array_push($attachmentsMsg, ['msg' => 'uploaded: ' . $file_path]);
                            } else {
                                $success = false;
                            }
                        } catch (\Exception $e) {
                            // Handle the exception
                            $success = false;
                        }
                    } else {
                        array_push($attachmentsMsg, ['msg' => 'denied: - file size exceeded ' . $file_path]);
                    }
                }
            }
            #endregion get all files to be uploaded

        } else {
            array_push($attachmentsMsg, ['msg' => 'no inputs has been uploaded']);
        }
        #endregion uploading of documents

        #region get normal texts inputs
        if ($request->input('req_input_text') != null) {
            if($success == true){
                foreach ($request->input('req_input_text') as $key => $input) {
                    $count_files += 1;
                    $req_id = $dt['req_input_id'][$key];
                    $req_input_app_form = $dt['req_input_app_form'][$key];
                    $req_slug = $dt['req_input_slug'][$key];
                    $req_title = $dt['req_input_title'][$key];
                    $req_attachment_type = $dt['req_input_attachment_type'][$key];
    
                    array_push($attachmentsMsg, ['msg' => 'text input: ' . $input]);
    
                    redts_ze_client_doc_attachments::create([
                        'doc_info_id' => $doc_info_id,
                        'req_id' => $req_id,
                        'app_form_no' => $req_input_app_form,
                        'req_slug' => $req_slug,
                        'file_path' => 'n/a',
                        'file_name' => 'n/a',
                        'file_link' => 'n/a',
                        'text_input' => $input,
                        'attachment_type' => 'text',
                    ]);
                }
            }
        }
        #endregion get normal texts inputs

        return response()->json([
            'success' => $success,
            'attachmentsMsg' => $attachmentsMsg,
        ]);
    }

    public function fetchclientReceivingOffice()
    {
        return response()->json([
            'success' => true,
            'offices' => redts_f_offices::whereNull('deleted_at')->where('office_type', 'Receiving')->get(),
        ]);
    }

    public function indexclientdashboardprocesstutorial()
    {
        return view('client-dashboard-process-tutorial');
    }
    #endregion create client request module

    #region document tracking
    public function indexdashboarddoctracking()
    {
        return view('client-dashboard-doc-tracking');
    }
    public function indexgeneraldashdoctracking()
    {
        if (Auth::check()) {
            return view('general-dash-doc-tracking');
        } else {
            // alert message html message sample
            return $this->pageResponse()['usernameQuestioned'];
        }
    }
    public function fetchtrackDoc($doc_no)
    {
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

        $doc_stats = null;
        $order_of_payment = null;
        if ($doc_info != null) {
            // initialise doc_id
            $doc_id = $doc_info->id;

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
                'redts_n_actions.subject',
                'redts_n_actions.in_transit_remarks',
                'redts_n_actions.action_remarks',
                'redts_n_actions.attachment_remarks',
                'redts_n_actions.deleted_at',
                'redts_n_actions.created_at',

                #region document info
                'doc_info.validated',
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
                ->where('redts_n_actions.doc_id', $doc_id)
                ->whereNull('redts_n_actions.deleted_at')
                ->get();
        }

        return response()->json([
            'success' => true,
            'doc_info' => $doc_info,
            'doc_stats' => $doc_stats,
        ]);
    }
    public function fetchpublisheddoc($doc_no)
    {
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

        $doc_stats = null;
        $action_docs = null;
        $order_of_payment = null;
        if ($doc_info != null) {
            // initialise doc_id
            $doc_id = $doc_info->id;

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
                'redts_n_actions.subject',
                'redts_n_actions.in_transit_remarks',
                'redts_n_actions.action_remarks',
                'redts_n_actions.attachment_remarks',
                'redts_n_actions.deleted_at',
                'redts_n_actions.created_at',


                #region send to office
                'send_to.office as send_to_abbrv',
                'send_to.full_office_name as send_to_full_office_name',
                #endregion send to office
            )
                ->leftJoin('redts_zd_client_doc_infos as doc_info', 'doc_info.id', '=', 'redts_n_actions.doc_id')
                ->leftJoin('redts_z_applicant_types as app_type', 'app_type.id', '=', 'doc_info.application_type_id')
                ->leftJoin('redts_b_user as sender_user', 'sender_user.id', '=', 'redts_n_actions.sender_user_id')
                ->leftJoin('redts_f_offices as referred_by', 'referred_by.id', '=', 'redts_n_actions.referred_by_office')
                ->leftJoin('redts_f_offices as send_to', 'send_to.id', '=', 'redts_n_actions.send_to_office')
                ->leftJoin('redts_d_profile as received_by', 'received_by.id', '=', 'redts_n_actions.received_id')
                ->where('redts_n_actions.doc_id', $doc_id)
                ->whereNull('redts_n_actions.deleted_at')
                ->get();

            //get action documents
            $action_docs = redts_zd_client_doc_info::select(
                'act_attch.id',

                'redts_zd_client_doc_infos.id as doc_id',
                'redts_zd_client_doc_infos.doc_no',

                'actions.id as action_id',

                'act_attch.remarks',
                'act_attch.file_path',
                'act_attch.file_name',
                'act_attch.file_link',
                'act_attch.deleted_at',
            )
                ->leftJoin('redts_n_actions as actions', 'actions.doc_id', '=', 'redts_zd_client_doc_infos.id')
                ->leftJoin('redts_na_action_attachments as act_attch', 'act_attch.action_id', '=', 'actions.id')
                ->where('redts_zd_client_doc_infos.doc_no', $doc_no)
                ->where('act_attch.public', 1) // only display publiced documents
                ->whereNotNull('act_attch.id')
                ->whereNull('redts_zd_client_doc_infos.deleted_at')
                ->get();

            $order_of_payment = redts_zf_order_of_payment::select('order_of_payment as uploaded_oop', 'purpose')->where('doc_id', $doc_id)->whereNull('deleted_at')->first();
        }

        return response()->json([
            'success' => true,
            'doc_info' => $doc_info,
            'doc_stats' => $doc_stats,
            'action_docs' => $action_docs,
            'order_of_payment' => $order_of_payment,
        ]);
    }
    #endregion document tracking

    #region img to pdf converter
    public function indexclientdashboardimgtopdf()
    {
        return view("client-dashboard-img-to-pdf");
    }
    public function genimgtopdf(Request $request)
    {
        $imageArray = "";
        if ($request->input('imageArr') != null) {
            foreach ($request->input('imageArr') as $key => $imageArr) {
                $imageArray .= '<img src="' . $imageArr . '" width="100%" alt="Image generation interrupted">';
            }
        }

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($imageArray);
        // $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('legal', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        // $dompdf->stream();

        // Set a custom filename for the downloaded PDF (replace 'custom_filename.pdf' with your desired filename)
        $dompdf->stream('rfsoats_ImgToPDF' . date("l jS \of F Y h_i_s A") . '.pdf', array('Attachment' => 0));
    }
    #endregion img to pdf converter

    #region fetch resitriction offices for subclass
    public function fetchofficerestrictionfor($subclass_id)
    {


        $rcv_offices = redts_f_offices::select(
            'id',
            'full_office_name',
        )->whereNull('deleted_at')->where('office_type', 'Receiving')->get();

        $restricted = redts_lc_rstct_sbmsn_of_req::select(
            'redts_lc_rstct_sbmsn_of_reqs.subclass_id',
            'redts_lc_rstct_sbmsn_of_reqs.rstd_office_id',
            'redts_lc_rstct_sbmsn_of_reqs.deleted_at',

            'office.office',
        )
            ->leftJoin('redts_f_offices as office', 'office.id', '=', 'redts_lc_rstct_sbmsn_of_reqs.rstd_office_id')
            ->where('redts_lc_rstct_sbmsn_of_reqs.subclass_id', $subclass_id)
            ->whereNull('redts_lc_rstct_sbmsn_of_reqs.deleted_at')->get();

        foreach ($rcv_offices as $rcv_office) {
            $rcv_office->disabled = false; // Initialize disabled property

            foreach ($restricted as $rstrcd) {
                if ($rcv_office->id == $rstrcd->rstd_office_id) {
                    $rcv_office->disabled = true;
                    break; // exit the loop once a match is found
                }
            }
        }

        return response()->json([
            'success' => true,
            'rcv_offices' => $rcv_offices,
        ]);
    }
    #endregion fetch resitriction offices for subclass

    #region resend email
    public function fetchresendEmail(Request $request)
    {
        $email = $request->input('email');

        $data =  redts_zc_client_info::where('email', $email)->whereNull('deleted_at')->first(['fname', 'access_token']);

        if (redts_zc_client_info::where('email', $email)->whereNull('deleted_at')->exists()) {

            // encrypt
            $shiftAmount = 15;  // You can choose any positive integer as the shift amount
            $decryptedaccess_token = $this->cc_decrypt($data->access_token, $shiftAmount);
            $data->decryptedaccess_token = $decryptedaccess_token;

            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
    #endregion resend email

    #region tutorial for client
    public function indexhowtorequest()
    {
        return view('client-dashboard-process-tutorial');
    }
    #endregion tutorial for client

    #region published document viewer
    public function indexpublicdocview()
    {
        return view('client-dashboard-disp-pub-doc');
    }
    #endregion published document viewer

    #region thank message when submitted request
    public function indexclientdashboardtymsg(){
        return view('client-dashboard-ty-msg');
    }
    #endregion thank message when submitted request

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
}
