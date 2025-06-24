<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\redts_d_profile;
use App\Models\redts_j_user_offices;
use App\Models\redts_f_offices;

class officeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //users for office
        //sample only test
        // User::create(['username' => '$username','password' => bcrypt('rfsoats123'),'email' => '$email','access_id' => 5,'status' => 1,'remember_token' => 0,'admin_delete' => 0,]);
        // redts_d_profile::create(['user_id' => '$user->id','fname' => '$fname','mname' => '$mname','sname' => '$sname','suffix' => '$suffix','image' => '',]);
        // redts_j_user_offices::create(['user_id' => '$user->id','offices_id' => '$office_id',]);

        /* $redts_f_offices_count = redts_f_offices::whereNull('deleted_at')->count();

        $message = array([
            'redts_f_offices_count' => $redts_f_offices_count,
        ]);
        $this->command->info(json_encode($message[0]['redts_f_offices_count']));
        $this->command->info(json_encode($message[0]['redts_f_offices_count'])); */
        // Your seeding logic here...

        $pass = "rfsoats123";

        $accessType2 = 2;    //DTS_Administrator
        $accessType3 = 3;    //Division_Chief
        $accessType4 = 4;    //Receiving_Clerk
        $accessType5 = 5;    //Receiving_and_Releasing_Clerk
        $accessType6 = 6;    //Releasing_Clerk
        $accessType7 = 7;    //Regional_Director
        $accessType8 = 8;    //Assistant_Regional_Director_for_Technical_Services
        $accessType9 = 9;    //Validator
        $accessType10 = 10;    //Processor
        $accessType11 = 11;    //Accounting_Officer
        $accessType12 = 12;    //Credit Officer

        $status = 1;
        $admin_delete = 0;

        //query starts here
        $office_guinobatan = 47;
        create_user("sampleUserHere2", $pass, "sampleUserHere2@gmail.com", $accessType9, $status, $admin_delete, "Carol", "M.", "Munos", "", "positionSample", $office_guinobatan);
    }
}


function create_user($username, $pass, $email, $access_id, $status, $admin_delete, $fname, $mname, $sname, $suffix, $position, $office_id)
{
    #region data insert here
    $user = User::create([
        'username' => $username,
        'password' => bcrypt($pass),
        'email' => $email,
        'access_id' => $access_id,
        'status' => $status,
        'remember_token' => 0,
        'admin_delete' => $admin_delete,
    ]);
    #endregion data insert here

    #region input other 
    if ($user) {
        redts_d_profile::create([
            'user_id' => $user->id,
            'fname' => $fname,
            'mname' => $mname,
            'sname' => $sname,
            'suffix' => $suffix,
            'position' => $position,
            'image' => '',
        ]);

        redts_j_user_offices::create([
            'user_id' => $user->id,
            'offices_id' => $office_id,
        ]);
    }
    #endregion input other 
}
