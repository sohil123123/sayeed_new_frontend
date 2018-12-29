<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserProfile;
use App\UserBalance;
use App\UserTransaction;
use App\UserVerification;

use Paypal;
use Session;
use Mail;
use Auth;
use DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userProfile()
    {
        $user_profile = Auth::user()->user_profile;
        return view('user.profile',compact('user_profile'));
    }

    public function storeUserProfile(Request $request)
    {
        $user_profile = Auth::user()->user_profile;
        $input = $request->except(['_token','imageFrontNationalID','imageBackNationalID','imagePassport']);
        $input['dateOfBirth'] = date('Y-m-d', strtotime($request->dateOfBirth));

        if($request->hasfile('imageFrontNationalID'))
        {
            $f = $request->imageFrontNationalID;
            $imageFrontNationalID = base64_encode(file_get_contents($f->getRealPath()));
            $input['imageFrontNationalID'] = $imageFrontNationalID;
            // $image = $request->file('imageFrontNationalID');
            // $imageFrontNationalID = md5(rand() * time()).'.'.$image->getClientOriginalExtension();
            // $destinationPath = 'assets/userImage/imageFrontNationalID/';
            // $image->move($destinationPath, $imageFrontNationalID);

            // //if image available than delete old and upload new
            // $full_path = $destinationPath.$user_profile->imageFrontNationalID;
            // if(file_exists($full_path)){
            //     unlink($full_path);
            // }
        }else{
            // $imageFrontNationalID = $user_profile->imageFrontNationalID;
        }

        if($request->hasfile('imageBackNationalID'))
        {
            $f = $request->imageBackNationalID;
            $imageBackNationalID = base64_encode(file_get_contents($f->getRealPath()));
            $input['imageBackNationalID'] = $imageBackNationalID;
            // $image = $request->file('imageBackNationalID');
            // $imageBackNationalID = md5(rand() * time()).'.'.$image->getClientOriginalExtension();
            // $destinationPath = 'assets/userImage/imageBackNationalID/';
            // $image->move($destinationPath, $imageBackNationalID);

            // //if image available than delete old and upload new
            // $full_path = $destinationPath.$user_profile->imageBackNationalIDD;
            // if(file_exists($full_path)){
            //     unlink($full_path);
            // }
        }else{
            // $imageBackNationalID = $user_profile->imageBackNationalID;
        }

        if($request->hasfile('imagePassport'))
        {
            $f = $request->imagePassport;
            $imagePassport = base64_encode(file_get_contents($f->getRealPath()));
            $input['imagePassport'] = $imagePassport;
            // $image = $request->file('imagePassport');
            // $imagePassport = md5(rand() * time()).'.'.$image->getClientOriginalExtension();
            // $destinationPath = 'assets/userImage/imagePassport/';
            // $image->move($destinationPath, $imagePassport);

            // //if image available than delete old and upload new
            // $full_path = $destinationPath.$user_profile->imagePassport;
            // if(file_exists($full_path)){
            //     unlink($full_path);
            // }
        }else{
            // $imagePassport = $user_profile->imagePassport;
        }

        if($request->hasfile('userPhoto'))
        {
            $f = $request->userPhoto;
            $userPhoto = base64_encode(file_get_contents($f->getRealPath()));
            $input['userPhoto'] = $userPhoto;
        }
        $user_profile->update($input);
        return redirect()->route('user.profile')->with('success','Profile update successfully');
    }


    //User Balance
    public function userBalance(Request $request)
    {
        return view('user.balance');
    }

    public function anyDataUserBalance()
    {
        $user_id = Auth::user()->id;
        $model = UserBalance::query();
        $model->where('userID', '=' ,$user_id);
        return DataTables::eloquent($model)
            ->toJson();

    }

    //User Payment History
    public function userPaymentHistory(Request $request)
    {
        return view('user.payment_history');
    }

    public function anyDataUserPaymentHistory()
    {
        $user_id = Auth::user()->id;
        $model = UserTransaction::query();
        $model->where('userID', '=' ,$user_id);
        return DataTables::eloquent($model)
            ->toJson();
    }

    //User Verification
    public function userVerification(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_verification = UserVerification::where('userID','=',$user_id)->first();
        return view('user.verification',compact('user_verification'));
    }

    public function userMobileSMSSend(Request $request){
        $mobile_no = $request->mobile;
        $user = Auth::User();
        $UserVerification = UserVerification::where('userID','=',$user->id)->first();
        $UserVerification->mobileNumber = $mobile_no;
        $UserVerification->save();
        // echo '<pre>';
        // print_r($UserVerification);
        //exit;

        $msg = "OTP is: ".$UserVerification->smsCode;

        //  echo $_ENV['SMS_URL'];exit;
        $url = env('SMS_URL').env('SMS_PORT').env('SMS_URI').env('SMS_PARAM_USERNAME').'='.env('SMS_VALUE_USERNAME').'&'.env('SMS_PARAM_PASSWORD').'='.env('SMS_VALUE_PASSWORD').'&'.env('SMS_PARAM_NUMBER').'='.env('SMS_VALUE_NUMBER').'&'.env('SMS_PARAM_BODY').'='.rawurlencode($msg).'&'.env('SMS_PARAM_SENDER_ID').'='.env('SMS_VALUE_SENDER_ID').'&'.env('SMS_PARAM_UNICODE').'='.env('SMS_VALUE_UNICODE');
        // echo $url;
        // exit;

        // echo $this->sendSMS($url);
        // exit;
        return redirect()->route('user.verification')->with('success','OTP send successfully');
    }

    public function userMobileSMSVerification(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // exit;

        if(isset($request->resend)){
            $user = Auth::User();
            $UserVerification = UserVerification::where('userID','=',$user->id)->first();
            $mobile_no = $UserVerification->mobileNumber;
            $msg = "OTP is: ".$UserVerification->smsCode;

            //  echo $_ENV['SMS_URL'];exit;
            $url = env('SMS_URL').env('SMS_PORT').env('SMS_URI').env('SMS_PARAM_USERNAME').'='.env('SMS_VALUE_USERNAME').'&'.env('SMS_PARAM_PASSWORD').'='.env('SMS_VALUE_PASSWORD').'&'.env('SMS_PARAM_NUMBER').'='.env('SMS_VALUE_NUMBER').'&'.env('SMS_PARAM_BODY').'='.rawurlencode($msg).'&'.env('SMS_PARAM_SENDER_ID').'='.env('SMS_VALUE_SENDER_ID').'&'.env('SMS_PARAM_UNICODE').'='.env('SMS_VALUE_UNICODE');
            echo $this->sendSMS($url);
            return redirect()->route('user.verification')->with('success','OTP send successfully');
        }

        $otp = $request->otp;
        if($otp == ''){
            return redirect()->route('user.verification')->with('error','Please enter OTP.');
        }
        $user = Auth::User();
        $UserVerification = UserVerification::where('userID','=',$user->id)->where('smsCode','=',$otp)->first();
        if(!empty($UserVerification)){
            $UserVerification->smsVerified = '1';
            $UserVerification->smsVerifiedON = date('Y-m-d h:i:s');
            $UserVerification->save();
            return redirect()->route('user.verification')->with('success','Mobile verified successfully.');
        }else{
            return redirect()->route('user.verification')->with('error','OTP is wrong.');
        }
        
    }

    public function sendSMS($url)
    {   
        $c = curl_init(); 
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($c, CURLOPT_URL, $url); 
        $response = curl_exec($c); 
        return $response;
    }
}
