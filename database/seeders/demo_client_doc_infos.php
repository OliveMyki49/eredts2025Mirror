<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_zd_client_doc_info;
use App\Models\redts_n_action;
use App\Models\redts_ze_client_doc_attachments;

class demo_client_doc_infos extends Seeder
{
    /**
     * Make sample client info or create one to use this
     */

    //  NOTE
    // RUN THIS:
    // php artisan db:seed --class=demo_client_doc_infos

    public function run(): void
    {
        
        // set one office where request will be sent
        $office_id = 5; /* Information and Communications Technology Section */
        // sample dummy info
        $client_id = 38; //change this id to an existing sample user sir isaac

        //other info
        $application_type_id = 1;
        $transaction_type_id = 1;


        // random sample class with one subclass sample
        $class = array(
            array(31, 'memo', 12, 'NA', 'Not Available'),
        );        

        // sample request document info
        $req = array(
            1, //id
            1, //app form for the form of adding document in client request form
            'NA', //slug
        );

        for ($i = 0; $i < 1200; $i++) {
            // shuffle;
            $class_rand = array_rand($class);

            // generate doc
            $doc = redts_zd_client_doc_info::create([
                'doc_no' => 'unset',
                'application_type_id' => $application_type_id,
                'transaction_type_id' => $transaction_type_id,
                'agency' => null,
                'client_id' => $client_id,
                'class_id' => $class[$class_rand][0],
                'class_slug' => $class[$class_rand][1],
                'subclass_id' => $class[$class_rand][2],
                'subclass_slug' => $class[$class_rand][3],
                'remarks' => null,
                'validated' => null,
            ]);

            //generate first action
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
                'subject' => 'Request for ' . $class[$class_rand][3],
                'action_remarks' => null,
                'attachment_remarks' => null,
            ]);

            // create dummy (not existing document)
            redts_ze_client_doc_attachments::create([
                'doc_info_id' => $doc->id,
                'req_id' => $req[0],
                'app_form_no' => $req[1],
                'req_slug' => $req[2],
                'file_path' => 'doc_req_files',
                'file_name' => 'fake_sample_doc.pdf',
                'file_link' => 'n/a',
                'text_input' => 'n/a',
                'attachment_type' => 'file',
            ]);
        }
    }
}
