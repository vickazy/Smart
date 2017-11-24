<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Selamat Datang di PPDB Online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{ URL::to('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('node_modules/font-awesome/css/font-awesome.min.css') }}">
  </head>
  <style media="screen">
  body {
    background: url(https://images.pexels.com/photos/207691/pexels-photo-207691.jpeg?w=940&h=650&auto=compress&cs=tinysrgb) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    font-family: 'Lato', sans-serif;
  }
  h1 {
    color: #fff;
  }
  .kotak {
    background-color: rgba(56,53,85, 0.9);
    text-align: center;
    height: 350px;
    margin-top: 80px;
  }
  .kotak > h1 {
    padding-top: 90px;
  }
  .kotak a {
    margin-top: 30px;
  }
  .kotak p {
    color: #fff;
    padding-top: 50px;
  }
  .daftar {
    padding: 20px 35px;
  }
  </style>
  <body>

    <div class="container">
      <div class="col-lg-8 col-md-8 col-xs-12 col-lg-offset-2">
        <div class="kotak">
          <h1>Selamat datang calon peserta didik baru</h1>
          <a href="{{ route('getPpdb') }}" class="btn btn-lg btn-primary daftar">Daftar Sekarang  <i class="fa fa-edit fa-2x"></i></a>
          <p>Powered By <a href="http://smart.easytech.co.id/"><img src="http://smart.easytech.co.id/images/logoe.png" alt=""></a></p>
        </div>
      </div>
    </div>

    <script src="{{ URL::to('node_modules/jquery/dist/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ URL::to('node_modules/bootstrap/dist/js/bootstrap.min.js') }}" charset="utf-8"></script>
  </body>
</html>
