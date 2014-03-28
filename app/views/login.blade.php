<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="text/javascript" href="bootstrap.js" />
  <title>DSI Medical Services,Inc. Drug & Alcohol Program Management Services</title>
</head>
<body>
        <center>
        <h1 style="padding-left: 10px;">DSI Altlantic Maintainence Plant Form</h1><br/>  
        <div>
          <form class="form-inline" accept-charset="UTF-8" name="AMPlogin" action="{{url('login')}}" method="post">
            {{ Form::token() }}
            <div class="auth-form-header">
              <h2>Sign in</h2>
            </div>

            <div class="auth-form-body">
              <label for="login_field">Username</label><input autocapitalize="off" autofocus="autofocus" class="input-block" id="email" name="email" tabindex="1" type="text" required><br/>
              <label for="password">Password</label><input class="input-block" id="password" name="password" tabindex="2" type="password" required><br/>
              <label>Remember Me?&nbsp;&nbsp;</label><input name="remember" type="checkbox"/><br/>
              <button href="/" type="submit" class="btn btn-default">Login</button>
            </div>
          </form>
        </div>
        </center>
  </body>
  </head>
</html>
