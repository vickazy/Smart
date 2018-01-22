<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Login Area</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ URL::to('node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="{{URL::to('node_modules/toastr/build/toastr.min.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{ URL::to('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::to('admin/css/style-responsive.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="login-page">
      <div class="container">
        <div class="form-login">
          <h2 class="form-login-heading">Login Area <i class="fa fa-user"></i></h2>
          <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Admin</a></li>
              <li role="presentation"><a href="#pengurus" aria-controls="pengurus" role="tab" data-toggle="tab">Pengurus</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ketua Prodi</a></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Guru</a></li>
              <li role="presentation"><a href="#berita" aria-controls="berita" role="tab" data-toggle="tab">Berita</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
                <form action="{{ route('postLoginAdmin') }}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="level" value="admin">
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
              <div role="tabpanel" class="tab-pane" id="pengurus">
                <form action="{{ route('postLoginAdmin') }}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="level" value="pengurus">
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
              <div role="tabpanel" class="tab-pane" id="profile">
                <form action="{{ route('postLoginAdmin') }}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="level" value="KProdi">
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
              <div role="tabpanel" class="tab-pane" id="messages">
                <form action="{{ route('postLoginAdmin') }}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="level" value="guru">
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
              <div role="tabpanel" class="tab-pane" id="berita">
                <form action="{{ route('postLoginAdmin') }}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="level" value="Berita">
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
          </div>
        </div>
      </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ URL::to('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::to('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{URL::to('admin/js/jquery.backstretch.min.js')}}"></script>
    {{-- toastr js --}}
    <script src="{{URL::to('node_modules/toastr/toastr.js')}}" charset="utf-8"></script>
    <script>
    $.backstretch("https://images.pexels.com/photos/373488/pexels-photo-373488.jpeg?w=940&h=650&auto=compress&cs=tinysrgb", {speed: 500});
    </script>
    @if (Session::has('denied'))
    <script type="text/javascript">
    $(document).ready(function() {
    toastr.error('Access Denied', '{{Session::get('denied')}}', {timeOut: 5000});
    });
    </script>
    @endif
  </body>
</html>