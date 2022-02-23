<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') BookStore - life bana lo</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"></head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-3">
        <div class="container">
            <a href="{{ route('public.home') }}" class="navbar-brand">BookStore</a>

            <form action="{{ route("public.search") }}" class="d-flex">
                <input type="search" size="60" placeholder="Search By ISBN, title, author" name="search" class="form-control">
                <input type="submit" value="Go" class="btn btn-dark">
            </form>

            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('public.home') }}" class="nav-link">Home</a></li>

                <li class="nav-item"><a href="{{ route('public.cart') }}" class="nav-link">Cart</a></li>
                
                @auth
                    <li class="nav-item"><a href="" class="nav-link">Profile</a></li>
                    <li class="nav-item"><a href="" class="nav-link">My Order</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit"  class="nav-link bg-transparent border-0" value="Logout">
                        </form>
                    </li>     
                @endauth
               

                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>     
                @endguest
               
            </ul>
        </div>
    </nav>
    
    @section('content')
        
    @show
</body>
</html>