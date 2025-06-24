<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_zh_cert_perm_routes;

class redts_zh_cert_perm_routesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //remove all data
        $data = ([
            #region Private Land Timber Permit
            /* -- n/a -- */
            #endregion Private Land Timber Permit


            #region Special Land Timber Permit
            /* -- n/a -- */
            #endregion Special Land Timber Permit
            
            
            #region Tree Cutting Permit for Public/School
            /* -- n/a -- */
            #endregion Tree Cutting Permit for Public/School

            #region Cutting and/or Earth Balling Permit
            /* -- n/a -- */
            #endregion Cutting and/or Earth Balling Permit

            #region Chainsaw Registration
            [ 'id' => 1, 'sub_class_id' => 5, 'route' => 'gen-dash-cert-chainsaw-reg',],
            [ 'id' => 2, 'sub_class_id' => 6, 'route' => 'gen-dash-cert-chainsaw-reg',],
            [ 'id' => 3, 'sub_class_id' => 7, 'route' => 'gen-dash-cert-chainsaw-reg',],
            [ 'id' => 4, 'sub_class_id' => 8, 'route' => 'gen-dash-cert-chainsaw-reg',],
            [ 'id' => 5, 'sub_class_id' => 9, 'route' => 'gen-dash-cert-chainsaw-reg',],
            [ 'id' => 6, 'sub_class_id' => 10, 'route' => 'gen-dash-cert-chainsaw-reg',],
            #endregion Chainsaw Registration
        ]);

        foreach ($data as $key => $dt) {
            redts_zh_cert_perm_routes::create([
                'id' => $dt['id'],
                'sub_class_id' => $dt['sub_class_id'],
                'route' => $dt['route'],
            ]);
        }
    }
}
