<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\redts_na_action_attachments;

class FileController extends Controller
{
    public function show($file)
    {
        $path = storage_path("public/assets/{$file}");

        if (Storage::exists("public/assets/{$file}")) {
            return response()->file($path);
        } else {
            // return 'Not Found';
        }
    }

    public function payment_receipt_files($file)
    {
        try {
            $path = storage_path("public/assets/doc/payment_receipt_files/{$file}");

            return response()->file($path);
        } catch (\Exception $e) {
            return $this->pageResponse()['page403'];
        }
    }

    public function doc_req_files($file)
    {
        try {
            $path = storage_path("public/assets/doc/doc_req_files/{$file}");

            return response()->file($path);
        } catch (\Exception $e) {
            return $this->pageResponse()['page403'];
        }
    }

    public function action_files($file)
    {
        try {
            $path = storage_path("public/assets/doc/action_files/{$file}");

            return response()->file($path);
        } catch (\Exception $e) {
            return $this->pageResponse()['page403'];
        }
    }

    public function action_files_pub($act_atch_id, $action_id, $file)
    {
        try {
            if (redts_na_action_attachments::where('id', $act_atch_id)->where('action_id', $action_id)->where('public', 1)->exists()) {
                // $data = redts_na_action_attachments::where('id', $act_atch_id)->where('action_id', $action_id)->where('public', 1)->get();
                $path = storage_path("public/assets/doc/action_files/{$file}");
                return response()->file($path);
            } else {
                return $this->pageResponse()['ActAttachpermissionDenied'];
            }
        } catch (\Exception $e) {
            return $this->pageResponse()['page403'];
        }
    }

    // public path for oop and receipt
    public function pub_payment_receipt_files($file){
        try {
            $path = storage_path("public/assets/doc/payment_receipt_files/{$file}");
            return response()->file($path);
        } catch (\Exception $e) {
            return $this->pageResponse()['page403'];
        }
    }

    public function client_files($file)
    {
        try {
            $path = storage_path("public/assets/img/client_files/{$file}");

            return response()->file($path);
        } catch (\Exception $e) {
            return $this->pageResponse()['page403'];
        }
    }

    public function login_records($file)
    {
        try {
            if (Auth::user()->access_id == 1) {
                $path = storage_path("public/assets/doc/login_records/{$file}");
                return response()->file($path);
            } else {
                return $this->pageResponse()['adminAccessOnly'];
            }
        } catch (\Exception $e) {
            return $this->pageResponse()['page403'];
        }
    }


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
            '       <h2><ˣ))))><</h2>' .
            '       <h2>Denr RFSOATS: Permission issue or file doesnt exist</h2>' .
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

        $adminAccessOnly = '' .
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
            '       <h2>😠</h2>' .
            '       <h2>Denr RFSOATS: Admin access only</h2>' .
            '       <h3>Contact Admin For More Details. . .</h3>' .
            '       <h5><a href="/">Go to home page<a></h5>' .
            '   </span>' .
            '</div>' .
            '';

        $ActAttachpermissionDenied = '' .
            '<div ' .
            '   style="' .
            '       text-align: center; ' .
            '       background-image: linear-gradient(120deg, #FFEB3B 0%, #009688 100%); ' .
            '       font: small-caps bold 24px/1 sans-serif;' .
            '       height: 100%;' .
            '       padding-top: 20%;' .
            '   "' .
            '>' .
            '   <span> ' .
            '       <h2>No permission to open this file</h2>' .
            '       <h2>Denr RFSOATS: User access only</h2>' .
            '       <h3>Contact Admin For More Details. . .</h3>' .
            '       <h5><a href="/">Go to home page<a></h5>' .
            '   </span>' .
            '</div>' .
            '';

        return [
            'page403' => $page403,
            'usernameQuestioned' => $usernameQuestioned,
            'adminAccessOnly' => $adminAccessOnly,
            'ActAttachpermissionDenied' => $ActAttachpermissionDenied,
        ];
    }
    #endregion page response
}
