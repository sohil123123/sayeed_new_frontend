<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/home');
});

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Auth::routes();

// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	//User profile
    Route::get('/user-profile', 'UserController@userProfile')->name('user.profile');
    Route::post('/store-user-profile', 'UserController@storeUserProfile')->name('store.user.profile');

    //User Balance
    Route::get('/user-balance', 'UserController@userBalance')->name('user.balance');
    Route::any('user-balance-datatables', 'UserController@anyDataUserBalance')->name('user.balance.datatable');

    //User Payment History
    Route::get('/user-payment-history', 'UserController@userPaymentHistory')->name('user.payment_history');
    Route::any('user-payment-history-datatables', 'UserController@anyDataUserPaymentHistory')->name('user.payment.history.datatable');

    //User verification
    Route::get('/user-verification', 'UserController@userVerification')->name('user.verification');
    Route::post('/user-mobile-sms-send', 'UserController@userMobileSMSSend')->name('user.mobile.sms.send');
    Route::post('/user-mobile-sms-verification', 'UserController@userMobileSMSVerification')->name('user.mobile.sms.verification');
});

Route::get('/cc', function() {
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
