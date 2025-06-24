<?php

namespace App\Http\Controllers;


use Exception;
use Illuminate\Http\Request;
use App\Mail\verifyClientNotify;
use Illuminate\Support\Facades\Mail;

class verifyClientNotifyController extends Controller
{
    public function sendClientEmailNotify(Request $request){
        $sendTo = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $data = [
            'subject' => $subject,
            'body' => $message,
        ];

        try {
            Mail::to($sendTo)->send(new verifyClientNotify($data));

            return response()->json([
                'success' => true,
                'message' => 'Mail Sent to '. $sendTo,
            ]);
        } catch (Exception $th) {
            return response()->json([
                'success' => false,
                'error' => 'Error Mailing: ' . $th->getMessage()
            ]);
        }
    }
}
