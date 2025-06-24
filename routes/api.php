<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\generalController;
use App\Http\Controllers\apiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//call by .../api/testFetch
Route::get('bdf6638e-efef-4dea-98f0-e2143248ad73', [apiController::class, 'localareYouOnline'])->name('localareYouOnline'); //ask system if online

Route::post('f47ac10b-58cc-4372-a567-0e02b2c3d479', [apiController::class, 'localverifyUser'])->name('localverifyUser');

Route::post('011b3974-3bdd-459b-ad85-e7f9c26d7e63', [apiController::class, 'localfetchoffice'])->name('localfetchoffice');

Route::post('e4d292fa-f4ea-491e-b728-db5a8fe532ce', [apiController::class, 'storelocalactions'])->name('storelocalactions'); //upload local actions

Route::post('03045246-d4a1-424c-86e4-c0c6bf8b5858', [apiController::class, 'localintransitsync'])->name('localintransitsync'); //upload local actions

Route::post('69e4fc6c-7387-4bb1-9d1f-8ef5e069c6ae', [apiController::class, 'uploadfilesync'])->name('uploadfilesync'); //sync local files
