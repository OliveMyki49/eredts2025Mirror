<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\redts_zc_client_info;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class reencryptSeeder extends Seeder
{
    public function run(): void
    {
        #region >>>>>>>>>>>>>>>>>> NOTE <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        // Use this command: php artisan db:seed --class=reencryptSeeder
        #endregion >>>>>>>>>>>>>>>>>> END NOTE <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        $this->command->info(json_encode(">>>>> Performing Reencryption of Client IDs <<<<<"));

        //get all client id front and back that are not deleted
        $client_info = redts_zc_client_info::select('valid_id_front', 'valid_id_back')->whereNull('deleted_at')->get();

        //run a command for each line
        foreach ($client_info as $ci) {
            //check if front or back id is null if null ignore
            if ($ci->valid_id_front != null) {
                $this->command->info(json_encode($ci->valid_id_back));
                idreencryption($ci->valid_id_front);
            }
            if ($ci->valid_id_back != null) {
                $this->command->info(json_encode($ci->valid_id_back));
                idreencryption($ci->valid_id_back);
            }
        }

        
        recordAction('An admin performed a bulk ID encryption');
    }
}

//this command wil try to reencrypt the IDs that are not encrypted
#region ID encrption function
function idreencryption($id_path)
{
    $path = $id_path;

    if ($path != null) { //prevent encrypting null
        $cryptedPath = public_path($path);


        try {
            // Check if the file is already encrypted
            $fileContents = file_get_contents($cryptedPath);
            $isEncrypted = Str::startsWith($fileContents, 'eyJpdiI6I');

            if (!$isEncrypted) {
                // reencrypt image here
                try {
                    $reencryptImage = Crypt::encryptString(file_get_contents($cryptedPath));
                    file_put_contents($cryptedPath, $reencryptImage);
                } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                    // return response()->json([
                    //     'success' => false,
                    //     'message' => 'failed image reincryption',
                    // ]);

                    // ignore empty paths
                }
            }
        } catch (Exception $e) {
            // return response()->json([
            //     'success' => false,
            //     'message' => 'failed image reincryption',
            // ]);

            // ignore empty paths
        }
    }
}
#endregion ID encrption function

#region log function
function recordAction($action)
{
    #region record login in log
    $fetchExternalIp = fetchExternalIp();
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
function fetchExternalIp()
{
    try {
        $response = Http::get('https://api.myip.com');
        return $response->json();
    } catch (\Exception $e) {
        return ["ip" => "myip web api returns error", "country" => "N/A", "cc" => "N/A"];
    }
}
#endregion get ip
