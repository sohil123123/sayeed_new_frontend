@extends('layouts.app')

@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('.my_profile').addClass('active');
        $('.sub_my_profile').addClass('active');
    });
</script>
@endpush

@section('content')
<!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User</span> - Profile</h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- User profile -->
                <div class="row">
                    <div class="col-lg-12">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                              <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('error'))  
                            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
                              <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                {{Session::get('error')}}
                            </div>
                        @endif
                        <div class="tab-pane">

                            <!-- Profile info -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Profile information</h6>
                                    <!-- <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div> -->
                                </div>

                                <div class="panel-body">
                                    <fieldset>
                                    <form action="{{ route('store.user.profile') }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <legend>Personal Details:</legend>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">Name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user_profile->name}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">Date of Birth</label>
                                                    <input type="text" name="dateOfBirth" class="form-control date" value="{{ $user_profile->dateOfBirth}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">Gender</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender" class="styled" value="Male" @if( $user_profile->gender == 'Male') checked @endif>
                                                        Male
                                                    </label>

                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender" class="styled" value="Female" @if( $user_profile->gender == 'Female') checked @endif>
                                                        Female
                                                    </label>

                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender" class="styled" value="Other" @if( $user_profile->gender == 'Other') checked @endif>
                                                        Other
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">Occupation</label>
                                                    <input type="text" name="occupation" class="form-control" placeholder="Occupation" value="{{ $user_profile->occupation}}">
                                                </div>
                                            </div>
                                        </div>

                                        <legend>Additional Personal Details:</legend>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">PermAddress1</label>
                                                    <input type="text" name="permAddress1" class="form-control" placeholder="PermAddress1" value="{{ $user_profile->permAddress1}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">PermAddress2</label>
                                                    <input type="text" name="permAddress2" class="form-control" placeholder="PermAddress2" value="{{ $user_profile->permAddress2}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">PermCity</label>
                                                    <input type="text" name="permCity" class="form-control" placeholder="PermCity" value="{{ $user_profile->permCity}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">PermCountry</label>
                                                    <input type="text" name="permCountry" class="form-control" placeholder="PermCountry" value="{{ $user_profile->permCountry}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">MotherName</label>
                                                    <input type="text" name="motherName" class="form-control" placeholder="MotherName" value="{{ $user_profile->motherName}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">FatherName</label>
                                                    <input type="text" name="fatherName" class="form-control" placeholder="FatherName" value="{{ $user_profile->fatherName}}">
                                                </div>
                                            </div>
                                        </div>

                                        <legend>Identifications:</legend>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">PassportNO</label>
                                                    <input type="text" name="passportNO" class="form-control" placeholder="PassportNO" value="{{ $user_profile->passportNO}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">ImagePassport</label>
                                                    <input type="file" name="imagePassport" class="file-styled">
                                                    <img src="data:image/bmp;base64,{{$user_profile->imagePassport}}" width="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">NationalID</label>
                                                    <input type="text" name="nationalID" class="form-control" placeholder="NationalID" value="{{ $user_profile->nationalID}}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">ImageFrontNationalID</label>
                                                    <input type="file" name="imageFrontNationalID" class="file-styled">
                                                    <!-- <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span> -->
                                                    <img src="data:image/bmp;base64,{{$user_profile->imageFrontNationalID}}" width="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">ImageBackNationalID</label>
                                                    <input type="file" name="imageBackNationalID" class="file-styled">
                                                    <img src="data:image/bmp;base64,{{$user_profile->imageBackNationalID}}" width="100">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">SpouseName</label>
                                                    <input type="text" name="spouseName" class="form-control" placeholder="SpouseName" value="{{ $user_profile->spouseName}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">Address1</label>
                                                    <input type="text" name="address1" class="form-control" placeholder="Address1" value="{{ $user_profile->address1}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">Address2</label>
                                                    <input type="text" name="address2" class="form-control" placeholder="Address2" value="{{ $user_profile->address2}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">City</label>
                                                    <input type="text" name="city" class="form-control" placeholder="City" value="{{ $user_profile->city}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">Country</label>
                                                    <input type="text" name="country" class="form-control" placeholder="Country" value="{{ $user_profile->country}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">BillingAdress</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="billingAdress" class="styled" value="Present" @if( $user_profile->billingAdress == 'Present') checked @endif>
                                                        Present
                                                    </label>

                                                    <label class="radio-inline">
                                                        <input type="radio" name="billingAdress" class="styled" value="Permanent" @if( $user_profile->billingAdress == 'Permanent') checked @endif>
                                                        Permanent
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">UserType</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="userType" class="styled" value="Individual" @if( $user_profile->userType == 'Individual') checked @endif>
                                                        Individual
                                                    </label>

                                                    <label class="radio-inline">
                                                        <input type="radio" name="userType" class="styled" value="Business" @if( $user_profile->userType == 'Business') checked @endif>
                                                        Business
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="display-block text-semibold">UserPhoto</label>
                                                    <input type="file" name="userPhoto" class="file-styled">
                                                    <img src="data:image/bmp;base64,{{$user_profile->userPhoto}}" width="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </form>
                                    </fieldset>
                                </div>
                            </div>
                            <!-- /profile info -->


                            <!-- Account settings -->
                            <!-- <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Account settings</h6>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <form action="#">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Username</label>
                                                    <input type="text" value="Kopyov" readonly="readonly" class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Current password</label>
                                                    <input type="password" value="password" readonly="readonly" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>New password</label>
                                                    <input type="password" placeholder="Enter new password" class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Repeat password</label>
                                                    <input type="password" placeholder="Repeat new password" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Profile visibility</label>

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="visibility" class="styled" checked="checked">
                                                            Visible to everyone
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="visibility" class="styled">
                                                            Visible to friends only
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="visibility" class="styled">
                                                            Visible to my connections only
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="visibility" class="styled">
                                                            Visible to my colleagues only
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Notifications</label>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="styled" checked="checked">
                                                            Password expiration notification
                                                        </label>
                                                    </div>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="styled" checked="checked">
                                                            New message notification
                                                        </label>
                                                    </div>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="styled" checked="checked">
                                                            New task notification
                                                        </label>
                                                    </div>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="styled">
                                                            New contact request notification
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                            <!-- /account settings -->

                        </div>
                    </div>

                    
                </div>
                <!-- /user profile -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
@endsection
