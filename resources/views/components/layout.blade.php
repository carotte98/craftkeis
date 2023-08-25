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
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    {{-- AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- tailwind css --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: "#F4A051",
                        onhover: "#E5A66C",
                        background: "#D9D9D9",
                        buttons : "#C3C3C3",
                        disabled : "#4f4f4f",
                        bgsec : "#676666",
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
    <nav class="w-3/4 mx-auto flex flex-col items-center">
        {{-- top section of navbar --}}
        <section class="w-full dropshadow flex justify-center h-20 bg-background rounded-b-lg"> 
            <div class="flex space-x-6 mr-6 items-center grid grid-cols-3 w-11/12 gap-x-52">
                {{-- Col 1 --}}
                <div class="flex"> 
                    {{-- Search bar --}}
                    @include('partials._search')
                </div>

                
                <div class="w-full flex justify-center">
                    <a href="/" class="customLogo">Craftkeis</a>
                </div>
                
                <div class="w-full flex justify-evenly space-x-2">
                        <a href="/services/manage" class="text-center text-lg h-8 w-24 text-black hover:text-white rounded-lg bg-buttons hover:bg-onhover">Services</a>

                    {{-- language select --}}
                    {{-- <a href="" class="text-center text-lg h-8 w-24 text-black rounded-lg bg-buttons hover:text-white hover:bg-onhover"><i class="fas fa-globe"></i></a> --}}

                    {{-- auth directive only shows the elements when logged in --}}
                    @auth 
                        <div class="text-center text-lg h-8 w-24 text-black hover:text-white rounded-lg bg-buttons hover:bg-onhover">
                            <a href="../../users/{{auth()->user()->id}}">Account</a>
                        </div>
                        {{-- logout button --}}
                        <form class="inline" action="/logout" method="post">
                            @csrf
                            <button class="text-center text-lg h-8 w-24 text-black rounded-lg bg-buttons hover:bg-onhover">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                        </form>
                        {{-- else when not logged in --}}
                        @else
                        <span class="text-center text-lg h-8 w-24 text-text-black rounded-lg bg-buttons hover:bg-onhover">
                            <a href="/login" class="hover:text-white">Login</a>
                        </span>
                        <span class="text-center text-lg h-8 w-24 text-white rounded-lg bg-accent hover:bg-onhover">
                            <a href="/register" class="" >Register</a>
                        </span>
                    @endauth
                </div>

            </div>
        </section>

        {{-- categories list --}}
        <section class="flex w-2/3 h-14 justify-center bg-background rounded-b-lg dropshadowCat">
            <ul class="flex space-x-2 mr-6 h-11 w-11/12 justify-center text-base text-center align-middle">
                <li class="bg-buttons hover:bg-onhover w-1/6 p-1 pt-2 rounded-b-md"><a href="?category_id=1">3D Modelling</a></li>
                <li class="bg-buttons hover:bg-onhover w-1/6 p-1 pt-2 rounded-b-md"><a href="?category_id=2">2D Illustration</a></li>
                <li class="bg-buttons hover:bg-onhover w-1/6 p-1 pt-2 rounded-b-md"><a href="?category_id=3">Painting</a></li>
                <li class="bg-buttons hover:bg-onhover w-1/6 p-1 pt-2 rounded-b-md"><a href="?category_id=4">SFX</a></li>
                <li class="bg-buttons hover:bg-onhover w-1/6 p-1 pt-2 rounded-b-md"><a href="?category_id=5">Wood Sculpting</a></li>
                <li class="bg-buttons hover:bg-onhover w-1/6 p-1 pt-2 rounded-b-md"><a href="?category_id=6">Logo Design</a></li>
            </ul>
        </section>
    </nav>

    <main class="pt-20">

        {{-- page contents --}}
        {{$slot}}
        
    </main>

    {{-- footer --}}
    <footer class="w-full flex flex-col items-center justify-center mt-10">
        {{-- top part --}}
        <section class="bg-background w-1/6 rounded-t-lg  dropshadowF">
            <div class="w-full flex justify-center p-2">
                <a href="/" class="customLogo">Craftkeis</a>
            </div>
        </section>
        <section class="flex flex-col bg-background w-full pt-5 dropshadowFB">
            
            <hr class="border-accent w-3/4 mx-auto my-2">
            {{-- logo and icons on left --}}
            <div class="flex flex-row justify-center w-full mt-4">
                
    
                {{-- links from website --}}
                <div class="flex flex-row gap-24 mx-64">
                    <a href="/about">About Us</a>
                    <a href="/contact">Contact</a>
                </div>

                <div class="justify-center">
                
                    {{-- social media icons --}}    
                    <div class="text-xl space-x-2">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-linkedin"></i>
                    </div> 
                </div>

                <div class="flex flex-row gap-24 mx-64">
                    <a href="/services">Categories</a>
                
                    @auth
                    
                        <a href="../../users/{{auth()->user()->id}}">Account</a>
                    @else
                        
                        <p class="text-disabled">Account</p>
                    
                    @endauth
                </div>
            </div>

        </section>

        {{-- bootom copyright part --}}
        <section class="flex justify-center bg-background pt-4 space-x-6 space-y-2 w-full">
            <hr>
            <p class="ml-2">Copyright &copy; 2023</p>          
            <br>
            <a href="/login-as-user/3" class="btn btn-primary">
                Login as Maus katti
            </a>              
            <a href="/login-as-user/1" class="btn btn-primary">
                Login as John Doe
            </a>              
        </section>
    </footer>

</body>
</html>    