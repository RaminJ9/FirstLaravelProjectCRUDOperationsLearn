<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}" />
  </head>

  <body>
    
    <header class="header"  >
        <div class="container-header">
            <a href=""></a>
        </div>
    </header>

    <main>
        <div class="container-main">
            <a class="input-typebutton" href="{{route('product.index')}}">Go To Index</a>
            <a class="input-typebutton" href="{{route('show.login')}}">Log In</a>
            <a class="input-typebutton" href="{{route('show.register')}}">Register Account</a>
            <form action="{{route('try.logout')}}" method="POST">
              @csrf
              <button class="input-typebutton" >Log Out</button>
            </form>
        </div>
    </main>

    <footer>
        <div class="container-footer">
            
        </div>
    </footer>

  </body>
</html>
