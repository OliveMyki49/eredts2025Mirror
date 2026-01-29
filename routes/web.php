<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\Part\File;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\generalController;
use App\Http\Controllers\Auth\AuthController;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\verifyClientNotifyController;
use App\Http\Controllers\notifyClientBillingController;
use App\Http\Controllers\validatedDocNotifierController;
use App\Http\Controllers\acknowledgementNotifierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check() && Auth::user()) {
        if (Auth::user()->status == 1 && Auth::user()->deleted_at == null) {
            if (Auth::user()->access_id == 1) { //if admin go to admin dashboard if not go to general dashboard
                return view('admin-dashboard');
            } else {
                return view('general-dashboard');
            }
        } else {
            return redirect()->route('login')->with('error', 'This account is currently inactive or removed');
        }
    } else {
        // return view('client-dashboard-home-carousel');
        return view('sign-in');
    }
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashhome', [AuthController::class, 'dashhome']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()) {
        if (Auth::user()->status == 1 && Auth::user()->deleted_at == null) {
            if (Auth::user()->access_id == 1) { //if admin go to admin dashboard if not go to general dashboard
                return view('admin-dashboard');
            } else {
                return view('general-dashboard');
            }
        } else {
            return redirect()->route('login')->with('error', 'This account is currently inactive or removed');
        }
    } else {
        return view('sign-in');
    }
});

Route::get('/sign-in', function () {
    return view('sign-in');
});
/* Route::get('/sign-up', function () {
    return view('sign-up');
}); */
/* Route::get('/registrationpanel', function () {
    return view('registrationpanel');
}); */

#region login page
Route::get('sync-user-list', [AuthController::class, 'syncuserlist'])->name('syncuserlist');
#endregion login page

#region admin dashboard
Route::get('get-redtsstats', [adminController::class, 'getredtsstats'])->name('getredtsstats');

Route::get('admin-dash-mng-cli', [adminController::class, 'indexadmindashmngcli'])->name('indexadmindashmngcli');

Route::post('get-dt-client-infos', [adminController::class, 'fetchDTclientinfos'])->name('fetchDTclientinfos');
Route::post('trash-registerClient', [adminController::class, 'removeregisterClient'])->name('removeregisterClient');

Route::get('admin-dash-req', [adminController::class, 'indexadmindashreq'])->name('indexadmindashreq');

Route::post('get-redtsClassifications', [adminController::class, 'getredtsClassifications'])->name('getredtsClassifications');
Route::get('fetch-redtsClassifications', [adminController::class, 'fetchredtsClassifications'])->name('fetchredtsClassifications');
Route::post('insert-redtsClassifications', [adminController::class, 'storeredtsClassifications'])->name('storeredtsClassifications');
Route::post('edit-redtsClassifications', [adminController::class, 'updateredtsClassifications'])->name('updateredtsClassifications');
Route::post('trash-redtsClassifications', [adminController::class, 'removeredtsClassifications'])->name('removeredtsClassifications');

Route::post('get-redtsSubClass', [adminController::class, 'getredtsSubClass'])->name('getredtsSubClass');
Route::get('fetch-redtsSubClass', [adminController::class, 'fetchredtsSubClass'])->name('fetchredtsSubClass');
Route::get('fetch-redtsSubClass_by/{class_id}/', [adminController::class, 'fetchredtsSubClass_by'])->name('fetchredtsSubClass_by');
Route::post('insert-redtsSubClass', [adminController::class, 'storeredtsSubClass'])->name('storeredtsSubClass');
Route::post('edit-redtsSubClass', [adminController::class, 'updateredtsSubClass'])->name('updateredtsSubClass');
Route::post('trash-redtsSubClass', [adminController::class, 'removeredtsSubClass'])->name('removeredtsSubClass');

Route::post('get-redtsSubClassReq', [adminController::class, 'getredtsSubClassReq'])->name('getredtsSubClassReq');
Route::post('insert-redtsSubClassReq', [adminController::class, 'storeredtsSubClassReq'])->name('storeredtsSubClassReq');
Route::post('edit-redtsSubClassReq', [adminController::class, 'updateredtsSubClassReq'])->name('updateredtsSubClassReq');
Route::post('trash-redtsSubClassReq', [adminController::class, 'removeredtsSubClassReq'])->name('removeredtsSubClassReq');

Route::post('get-redtsCarouselImgs', [adminController::class, 'fetchredtsCarouselImgs'])->name('fetchredtsCarouselImgs');
Route::post('insert-carouselImg', [adminController::class, 'storecarouselImg'])->name('storecarouselImg');
Route::post('trash-redtsgcarouselimgs', [adminController::class, 'removeredtsgcarouselimgs'])->name('removeredtsgcarouselimgs');

Route::get('fetch-redtsReqStats', [adminController::class, 'fetchredtsReqStats'])->name('fetchredtsReqStats');
Route::get('fetch-redtsReqStats_by/{subclass_id}/{transaction_type}/', [adminController::class, 'fetchredtsReqStats_by'])->name('fetchredtsReqStats_by');

Route::get('get-access-types', [adminController::class, 'fetchaccesstypes'])->name('fetchaccesstypes');
Route::get('get-offices', [adminController::class, 'fetchoffices'])->name('fetchoffices');

Route::post('get-userInfos', [adminController::class, 'fetchuserInfos'])->name('fetchuserInfos');
Route::get('get-users', [adminController::class, 'fetchusers'])->name('fetchusers');
Route::post('insert-Users', [adminController::class, 'storeUsers'])->name('storeUsers');
Route::post('edit-Users', [adminController::class, 'updateUsers'])->name('updateUsers');
Route::post('trash-user', [adminController::class, 'removeuser'])->name('removeuser');

Route::post('get-officeInfo', [adminController::class, 'fetchofficeInfo'])->name('fetchofficeInfo');
Route::get('get-regions', [adminController::class, 'fetchregions'])->name('fetchregions');
Route::post('insert-Offices', [adminController::class, 'storeOffices'])->name('storeOffices');
Route::post('edit-Offices', [adminController::class, 'updateOffices'])->name('updateOffices');
Route::post('trash-redtsOffice', [adminController::class, 'removeredtsOffice'])->name('removeredtsOffice');

Route::get('admin-dash-gen-qr', [adminController::class, 'indexadmindashgenqr'])->name('indexadmindashgenqr');
Route::post('get-genqr', [adminController::class, 'fetchgenqr'])->name('fetchgenqr');

Route::get('admin-dashboard-logs', [adminController::class, 'indexadmindashlogs'])->name('indexadmindashlogs');
Route::get('admin-dash-view-log-file', [adminController::class, 'indexadmindashviewlogfile'])->name('indexadmindashviewlogfile');

Route::get('admin-dashboard-gen-set', [adminController::class, 'indexadmindashgenset'])->name('indexadmindashgenset');
Route::get('get-upload-size', [adminController::class, 'fetchuploadsize'])->name('fetchuploadsize');
Route::post('edit-upload-size-limit', [adminController::class, 'updateuploadsizelimit'])->name('updateuploadsizelimit');

//get-userDesigOffice
Route::post('get-userDesigOffice', [adminController::class, 'fetchuserDesigOffice'])->name('fetchuserDesigOffice');
Route::post('insert-edit-UserDesig', [adminController::class, 'storeUpdateUserDesig'])->name('storeUpdateUserDesig');
#endregion admin dashboard

#region client dashboard
Route::get('client-dashboard', [clientController::class, 'indexclientdashboard'])->name('indexclientdashboard');
Route::get('client-dashboard-home', [clientController::class, 'indexclientdashboardhome'])->name('indexclientdashboardhome');
Route::get('client-dashboard-kiosk', [clientController::class, 'indexclientdashboardkiosk'])->name('indexclientdashboardkiosk');
Route::post('insert-clientInfo', [clientController::class, 'storeclientInfo'])->name('storeclientInfo');
Route::post('edit-clientInfo', [clientController::class, 'updateclientInfo'])->name('updateclientInfo');
Route::post('send-ClientEmailNotify', [verifyClientNotifyController::class, 'sendClientEmailNotify'])->name('sendClientEmailNotify');
Route::post('verify-token-email', [clientController::class, 'verifytokenemail'])->name('verifytokenemail');
Route::get('fetch-docInfoSelectTags', [clientController::class, 'fetchdocInfoSelectTags'])->name('fetchdocInfoSelectTags');
Route::post('insert-clientRequest', [clientController::class, 'storeclientRequest'])->name('storeclientRequest');
Route::post('insert-clientDocFiles', [clientController::class, 'storeclientDocFiles'])->name('storeclientDocFiles');
Route::get('fetch-clientReceivingOffice', [clientController::class, 'fetchclientReceivingOffice'])->name('fetchclientReceivingOffice');
Route::post('get-resendEmail', [clientController::class, 'fetchresendEmail'])->name('fetchresendEmail');
Route::get('client-dashboard-process-tutorial', [clientController::class, 'indexclientdashboardprocesstutorial'])->name('indexclientdashboardprocesstutorial');
Route::get('client-dashboard-img-to-pdf', [clientController::class, 'indexclientdashboardimgtopdf'])->name('indexclientdashboardimgtopdf');
Route::post('gen-img-to-pdf', [clientController::class, 'genimgtopdf'])->name('genimgtopdf');
Route::post('send-acknowledgementNotifier', [acknowledgementNotifierController::class, 'sendacknowledgementNotifier'])->name('sendacknowledgementNotifier');
Route::get('fetch-office-restriction-for/{subclass_id}/', [clientController::class, 'fetchofficerestrictionfor'])->name('fetchofficerestrictionfor');
Route::get('how-to-request', [clientController::class, 'indexhowtorequest'])->name('indexhowtorequest');
Route::get('rfsoats/pdv', [clientController::class, 'indexpublicdocview'])->name('indexpublicdocview');
Route::get('client-dashboard-ty-msg', [clientController::class, 'indexclientdashboardtymsg'])->name('indexclientdashboardtymsg');
#endregion client dashboard

#region guest dashboard
Route::get('client-dashboard-home-original', [guestController::class, 'indexdashboardhome'])->name('indexdashboardhome');
Route::get('fetch-carouselImgs', [guestController::class, 'fetchcarouselImgs'])->name('fetchcarouselImgs');
Route::get('client-dashboard-map', [guestController::class, 'indexclientdashboardmap'])->name('indexclientdashboardmap');
Route::get('client-dashboard-youtube', [guestController::class, 'indexclientdashboardyoutube'])->name('indexclientdashboardyoutube');
#endregion guest dashboard

#region map kiosk
Route::get('map-dashboard-main', [guestController::class, 'indexmapdashboardmain'])->name('indexmapdashboardmain');
#endregion map kiosk

#region track document
Route::get('client-dashboard-doc-tracking', [clientController::class, 'indexdashboarddoctracking'])->name('indexdashboarddoctracking');
Route::get('general-dash-doc-tracking', [clientController::class, 'indexgeneraldashdoctracking'])->name('indexgeneraldashdoctracking');
Route::get('get-trackDoc/{doc_no}/', [clientController::class, 'fetchtrackDoc'])->name('fetchtrackDoc');
Route::get('rfsoats/get-trackDoc/{doc_no}/', [clientController::class, 'fetchpublisheddoc'])->name('fetchpublisheddoc'); //extra for publish document tracking
#endregion track document

#region GENERAL USER 
//================================================================================================================================================================

#region user info
Route::get('get-otheruserinfo', [generalController::class, 'fetchotheruserinfo'])->name('fetchotheruserinfo');
Route::post('edit-user-profile', [generalController::class, 'updateuserprofile'])->name('updateuserprofile');
#endregion user info

#region general dashboard
Route::get('get-action-stats', [generalController::class, 'fetchactionstats'])->name('fetchactionstats');
#endregion general dashboard

#region in-transit
Route::post('get-clientReqInTransit', [generalController::class, 'fetchclientReqInTransit'])->name('fetchclientReqInTransit');
Route::get('get-clientId-view/{username}/{client_id}/', [generalController::class, 'fetchclientIdView'])->name('fetchclientIdView'); //DEPRECATED
Route::get('get-clientId-view-reencrypt/{client_id}/', [generalController::class, 'fetchclientIdViewReencrypt'])->name('fetchclientIdViewReencrypt'); //DEPRECATED
Route::get('get-docInfos/{doc_uuid}/', [generalController::class, 'fetchdocInfos'])->name('fetchdocInfos');
Route::post('edit-inTransitAction', [generalController::class, 'updateinTransitAction'])->name('updateinTransitAction');
#endregion in-transit

#region received
Route::post('get-clientReqReceived', [generalController::class, 'fetchclientReqReceived'])->name('fetchclientReqReceived');
Route::get('get-office', [generalController::class, 'fetchoffice'])->name('fetchoffice');
Route::post('get-office_via_search', [generalController::class, 'fetchoffice_via_search'])->name('fetchoffice_via_search');
Route::get('get-processLengths/{subclass_id}/', [generalController::class, 'fetchprocessLengths'])->name('fetchprocessLengths');
Route::post('insert-releaseAction', [generalController::class, 'storereleaseAction'])->name('storereleaseAction');
Route::post('send-validatedDocNotifier', [validatedDocNotifierController::class, 'sendvalidatedDocNotifier'])->name('sendvalidatedDocNotifier');
Route::post('send-notifyClientBilling', [notifyClientBillingController::class, 'sendnotifyClientBilling'])->name('sendnotifyClientBilling');
Route::post('edit-finalAction', [generalController::class, 'updatefinalAction'])->name('updatefinalAction');
Route::post('edit-rejectDocAction', [generalController::class, 'updaterejectDocAction'])->name('updaterejectDocAction');
Route::get('insert-seen-recvd-act/{action_id}/{action_uuid}/', [generalController::class, 'storeseenrecvdact'])->name('storeseenrecvdact');
#endregion received

#region released
Route::post('get-clientReqReleased', [generalController::class, 'fetchclientReqReleased'])->name('fetchclientReqReleased');
#endregion released

#region archived
Route::post('get-clientReqAchived', [generalController::class, 'fetchclientReqAchived'])->name('fetchclientReqAchived');
#endregion archived

#region rejected
// Route::post('get-clientReqRejected', [generalController::class, 'fetchclientReqRejected'])->name('fetchclientReqRejected'); //DEPRECATED
#endregion rejected

#region created
Route::post('get-clientReqCreated', [generalController::class, 'fetchclientReqCreated'])->name('fetchclientReqCreated');
#endregion created

#region add new document
/* 
    NOT NEEDED HERE
    Route::get('get-client-fullname-and-id', [generalController::class, 'fetchclientfullnameandid'])->name('fetchclientfullnameandid');
*/
Route::post('get-class-slug', [generalController::class, 'fetchclassslug'])->name('fetchclassslug');
Route::post('get-class-slug-bulk', [generalController::class, 'fetchclassslugbulk'])->name('fetchclassslugbulk');
Route::get('get-user-office', [generalController::class, 'fetchuseroffice'])->name('fetchuseroffice');
Route::get('get-user-office-bulk', [generalController::class, 'fetchuserofficebulk'])->name('fetchuserofficebulk');
Route::get('get-app-transact-type', [generalController::class, 'fetchapptransacttype'])->name('fetchapptransacttype');

// Single document submission (original functionality)
Route::post('insert-new-doc', [generalController::class, 'storenewdoc'])->name('storenewdoc');

// Bulk document submission (new functionality)
Route::get('index-bulk-doc', [generalController::class, 'indexbulkdoc'])->name('indexbulkdoc');
Route::post('insert-bulk-docs', [generalController::class, 'storebulkdocs'])->name('storebulkdocs');
#endregion add new document

#region routing slip
Route::get('get-routingslip/{doc_no}/', [generalController::class, 'fetchroutingslip'])->name('fetchroutingslip');
// Route::middleware(['auth'])->group(function () {
Route::get('grsid/{doc_uuid}/', [generalController::class, 'fetchroutingslipid'])->name('fetchroutingslipid');/* NOTE abbreviated to lessen the qr complexity */
// });
#endregion routing slip

#region order of payment slip
Route::get('get-orderOfPayment/{doc_id}/', [generalController::class, 'fetchorderOfPayment'])->name('fetchorderOfPayment'); //redirects to a blade file
Route::get('add-another-oop/{doc_id}/', [generalController::class, 'fetchaddanotheroop'])->name('fetchaddanotheroop'); //additional order of paymenr
Route::get('get-edit-another-oop/{doc_id}/{aoop_id}', [generalController::class, 'fetchupdateanotheroop'])->name('fetchupdateanotheroop'); //additional order of paymenr
Route::post('edit-another-oop', [generalController::class, 'updateanotheroop'])->name('updateanotheroop'); //additional order of paymenr
Route::get('get-orderOfPayment-view-only/{doc_id}/', [generalController::class, 'fetchorderOfPaymentviewonly'])->name('fetchorderOfPaymentviewonly'); //redirects to a blade file
Route::get('get-orderOfPaymentForBilling/{doc_id}/', [generalController::class, 'fetchorderOfPaymentForBilling'])->name('fetchorderOfPaymentForBilling'); //redirects to a blade file
Route::post('insert-edit-order-of-payment', [generalController::class, 'storeupdateorderofpayment'])->name('storeupdateorderofpayment');
Route::post('insert-additional-order-of-payment', [generalController::class, 'storeadditionalorderofpayment'])->name('storeadditionalorderofpayment');
Route::get('get-existing-order-of-payment', [generalController::class, 'fetchexistingorderofpayment'])->name('fetchexistingorderofpayment'); //fetcgh order of payment data
Route::get('cli-dash-pymnt-rcpt-upld', [generalController::class, 'indexclidashpymntrcptupld'])->name('indexclidashpymntrcptupld'); //fetcgh order of payment data
Route::post('edit-signed-order-of-payment', [generalController::class, 'updatesignedorderofpayment'])->name('updatesignedorderofpayment'); //fetcgh order of payment data
Route::post('edit-payment-receipt', [generalController::class, 'updatepaymentreceipt'])->name('updatepaymentreceipt'); //fetcgh order of payment data
Route::post('edit-payment-receipt-user', [generalController::class, 'updatepaymentreceiptuser'])->name('updatepaymentreceiptuser'); //fetcgh order of payment data
Route::post('edit-verify-client-receipt', [generalController::class, 'updateverifyclientreceipt'])->name('updateverifyclientreceipt'); //fetcgh order of payment data
#endregion order of payment slip

#region manage client requests
Route::get('admin-dash-mng-cli-req', [generalController::class, 'indexadmindashmngclireq'])->name('indexadmindashmngclireq');
Route::post('get-specificClientReqsReceived', [generalController::class, 'fetchspecificClientReqsReceived'])->name('fetchspecificClientReqsReceived');
Route::post('get-specificClientReqsReceivedOrigin', [generalController::class, 'fetchspecificClientReqsReceivedOrigin'])->name('fetchspecificClientReqsReceivedOrigin');
Route::get('check-if-origin-viewer', [generalController::class, 'fetchcheckiforiginviewer'])->name('fetchcheckiforiginviewer');
Route::post('get-specificClientReqsReceivedOverall', [generalController::class, 'fetchspecificClientReqsReceivedOverall'])->name('fetchspecificClientReqsReceivedOverall');
Route::get('get-other-cli-req-inputs/{doc_uuid}/', [generalController::class, 'fetchotherclireqinputs'])->name('fetchotherclireqinputs');
#endregion manage client requests

#region qr scanner
Route::get('general-dashboard-qr-scanner', [generalController::class, 'indexgendashqrscanner'])->name('indexgendashqrscanner');
#endregion qr scanner

#region certification for chainsaw registration
Route::get('perm_cert_route_checker/{doc_no}/{subclass_id}/', [generalController::class, 'indexpermcertroutechecker'])->name('indexpermcertroutechecker');
Route::get('gen-dash-cert-chainsaw-reg/{doc_no}/', [generalController::class, 'indexgendashcertchainsawreg'])->name('indexgendashcertchainsawreg');
#endregion certification for chainsaw registration

#region statitical graphs
Route::get('gen-dashboard-stats', [generalController::class, 'indexgeneraldashboardstats'])->name('indexgeneraldashboardstats');
Route::post('get-monthly-request-per-month-all', [generalController::class, 'fetchmonthlyrequestpermonthall'])->name('fetchmonthlyrequestpermonthall');
Route::post('get-dash-stats', [generalController::class, 'fetchdashstats'])->name('fetchdashstats');
Route::post('get-total-req-per-class-annually', [generalController::class, 'fetchtotalreqperclassannually'])->name('fetchtotalreqperclassannually');
Route::post('get-annual-sub-class-requests', [generalController::class, 'fetchannualsubclassrequests'])->name('fetchannualsubclassrequests');
Route::post('get-total-client-per-gender-annually', [generalController::class, 'fetchtotalclientpergenderannually'])->name('fetchtotalclientpergenderannually');
Route::post('get-annual-requests-per-receiving-office', [generalController::class, 'fetchannualrequestsperreceivingoffice'])->name('fetchannualrequestsperreceivingoffice');
#endregion statitical graphs

#region restrict file view when user in not logged in 
Route::middleware(['auth'])->group(function () {
    Route::get('/storage/{file}', [FileController::class, 'show'])->where('file', '.*');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/payment_receipt_files/{file}', [FileController::class, 'payment_receipt_files'])->where('file', '.*');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/doc_req_files/{file}', [FileController::class, 'doc_req_files'])->where('file', '.*');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/action_files/{file}', [FileController::class, 'action_files'])->where('file', '.*');
});

//2 authentication controls whic is identified by the document ID in the database and the action where it is uploaded or found
Route::get('/action_files_pub/{act_atch_id}/{action_id}/{file}', [FileController::class, 'action_files_pub'])->where('file', '.*'); // this is a special route that allow file in public or use is not logged in
Route::get('/pub_payment_receipt_files/{file}', [FileController::class, 'pub_payment_receipt_files'])->where('file', '.*'); // this is a special route that allow file in public or use is not logged in

Route::middleware(['auth'])->group(function () {
    Route::get('/client_files/{file}', [FileController::class, 'client_files'])->where('file', '.*');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/login_records/{file}', [FileController::class, 'login_records'])->where('file', '.*');
});
#endregion restrict file view when user in not logged in 

#region flowchart
Route::get('client_req_flowchart', function () {
    return view('flowchart.Client_Request_Process_Flowchart');
});
Route::get('client_req_processing_flowchart', function () {
    return view('flowchart.RFSOATS_Flowchart_Client_Request_Processing_Flowchart');
});
#endregion flowchart

#region mobile viewer user dashboard
Route::get('user-dashboard-mobile', [generalController::class, 'indexuserdashboardmobile'])->name('indexuserdashboardmobile');
#endregion mobile viewer user dashboard

#region user img to pdf generator
Route::get('general-dash-img-to-pdf', [generalController::class, 'indexgeneraldashimgtopdf'])->name('indexgeneraldashimgtopdf');
#endregion user img to pdf generator

#region server handshake
Route::get('eredts-server-hand-shake', [generalController::class, 'eredtsserverhandshake'])->name('eredtsserverhandshake');
#endregion server handshake

#region test blade
Route::get('test', function () {
    return view('aaa-test');
});
#endregion test blade