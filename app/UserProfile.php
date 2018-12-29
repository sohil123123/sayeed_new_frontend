<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'userprofile';
    // public $timestamps = false;

    protected $fillable = [
        'id', 'userID', 'name', 'dateOfBirth', 'gender', 'occupation', 'userType', 'billingType', 'address1', 'address2', 'city', 'country', 'permAddress1', 'permAddress2', 'permCity', 'permCountry', 'billingAdress', 'mobileNumber', 'nationalID', 'imageFrontNationalID', 'imageBackNationalID', 'passportNO', 'imagePassport', 'fatherName', 'motherName', 'spouseName','userPhoto'
    ];
}
