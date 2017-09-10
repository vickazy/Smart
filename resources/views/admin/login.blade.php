<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Login Admin PPDB</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ URL::to('node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ URL::to('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::to('admin/css/style-responsive.css') }}" rel="stylesheet">

  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">

		      <form class="form-login" action="{{ route('postLoginAdmin') }}" method="post">
            {{csrf_field()}}
		        <h2 class="form-login-heading">Login Admin <i class="fa fa-user"></i></h2>
		        <div class="login-wrap">
              @if (Session::has('error'))
                <div class="alert alert-danger">
                  <span><strong>{{ Session::get('error') }}</strong></span>
                </div>
              @endif
              <div class="form-group{{ $errors->has('username') ? ' has-error' : ' ' }}">
                <input type="text" name="username" class="form-control" placeholder="username" autofocus>
                @if ($errors->has('username'))
                  <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : ' ' }}">
                <input type="password" name="password" class="form-control" placeholder="Password">
                @if ($errors->has('password'))
                  <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
              </div>
		            <label class="checkbox">

		            </label>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Log In</button>
		            <hr>


		            <div class="registration">
		                Developed with <i class="fa fa-heart" style="color:red"></i> By <a href="http://easytech.co.id/">EasyTech</a>
		            </div>

		        </div>

		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ URL::to('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::to('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{URL::to('admin/js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("https://images.pexels.com/photos/373488/pexels-photo-373488.jpeg?w=940&h=650&auto=compress&cs=tinysrgb", {speed: 500});
    </script>


  </body>
</html>
