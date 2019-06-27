<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/core.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('backend/global_assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/core/libraries/jquery.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('backend/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/notifications/noty.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/login_validation.js')}}"></script>

    <!-- /theme JS files -->

</head>

<body class="login-container login-cover">

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content pb-20">

                    <!-- Form with validation -->
                    <form action="{{ route('admin.login') }}" class="form-validate" method="post" id="login">
                    @csrf
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" id="email" required="required" value="{{ old('email') }}">
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
                                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" id="password" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                  @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group login-options">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" class="styled" checked="checked">
                                            Remember
                                        </label>
                                    </div>
                                     @if (Route::has('password.request'))
                                    <div class="col-sm-6 text-right">
                                        <a href="{{ route('password.request') }}">Forgot password?</a>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                            </div>




                        </div>
                    </form>
                    <!-- /form with validation -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
<script>
 $('#login').on('submit', function(e){
   e.preventDefault();
   $(".ajax_error").remove();
   var form = $(this).serialize();
   var url = $(this).attr('action');

              $.ajax({
              method:'POST',
              url: url,
              data :form,
              dateType: 'json',
              success: function(data){
              new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: data.message,
                        type: 'success'
            }).show();
              setTimeout(function(){

              window.location.href=data.goto;
              },2500);
               },
               error:function (data) {
                var jsonValue = $.parseJSON(data.responseText);
                const errors = jsonValue.errors;
                var i = 0;
                $.each(errors, function(key, value) {
                    const first_item = Object.keys(errors)[i]
                    const message = errors[first_item][0]
                    $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                     new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: value,
                        type: 'error'
                    }).show();
                    i++;
                });
               }

            });
  });


</script>
</body>
</html>


