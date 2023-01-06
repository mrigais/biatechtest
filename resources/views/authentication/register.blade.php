<!DOCTYPE html>
<html>
<head>
<title>Register|BIA</title>
 
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
    <div class="col-md-8">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8">
              <h3>Register</h3>
               <form action="{{url('post-register')}}" method="POST" id="registrationForm">
                 {{ csrf_field() }}
                <div class="form-label-group">
                  <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" autofocus>
                  <label for="inputName">Name</label>
                  @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div> 

                <div class="form-label-group">
                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" >
                  <label for="inputEmail">Email address</label>
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div> 

                <div class="form-label-group">
                  <input type="contact" name="contact_number" id="inputContact" class="form-control" placeholder="Contact Number" >
                  <label for="inputContact">Contact Number</label>
                  @if ($errors->has('contact_number'))
                  <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                  @endif
                </div> 
 
                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                  <label for="inputPassword">Password</label>
                  @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                </div>
 
                <button class="btn btn-lg btn-primary btn-block btn-register" type="submit">Sign Up</button>
                <div class="text-center">Already have an account?
                  <a class="small" href="{{url('login')}}">Log In</a></div>
              </form>
            </div>
          </div>
    </div>
  </div>
</div>
 
</body>
</html>