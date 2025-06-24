<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Mail\notifyClientBilling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class notifyClientBillingController extends Controller
{
    public function sendnotifyClientBilling(Request $request)
    {
        $sendTo = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $data = [
            'subject' => $subject,
            'body' => $message,
        ];

        try {
            Mail::to($sendTo)->send(new notifyClientBilling($data));


            //record log
            $this->recordAction('Billing email has been sent to ' . $sendTo);

            return response()->json([
                'success' => true,
                'message' => 'Mail Sent to ' . $sendTo,
            ]);
        } catch (Exception $th) {
            return response()->json([
                'success' => false,
                'error' => 'Error Mailing: ' . $th->getMessage()
            ]);
        }
    }


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
            $response = Http::get('https://api.myip.comxxx');
            return $response->json();
        } catch (\Exception $e) {
            return ["ip" => "myip web api returns error", "country" => "N/A", "cc" => "N/A"];
        }
    }
    #endregion get ip
}
