<!DOCTYPE html>
<html>
<head>
<title>Login|BIA</title>
 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
 
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-lg-6">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <h3>Login</h3>
               <form action="{{url('post-login')}}" method="POST" id="loginForm">
                 {{ csrf_field() }}
                 @if(Session::has('message'))
                 <div class="alert">{{Session::get('message')}}</div>
                 @endif
                <div class="form-label-group">
                  <input type="text" id="inputContactNumber" name="contact_number" class="form-control" placeholder="Enter Contact Number" autofocus>
                  <label for="inputContactNumber">Contact</label>
                </div> 
                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                  <label for="inputPassword">Password</label>
                </div>
 
                <button class="btn btn-lg btn-primary btn-block btn-login mb-2" type="submit">Log In</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
 
</body>
</html>