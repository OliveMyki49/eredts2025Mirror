<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Mail\validatedDocNotifier;
use Illuminate\Support\Facades\Mail;

class validatedDocNotifierController extends Controller
{
    public function sendvalidatedDocNotifier(Request $request)
    {
        $sendTo = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $data = [
            'subject' => $subject,
            'body' => $message,
        ];


        try {
            Mail::to($sendTo)->send(new validatedDocNotifier($data));

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
}
