<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\register;
use App\Models\redts_p_logs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('sign-in', [
            'user' => User::whereNull('deleted_at')->get(),
        ]);
    }

    public function registration()
    {
        return view('sign-up');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        $rememberMe = $request->has('remember_me');

        if (Auth::attempt($credentials, $rememberMe)) {
            return redirect()->intended('dashhome')
                ->withSuccess('You have successfully logged-in');

            $user = $request->user();
            $token = $user->createToken('auth_token')->plainTextToken;
        }
        return redirect()->route('login')->withInput()->with('error', 'You have no permission for this system! Please check your username and password.');
    }


    public function postRegistration(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'sname' => 'required',
            'email' => 'required',
            'tin_no' => 'required',
            'password' => 'required',
            'position' => 'required',
            // 'roles' => 'required'
        ]);
        $data = $request->all();
        $check = $this->create($data);


        //$check->roles()->attach($validated['roles']);

        return back()->with('success', 'Congratulations! You have successfully registered!');
    }

    public function fetchExternalIp()
    {
        try {
            $response = Http::get('https://api.myip.com');
            return $response->json();
        } catch (\Exception $e) {
            return ["ip" => "myip web api returns error", "country" => "N/A", "cc" => "N/A"];
        }
    }

    public function dashhome()
    {
        if (Auth::check()) {
            if (Auth::user()->status == 1 && Auth::user()->deleted_at == null) {

                #region record login in log
                $fetchExternalIp = $this->fetchExternalIp();
                $ip = $fetchExternalIp['ip'];
                $country = $fetchExternalIp['country'];

                $file = 'login_' .  date('Y_m') . '.txt';
                $upload_path = "public/assets/doc/login_records";
                $full_path = storage_path($upload_path . '/' . $file);
                $text = '' .
                    '{ ' .
                    '  "user_id": "' .  Auth::user()->id . '", ' .
                    '  "user": "' .  Auth::user()->username . '", ' .
                    '  "action_taken": "' .   'User logged in", ' .
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

                return redirect('/dashboard');
            } else {
                return redirect()->route('login')->with('error', 'This account is currently inactive or removed');
            }
        }
        return redirect()->route("login")->with('Sorry! You do not have access.');
    }

    public function create(array $data)
    {
        return Register::create([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'sname' => $data['sname'],
            'email' => $data['email'],
            'tin_no' => $data['tin_no'],
            'position' => $data['position'],
            'password' => Hash::make($data['password']),
            'roles' => ''
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
