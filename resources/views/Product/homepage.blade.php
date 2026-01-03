<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}" />
  </head>

  <body>
    
    <header class="header">
        <div class="container-header">
          
          <!-- The "guest" part is only visible if you arent authenticated. -->
          @guest
          <a class="input-typebutton" href="{{route('show.login')}}">Log In</a>
          <a class="input-typebutton" href="{{route('show.register')}}">Register Account</a>
          @endguest

          <!-- The "auth" part is only visible if you are authenticated. -->
          @auth
          <form action="{{route('try.logout')}}" method="POST">
            @csrf
            <button class="input-typebutton" >Log Out</button>
          </form>
          <p class="text">Hi There, {{strtoupper(Auth::user()->name)}}</p>
          @endauth

        </div>
    </header>

    <main>
        <div class="container-main">
            <a class="input-typebutton" href="{{route('product.index')}}">Go To Index</a>
        </div>
    </main>

    <footer>
        <div class="container-footer">
            
        </div>
    </footer>

  </body>
</html>
