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
    @vite('resources/css/app.css')
    <script src="{{ asset('js/deleteBtn.js') }}"></script>
    <script>
       
        document.addEventListener('DOMContentLoaded', function() {
            const scrollToTopButton = document.querySelector(".scrollToTopButton");
            // // Show or hide the button based on the scroll position
            window.addEventListener("scroll", () => {
                if (window.pageYOffset > 100) {
                    scrollToTopButton.classList.add("show");
                } else {
                    scrollToTopButton.classList.remove("show");
                }
            });
            // // Scroll to the top of the page when the button is clicked
            scrollToTopButton.addEventListener("click", () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        });
    </script>

    <style>
        /* body {
            min-height: fit-content;
        } */

        
    </style>
    <title>Craftkéis - Find Artists</title>
</head>

<body>
    {{-- Creating session variables on every page reload for authenticated users --}}
    @if (auth()->check())
        @php
            //Creat last_conversation session variable if it does not exist
            if (!session()->has('last_conversation')) {
                session(['last_conversation' => 0]);
            }
            
        @endphp
    @endif
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete?</p>
            <button id="confirmButton">Confirm</button>
            <button id="cancelButton">Cancel</button>
        </div>
    </div>
    {{-- navbar --}}
    <nav class="w-full mx-auto flex flex-col items-center xl:w-3/4 xl:mx-auto xl:flex xl:flex-col xl:items-center ">
        {{-- top section of navbar --}}
        <section class="w-full dropshadow flex -justify-center h-24 bg-background rounded-b-lg"> 
            <div class="flex space-x-6 items-center grid grid-cols-3 w-11/12 gap-x-52 justify-center mx-auto">
                {{--  Col 1 --}}
                <div class="flex w-5/6 mt-3 lg:mt-0 lg:w-full">
                    {{-- Search bar --}}
                    @include('partials._search')
                </div>

                <div class="w-full flex justify-center z-20">
                    <a href="/" class="customLogo">Craftkeis</a>
                </div>

                <div class="w-full flex items-center justify-evenly space-x-2 bg-background">

                    {{-- language select --}}
                    {{-- <a href="" class="text-center text-lg h-8 w-24 text-black rounded-lg bg-buttons hover:text-white hover:bg-onhover"><i class="fas fa-globe"></i></a> --}}

                    {{-- auth directive only shows the elements when logged in --}}
                    @auth
                        <div
                            class="hidden md:block text-center text-black">
                            <span>Hi, {{ auth()->user()->name }}!</span>
                        </div>
                        <div
                            class="text-center text-lg h-8 w-24 text-black hover:text-white rounded-lg bg-buttons hover:bg-onhover">
                            <a href="/users/{{ auth()->user()->id }}">Account</a>
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
                            <a href="/register" class="">Register</a>
                        </span>
                    @endauth
                </div>

            </div>
        </section>

        {{-- categories list --}}
        <section class="flex w-2/3 h-fit xl:h-14 justify-center bg-background rounded-b-lg dropshadowCat">
            <ul class="grid grid-cols-2 gap-y-1 lg:gap-y-0 lg:flex lg:flex-row lg:space-x-2 h-fit lg:h-14 xl:h-12 w-11/12 justify-center text-sm text-center align-middle">
                <li class="w-11/12 text-center lg:w-1/6"><a href="/services/index"><button
                            class="bg-buttons w-full h-14 xl:h-12 hover:bg-onhover p-1 pt-2 rounded-b-md">All</button></a>
                </li>
                <li class="w-11/12 text-center lg:w-1/6"><a href="/services/index/?category_id=1"><button
                            class="bg-buttons w-full h-14 xl:h-12 hover:bg-onhover p-1 pt-2 rounded-b-md">3D
                            Modelling</button></a></li>
                <li class="w-11/12 text-center lg:w-1/6"><a href="/services/index/?category_id=2"><button
                            class="bg-buttons w-full h-14 xl:h-12 hover:bg-onhover p-1 pt-2 rounded-b-md">2D
                            illustration</button></a></li>
                <li class="w-11/12 text-center lg:w-1/6"><a href="/services/index/?category_id=3"><button
                            class="bg-buttons w-full h-14 xl:h-12 hover:bg-onhover p-1 pt-2 rounded-b-md">Painting</button></a>
                </li>
                <li class="w-11/12 text-center lg:w-1/6"><a href="/services/index/?category_id=4"><button
                            class="bg-buttons w-full h-14 xl:h-12 hover:bg-onhover p-1 pt-2 rounded-b-md">SFX</button></a>
                </li>
                <li class="w-11/12 text-center lg:w-1/6"><a href="/services/index/?category_id=5"><button
                            class="bg-buttons w-full h-14 xl:h-12 hover:bg-onhover p-1 pt-2 rounded-b-md">Wood
                            Sculpt</button></a></li>
                <li class="w-11/12 text-center lg:w-1/6"><a href="/services/index/?category_id=6"><button
                            class="bg-buttons w-full h-14 xl:h-12 hover:bg-onhover p-1 pt-2 rounded-b-md">Logo
                            Design</button></a></li>
            </ul>
        </section>
    </nav>

    <main class="pt-20 w-full">

        {{-- message box --}}
        <x-flash-message />
        {{-- page contents --}}
        {{ $slot }}

    </main>
    @if (auth()->check())
        {{-- <div class="divide-y divide-neutral-200 mx-auto"> --}}
        <x-chat :contactUsers="$contactUsers" />
        {{-- </div> --}}
    @endif
    <button class="scrollToTopButton scale-75 md:scale-100 -translate-x-12 translate-y-28 md:-translate-x-0 md:translate-y-0">
        <i class="fa-solid fa-angles-up arrow-up text-accent"></i>
    </button>


    {{-- footer --}}
    {{-- static bottom-0 w-full flex flex-col items-center justify-center mt-10 --}}
    {{-- mt-10 causes space under footer --}}
    <footer class="w-full flex flex-col items-center justify-center z-0">
        {{-- top part --}}
        <section class="bg-background w-max rounded-t-lg  dropshadowF mt-10 z-0">
            <div class="w-full flex justify-center p-2">
                <a href="/" class="customLogo">Craftkeis</a>
            </div>
        </section>
        <section class="flex flex-col bg-background w-full pt-5 dropshadowFB">

            <hr class="border-accent w-3/4 mx-auto my-2">
            {{-- logo and icons on left --}}
            <div class="flex flex-col lg:flex-row justify-center items-center w-full mt-4">


                {{-- links from website --}}
                <div class="flex flex-row gap-24 mx-24 lg:mx-32">
                    <a href="/about">About Us</a>
                    <a href="/contact">Contact</a>
                </div>

                <div class="flex justify-center my-4 lg:my-0">

                    {{-- social media icons --}}
                    <div class="text-xl space-x-2">
                        <a href="/login-as-user/3" class="btn btn-primary">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="/login-as-user/2" class="btn btn-primary">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="/login-as-user/1" class="btn btn-primary">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <i class="fab fa-linkedin"></i>
                    </div>
                </div>

                <div class="flex flex-row gap-24 mx-24 lg:mx-32">
                    <a href="/services/index">Services</a>

                    @auth

                        <a href="/users/{{ auth()->user()->id }}">Account</a>
                    @else
                        <p class="text-disabled">Account</p>

                    @endauth
                </div>
            </div>

        </section>

        {{-- bootom copyright part --}}
        <section class="flex justify-center bg-background pt-4 space-x-6 space-y-2 w-full">
            <hr>


        </section>
    </footer>

</body>

</html>
