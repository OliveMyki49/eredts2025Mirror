<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\register;
use App\Models\redts_p_logs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\redts_a_access;
use App\Models\redts_d_profile;
use App\Models\redts_j_user_offices;
use App\Models\redts_f_offices;
use App\Models\redts_w_upload_size_limit;
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

    #region communicate with api
    function syncuserlist()
    {
        // 👇 API call before rendering sign-in view
        $baseUrl = config('app.bapiu'); // e.g. from APP_BAPIU in .env

        try {
            $apiGetCount = Http::get($baseUrl . '7ebe57f0-5992-484b-bb00-d8f15a123bd8');
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "msg" => "api failed to respond",
            ]);
        }

        // count users from the api
        $apiGetCountData = $apiGetCount->ok() ? $apiGetCount->json() : [];
        $usersCounted = 0;
        $officesCounted = 0;
        $accessCounted = 0;
        $get_size_limit = [];
        if ($apiGetCountData != []) {
            $usersCounted = $apiGetCountData['usersCounted'] ?? 0;
            $officesCounted = $apiGetCountData['officesCounted'] ?? 0;
            $accessCounted = $apiGetCountData['accessCounted'] ?? 0;
            $get_size_limit = $apiGetCountData['get_size_limit'] ?? [];
        }

        //count users in local database
        $localUsersCounted = User::whereNull('deleted_at')->count();
        $localofficesCounted = redts_f_offices::whereNull('deleted_at')->count();
        $localaccessCounted = redts_a_access::whereNull('deleted_at')->count();

        $uptmsguser = false;
        $uptmsgoffice = false;
        $uptmsgaccess = false;
        $uptmsguploadlimit = false;

        // compare users in local database
        if ($usersCounted == $localUsersCounted) {
            // if same do nothing
        } else {
            //get data from getusers api
            $apiGetUsersFromApi = http::get($baseUrl . 'd1e2a17f-8b7e-4552-898e-aab919461c29');
            $apiGetUsersFromApiData = $apiGetUsersFromApi->ok() ? $apiGetUsersFromApi->json() : [];

            $fetchedusers = $apiGetUsersFromApiData['users'] ?? [];
            $fetchedprofiles = $apiGetUsersFromApiData['profiles'] ?? [];
            $fetchedusers_office = $apiGetUsersFromApiData['users_office'] ?? [];

            // insert in local database while checking if user exists
            foreach ($fetchedusers as $key => $user) {
                if (!User::where('uuid', $user['uuid'])->exists()) {
                    User::create([
                        'uuid' => $user['uuid'],
                        'username' => $user['username'],
                        'password' => $user['hashed_password'],
                        'email' => $user['email'],
                        'access_id' => $user['access_id'],
                        'access_uuid' => $user['access_uuid'],
                        'status' => $user['status'],
                        'remember_token' => null,
                        'admin_delete' => $user['admin_delete'],

                    ]);
                }
            }

            foreach ($fetchedprofiles as $key => $profiles) {
                if (!redts_d_profile::where('user_uuid', $profiles['user_uuid'])->exists()) {
                    redts_d_profile::create([
                        'user_uuid' => $profiles['user_uuid'],
                        'fname' => $profiles['fname'],
                        'mname' => $profiles['mname'],
                        'sname' => $profiles['sname'],
                        'suffix' => $profiles['suffix'],
                        'position' => $profiles['position'],
                        'image' => $profiles['image'],
                    ]);
                }
            }

            foreach ($fetchedusers_office as $key => $users_office) {
                if (!redts_j_user_offices::where('user_uuid', $users_office['user_uuid'])->exists()) {
                    redts_j_user_offices::create([
                        'user_id' => $users_office['user_id'],
                        'user_uuid' => $users_office['user_uuid'],
                        'offices_id' => $users_office['offices_id'],
                        'offices_uuid' => $users_office['offices_uuid'],
                    ]);
                }
            }

            $uptmsguser = true;
        }

        if ($officesCounted == $localofficesCounted) {
        } else {
            //get data from offices api
            $officesApi = http::get($baseUrl . 'd5f75114-f3a7-4ddd-a265-0e663dd13b29');
            $officesApiData = $officesApi->ok() ? $officesApi->json() : [];
            foreach ($officesApiData['offices'] as $key => $office) {
                if (!redts_f_offices::where('uuid', $office['uuid'])->exists()) {
                    redts_f_offices::create([
                        'uuid' => $office['uuid'],
                        'region_id' => $office['region_id'],
                        'slug' => $office['slug'],
                        'office' => $office['office'],
                        'full_office_name' => $office['full_office_name'],
                        'office_type' => $office['office_type'],
                        'mother_unit' => $office['mother_unit'],
                        'header_office_title' => $office['header_office_title'],
                        'email' => $office['email'],
                        'tel_no' => $office['tel_no'],
                        'cp_no' => $office['cp_no'],
                        'office_address' => $office['office_address'],
                    ]);
                }
            }

            $uptmsgoffice = true;
        }

        if ($accessCounted == $localaccessCounted) {
        } else {
            // Get data from offices API
            $accessTypesApi = http::get($baseUrl . 'b62fc338-0986-4c1a-8995-003d356018b4');
            $accessTypesData = $accessTypesApi->ok() ? $accessTypesApi->json() : [];

            foreach ($accessTypesData['access_types'] as $key => $accessType) {
                if (!redts_a_access::where('uuid', $accessType['uuid'])->exists()) {
                    redts_a_access::create([
                        'uuid' => $accessType['uuid'],
                        'type' => $accessType['type'],
                    ]);
                }
            }

            $uptmsgaccess = true;
        }

        //update upload size limit
        if (redts_w_upload_size_limit::count() > 0) {
            $upl_dtls = redts_w_upload_size_limit::first();
            if ($upl_dtls->size == $get_size_limit['size']) {
            } else {
                redts_w_upload_size_limit::where('id', 1)->update([
                    'size' => $get_size_limit['size'] ?? 0,
                ]);
                $uptmsguploadlimit = true;
            }
        } else {
            redts_w_upload_size_limit::create([
                'size' => $get_size_limit['size'] ?? 0,
            ]);
            $uptmsguploadlimit = true;
        }


        //databases to sync when not same
        /* 
            - users
            - profile
            - user offices links
            - access types
        */

        return response()->json([
            "success" => true,
            "apiGetCountData" => $apiGetCountData,
            "uptmsguser" =>  $uptmsguser,
            "uptmsgoffice" =>  $uptmsgoffice,
            "uptmsgaccess" =>  $uptmsgaccess,
            "uptmsguploadlimit" =>  $uptmsguploadlimit,
        ]);
    }
    #endregion communicate with api
}
