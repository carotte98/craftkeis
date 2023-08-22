{{-- blade is a templating library --}}
{{-- blade directive --}}
{{-- this layout will be html with css --}}


    {{-- this tells blade that content should be here
        gets the content from listings.blade.php --}}
    {{-- @yield('content') --}}

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
                            accent: "blue",
                            background: "skyblue",
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
        <nav class="top-0 left-0 w-full flex-col items-center justify-start bg-background ">
            <section class="flex">
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="/">
                        {{-- placeholder logo --}}
                        <img class="w-24 logo" src="{{ asset('images/logo.svg') }}" alt="LOGO" />
                    </a>
                </li>
    
                {{-- Search bar --}}
                @include('partials._search')
    
                <li>
                    <a href="">Categories</a>
                </li>
                <li>
                    <i class="fas fa-globe"></i>
                    <a href="">EN</a>
                </li>
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
                    <li>
                        <a href="/login" class="hover:text-accent">Login</a>
                    </li>
                    <li>
                        <a href="/register" class="hover:text-accent">Register</a>
                    </li>
                @endauth
            </ul>
        </section>
        <section>

            <hr>
            {{-- categories list --}}
            <ul class="flex space-x-6 mr-6">
                <li>Paintings</li>
                <li>3D Art</li>
            </ul>
        </section>
        </nav>
    
        <main>

            {{-- page contents --}}
            {{$slot}}
            
        </main>
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-background text-white h-24 mt-24 opacity-90 md:justify-center">
    
            <a href="/">
                {{-- placeholder logo --}}
                <img class="w-24 logo" src="{{ asset('images/logo.svg') }}" alt="LOGO" />
            </a>
            <div class="flex flex-col">
                <a href="">About Us</a>
                <a href="">Contact</a>
            </div>
            <div class="flex flex-col">
                <a href="">Categories</a>
            </div>
            <div class="flex flex-col">
                <a href="">Account</a>
            </div>
            {{-- social media icons --}}
            <p class="ml-2">Copyright &copy; 2023</p>
    
        </footer>
    </body>
    
    </html>    