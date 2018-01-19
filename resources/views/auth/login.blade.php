<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <body>
<div class="login-form">

 <div class="container">
    <section id="content">
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                         <center> <img src="img/logo.png" class="img-responsive" alt=""></center>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="Alamat Email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
  <div class="col-md-6">                      

</div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="log-btn">
                                    Login


    </section><!-- content -->

</div><!-- container -->


     
    
   </div>
</body>
  
    <script src="js/index.js"></script>

</body>
</html>