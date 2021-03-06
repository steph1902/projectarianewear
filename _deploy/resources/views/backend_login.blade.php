
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('css/backend-login.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Ariane Login Admin Dashboard</title>
</head>
<body>



        <div class="wrapper fadeInDown">
          <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
              <img src="{{asset('images/logoariane.jpg')}}" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            {{-- <form method="post" action=" {{action('BackendController@backendPostProduct')}} " enctype="multipart/form-data"> --}}
            <form method="POST" action="{{ action('BackendController@getBackPostLogin') }}">
                @csrf
              <input type="email" id="login" class="fadeIn second" name="email" placeholder="email">
              <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
              <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
              {{-- <a class="underlineHover" href="#">Forgot Password?</a> --}}
              @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
            </div>

          </div>
        </div>




</body>
</html>
