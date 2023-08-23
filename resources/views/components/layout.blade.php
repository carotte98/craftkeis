<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    {{-- fontawesome icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- tailwind css --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: "green",
                        onhover: "lightgreen",
                        background: "skyblue",
                    },
                    borderRadius: {
                        'lg': '10px',
                    },
                },
            },
        };
    </script>
    <title>Craftkéis - Find Artists</title>
</head>

<body class="mb-48">
    {{-- message box --}}
    {{-- <x-flash-message/>  --}}

    {{-- navbar --}}
    <nav class="top-0 left-0 fixed w-full flex flex-col justify-start bg-background ">
        {{-- top section of navbar --}}
        <section class="flex"> 
        <div class="flex space-x-6 mr-6 items-center">
            <div class="flex">
                <a href="/">
                    {{-- placeholder logo --}}
                    <img class="w-24 logo" src="{{ asset('images/logo.svg') }}" alt="LOGO" />
                </a>
                {{-- Search bar --}}
                @include('partials._search')
            </div>

            <a href="/services">Services</a>

            {{-- language select --}}
            <a href=""><i class="fas fa-globe"></i>EN</a>

            {{-- auth directive only shows the elements when logged in --}}
            @auth 
                <span class="font-bold uppercase">
                    {{-- to access logged user name, we need to use the auth() helper --}}
                    Welcome {{auth()->user()->name}}
                    {{-- user() is the user object --}}
                </span>
                {{-- logout button --}}
                <form class="inline" action="/logout" method="post">
                    @csrf
                    <button>
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
                {{-- else when not logged in --}}
                @else
                <span class="text-lg">
                    <a href="/login" class="hover:text-accent">Login</a>
                </span>
                <span class="text-center text-lg h-8 w-20 text-white rounded-lg bg-accent hover:bg-onhover">
                    <a href="/register" class="" >Register</a>
                </span>
            @endauth

        </div>
    </section>

    {{-- categories list --}}
    <section class="nav-categories">
        <hr>
        <ul class="flex space-x-6 mr-6">
            <li><a href="?category_id=1">3D Modelling</a></li>
            <li><a href="?category_id=2">2D Illustration</a></li>
            <li><a href="?category_id=3">Painting</a></li>
            <li><a href="?category_id=4">SFX</a></li>
            <li><a href="?category_id=5">Wood Sculpting</a></li>
            <li><a href="?category_id=6">Logo Design</a></li>
        </ul>
    </section>
    </nav>

    <main class="pt-20">

        {{-- page contents --}}
        {{$slot}}
        
    </main>

    {{-- footer --}}
    <footer class="fixed bottom-0 left-0 w-full flex flex-col items-center justify-start bg-background text-white">
        {{-- top part --}}
        <section class="flex space-x-6 space-y-2">
            {{-- logo and icons on left --}}
            <div class="justify-start">
                <a href="/">
                    {{-- placeholder logo --}}
                    <img class="logo" src="{{ asset('images/logo.svg') }}" alt="LOGO" />
                </a>
                {{-- social media icons --}}    
                <div class="text-xl space-x-2">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin"></i>
                </div> 
            </div>

            {{-- links from website --}}
            <div class="flex flex-col">
                <a href="/about">About Us</a>
                <a href="/contact">Contact</a>
            </div>
            <div class="flex flex-col">
                <a href="/services">Categories</a>
            </div>
            <div class="flex flex-col">
                <a href="users/manage">Account</a>
            </div>

        </section>

        {{-- bootom copyright part --}}
        <section class="space-x-6 space-y-2">
            <hr>
            <p class="ml-2">Copyright &copy; 2023</p>          
            <br>  
        </section>
    </footer>

</body>
</html>    