@extends('layouts.app')

@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('.my_profile').addClass('active');
        $('.sub_verification').addClass('active');
    });
</script>
@endpush

@section('content')
<!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User</span> - Verification</h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Verification</li>
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


                <!-- Dashboard content -->
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
                        <!-- Accordion with different panel styling -->
                        <h6 class="content-group text-semibold">Verification</h6>

                        <div class="panel-group" id="accordion-styled">
                            <div class="panel">
                                <div class="panel-heading bg-teal">
                                    <h6 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group1">Email Verification</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        Email Verification is completed.
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading @if($user_verification->smsVerified == 0) bg-danger @else bg-teal @endif">
                                    <h6 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group2">SMS Verification</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        @if($user_verification->smsVerified == 0)
                                            <!-- Click on SMS Verification -->
                                            @if($user_verification->mobileNumber == null || $user_verification->mobileNumber == '')
                                                <form action="{{ route('user.mobile.sms.send') }}" method="post" class="sms_send_form">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="display-block text-semibold">Mobile No.</label>
                                                                <input type="text" name="mobile" class="form-control" placeholder="Mobile" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary legitRipple">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                                    </div>
                                                </form>
                                            @else
                                                <form action="{{ route('user.mobile.sms.verification') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="display-block text-semibold">OTP</label>
                                                                <input type="text" name="otp" class="form-control" placeholder="OTP">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary legitRipple">Submit</button>
                                                        <input type="submit" class="btn btn-primary legitRipple" name="resend" value="Resend">
                                                    </div>
                                                </form>
                                            @endif
                                            
                                        @else
                                            SMS Verification is completed.

                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="panel">
                                <div class="panel-heading bg-primary">
                                    <h6 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group3">Accordion Item #3</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it.
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- /accordion with different panel styling -->
                    </div>
                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
@endsection
