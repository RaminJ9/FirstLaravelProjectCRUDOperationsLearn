<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogingPage</title>
    <link rel="stylesheet" href="{{asset('css/loginpage.css')}}">
</head>
<body>
    
    
    <main id="container">
        <div>
            <form action="{{route('try.login')}}" method="POST">
                @csrf

                <h2 class="text" >Log In to your account</h2>
                <div >
                <label class="text" for="email">Email:</label>
                <input 
                type="email" 
                name="email" 
                required
                value= "{{old('email')}}" 
                > <!-- the value part does it so that when u get an error, the email will still stay there so u dont have to re-write it -->
                </div>

                <div >
                <label class="text" for="password">Password:</label>
                <input 
                type="password" 
                name="password" 
                required>
                </div>

                <input type="submit">


            </form>
        </div>
    </main>



</body>
</html>