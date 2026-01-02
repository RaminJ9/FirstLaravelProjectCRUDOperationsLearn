<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/registerpage.css')}}">
</head>
<body>
    
 <main id="container">
        
        <div>
            <form action="{{route('try.register')}}" method="POST">
                @csrf
                
                @if($errors->any())
                <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                </div>
                @endif

                <h2 class="text">Register account</h2>
                <div>
                <label class="text" for="name">Name:</label>
                <input 
                type="text" 
                name="name" 
                required
                value= "{{old('name')}}" 
                >
                </div>

                <div>
                <label class="text" for="email">Email:</label>
                <input 
                type="email" 
                name="email" 
                required
                value= "{{old('email')}}" 
                > <!-- the value part does it so that when u get an error, the email will still stay there so u dont have to re-write it -->
                </div>

                <div>
                <label class="text" for="password">Password:</label>
                <input 
                type="password" 
                name="password" 
                required
                >
                </div>

                <div>
                <label class="text" for="password_confirmation">Confirm Password:</label>
                <input 
                type="password" 
                name="password_confirmation" 
                required
                >
                </div>


                <input type="submit">



                
            </form>
        </div>
    </main>

</body>
</html>