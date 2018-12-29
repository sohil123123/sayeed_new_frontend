<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

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

    <script type="text/javascript" src="{{ asset('/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->

    <style type="text/css">
        .invalid-feedback{
            color: red;
        }
    </style>

</head>

<body class="login-container login-cover">

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Form with validation -->
                <form method="POST" action="{{ route('register') }}" class="register-form-validate">
                     @csrf
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                            <h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="password" type="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" required placeholder="Confirm Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
                        </div>

                        <div class="content-divider text-muted form-group"><span>You have an account?</span></div>
                        <a href="{{ route('login') }}" class="btn btn-default btn-block content-group">Sign in</a>
                        <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                    </div>
                </form>
                <!-- /form with validation -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->


    <!-- Footer -->
    <div class="footer text-white text-center">
        &copy; 2018. <a href="#">Your company name</a> by <a href="http://www.friendsweb.in.co" target="_blank">FriendswebDeveloper</a>
    </div>
    <!-- /footer -->

</body>
</html>
