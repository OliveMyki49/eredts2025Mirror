<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\redts_g_carousel_img;

class guestController extends Controller
{
    public function indexdashboardhome(){
        return view('client-dashboard-home-carousel');
    }
    
    public function fetchcarouselImgs(){
        $imgs =  redts_g_carousel_img::whereNull('deleted_at')->orderBy('id', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'imgs' => $imgs,
        ]);
    }

    #region map dashboard
    public function indexclientdashboardmap(){
        return view('client-dashboard-map');
    }

    public function indexmapdashboardmain(){
        return view('map-dash-main');
    }
    #endregion map dashboard

    public function indexclientdashboardyoutube(){
        return view('client-dashboard-youtube');
    }
}
