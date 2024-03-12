<!--start of login page -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login form</title>
  <!-- bootstrap link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- custom css link -->
  <link rel="stylesheet" href="../css/app.css">
</head>

<body>
  <!--start of header section -->
  <header>
    <div class="container">
      <h1>Login Here</h1>
    </div>
  </header>
  <!--end of header section -->
  <!-- start of main -->
  <main>
    <!-- start of container    -->
    <div class="container">
      <!-- start of login from -->
      <form method="post" action="user_login">
        <!-- show message for success or faliure in logging in -->
        @if(Session::has('success'))
        <!-- show message for success in login -->
        <div class="alert alert-success">{{Session::get('success')}}</div>

        @endif
        @if(Session::has('fail'))
        <!-- show message for faliure in login -->
        <div class="alert alert-danger">{{Session::get('fail')}}</div>

        @endif
        <!-- csrf for security purpose -->
        @csrf
        <!-- start of email address field block -->
        <div class="form-group">
          <label for="user_email_id">Email address</label>
          <input type="text" name="user_email_id" class="form-control" value="{{old('user_email_id')}}" id="user_email_id" placeholder="Enter email">
          <!-- displays error message regarding user email id if it occurs-->
          <span>@error('user_email_id'){{$message}}@enderror</span>
        </div>
        <!-- end of email address field block -->
        <!-- start of user password field block -->
        <div class="form-group">
          <label for="user_password">Password</label>
          <input type="password" name="user_password" class="form-control" id="user_password" value="{{old('user_password')}}" placeholder="Password">
          <!-- displays error message regarding user password if it occurs -->
          <span>@error('user_password'){{$message}}@enderror</span>
        </div>
        <!-- end of user password field block -->
        <!-- submit button -->
        <button type="submit" class="btn btn-primary">Submit</button>
        <!-- link to login page -->
        <div class="container"><a href="register">New User !! register here</a></div>
      </form>
            <!-- end of login from -->
    </div>
    <!-- end of container -->
  </main>
  <!-- end of main -->
</body>
</html>
<!-- end of login form -->