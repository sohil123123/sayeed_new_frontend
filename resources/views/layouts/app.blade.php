<?php 
    //$warehouse = \App\UserProfile::where('subscriber_id','=',Auth::user()->id)->orderBy('location','ASC')->get();
    $user = Auth::user()->user_profile;
    $flag = false;
    if($user->name == '' || $user->dateOfBirth == '' || $user->gender == '' || $user->occupation == '' || $user->userType == '' || $user->address1 == '' || $user->address2 == '' || $user->city == '' || $user->country == '' || $user->permAddress1 == '' || $user->permAddress2 == '' || $user->permCity == '' || $user->permCountry == '' || $user->billingAdress == '' || $user->userPhoto == '' || $user->nationalID == '' || $user->imageFrontNationalID == '' || $user->imageBackNationalID == '' || $user->passportNO == '' || $user->imagePassport == '' || $user->fatherName == '' || $user->motherName == '' || $user->spouseName == ''){
        $flag = true;
    }
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/ui/nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/ui/drilldown.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>



    <script type="text/javascript" src="{{ asset('/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/custom.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('/assets/js/pages/dashboard.js') }}"></script> -->

    <script type="text/javascript" src="{{ asset('/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->
    @stack('css')
    <style type="text/css">
        .invalid-feedback{
            color: red;
        }
    </style>
    
</head>
<body>

    <!-- Main navbar -->
    <div class="navbar navbar-inverse bg-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">Your logo<!-- <img src="assets/images/logo_light.png" alt=""> --></a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">

            <!-- <p class="navbar-text"><span class="label bg-success-400">Online</span></p> -->

            <ul class="nav navbar-nav navbar-right">
                <!-- <li class="dropdown language-switch">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/images/flags/gb.png" class="position-left" alt="">
                        English
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="deutsch"><img src="assets/images/flags/de.png" alt=""> Deutsch</a></li>
                        <li><a class="ukrainian"><img src="assets/images/flags/ua.png" alt=""> Українська</a></li>
                        <li><a class="english"><img src="assets/images/flags/gb.png" alt=""> English</a></li>
                        <li><a class="espana"><img src="assets/images/flags/es.png" alt=""> España</a></li>
                        <li><a class="russian"><img src="assets/images/flags/ru.png" alt=""> Русский</a></li>
                    </ul>
                </li> -->

                

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/images/placeholder.jpg" alt="">
                        <span>{{ Auth::user()->email }}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ route('user.profile') }}"><i class="icon-user-plus"></i> My profile</a></li>
                        <!-- <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                        <li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li> -->
                        <li><a href="{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Second navbar -->
    <div class="navbar navbar-default" id="navbar-second">
        <ul class="nav navbar-nav no-border visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="navbar-second-toggle">
            <ul class="nav navbar-nav navbar-nav-material">
                <li class="dashboard"><a href="{{ route('home') }}"><i class="icon-display4 position-left"></i> Dashboard</a></li>


                <li class="my_profile dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-strategy position-left"></i> Profile <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu width-200">
                        <!-- <li class="dropdown-header">My Profile</li> -->
                        <li class="sub_my_profile"><a href="{{ route('user.profile') }}"><i class="icon-align-center-horizontal"></i> My Profile</a></li>
                        @if($flag)
                            <li class="sub_verification"><a href="{{ route('user.verification') }}"><i class="icon-align-center-horizontal"></i> Verification </a></li>
                        @endif
                        <!-- <li class="sub_user_balance"><a href="{{ route('user.balance') }}"><i class="icon-align-center-horizontal"></i> My Balance</a></li> -->
                        <!-- <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-grid2"></i> Columns</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header highlight">Options</li>
                                <li><a href="starters/1_col.html">One column</a></li>
                                <li><a href="starters/2_col.html">Two columns</a></li>
                                <li class="dropdown-submenu">
                                    <a href="#">Three columns</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-header highlight">Sidebar position</li>
                                        <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                                        <li><a href="starters/3_col_double.html">Double sidebars</a></li>
                                    </ul>
                                </li>
                                <li><a href="starters/4_col.html">Four columns</a></li>

                            </ul>
                        </li> -->
                        <!-- <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-paragraph-justify3"></i> Navbars</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header highlight">Fixed navbars</li>
                                <li><a href="starters/layout_navbar_fixed_main.html">Fixed main navbar</a></li>
                                <li><a href="starters/layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
                                <li><a href="starters/layout_navbar_fixed_both.html">Both navbars fixed</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="dropdown-header">Optional layouts</li>
                        <li><a href="starters/layout_boxed.html"><i class="icon-align-center-horizontal"></i> Fixed width</a></li>
                        <li><a href="starters/layout_sidebar_sticky.html"><i class="icon-flip-vertical3"></i> Sticky sidebar</a></li> -->
                    </ul>
                </li>
                <li class="user_balance"><a href="{{ route('user.balance') }}"><i class="icon-display4 position-left"></i> My Balance</a></li>
                <li class="user_payment_history"><a href="{{ route('user.payment_history') }}"><i class="icon-display4 position-left"></i> Payment History</a></li>
                
            </ul>

            <ul class="nav navbar-nav navbar-nav-material navbar-right">
                <li>
                    @if($flag)
                    <a href="{{ route('user.profile') }}">
                        <span class="label label-inline position-right bg-danger-400">Please complete your profile.</span>
                    </a>
                    @else
                    <a href="#">
                        <span class="label label-inline position-right bg-success-400">Your profile is completed.</span>
                    </a>
                    @endif
                </li>
            </ul>
            
        </div>
    </div>
    <!-- /second navbar -->

    @yield('content')
    


    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2018. <a href="#">Your company name</a> by <a href="http://www.friendsweb.in.co" target="_blank">FriendswebDeveloper</a>
    </div>
    <!-- /footer -->

</body>
</html>

@stack('js')
