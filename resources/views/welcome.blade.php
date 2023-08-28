<x-layout>

    {{-- What is craftkeis --}}
    {{-- Intro on What the website is for and link to all categories --}}
    <x-card>
        <x-card-sec>
            {{-- cols containing the image and the text in their respective layout  --}}
            <div class="flex flex-cols-2 gap-5">
                {{-- TEXT --}}
                <div class="flex justify-center items-center flex-col w-2/3 text-xl text-center">

                    <h2 class="text-4xl font-bold uppercase mb-1 mx-auto text-center customLogoBold">
                        What is Craftkéis
                    </h2>

                    <hr class="border-accent w-5/6 my-6">

                    <p>Craftkéis is an Online freelancing platform. A community of Freelancers in many domains of Arts are present already, from the more modern approaches like 3d modelling to more classical painting or wood Sculpting. Browse now our vast list of services given by our Freelancers or join us as one and find your next dream contract !</p>

                    <hr class="border-accent w-5/6 my-6">

                    {{-- BUTTONS --}}
                    <div class="flex flexx-row space-x-5">
                        <a href="/services/index">
                            <button class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                                <i class="fa-solid fa-bars"></i> All Services
                            </button>
                        </a>
                        @auth
                        @else
                        <a href="/register" class="" >
                            <button class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                                Register
                            </button>
                        </a>
                        @endauth
                    </div>

                </div>

                {{-- IMAGE as background of the div ;) --}}
                <div style="height:70vh" class="w-full rounded-xl bg-[url('/images/Robits.jpg')] bg-contain bg-no-repeat bg-center "></div>

            </div>

        </x-card-sec>
    </x-card>

    {{-- ==================== --}}
    <br>
    {{-- How to use craftkeis --}}

    <x-card>

        {{-- TABS --}}
        <div class="grid grid-cols-2 gap-x-2 z-10 -mb-4">
            
            {{-- LEFT TAB: Freelancer --}}
            <button id="freeB">
                <div id="freeDec" class="bg-background dropshadow rounded-t-lg p-6 mb-2">
                    <h2 class="text-3xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                        Freelancer
                    </h2>
                </div>
            </button>

            {{-- RIGHT TAB: Particular --}}
            <button id="partB">
                <div id="partDec" class="bg-disabled dropshadowDown rounded-t-lg p-6 mb-2">
                    <h2 class="text-3xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                        Particular
                    </h2>
                </div>
            </button>

        </div>

        {{-- TEXTS --}}
        <div class="relative bg-background dropshadowUp rounded-t-lg p-6 mb-2 z-40">

            {{-- Freelancer --}}
            <div id="free" class="block">

                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Safe and Easy Registration
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    A freelancer in need of visibility and some contracts, search no further, creaftkeis is a plateform made for freelancer in the domain of Arts. Just check the Artist option during registration and you’ll be able to link your Bank account for future salary
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Fast and Customizable Services
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    Giving a few types of Services ? No problem, you’ll be able to create your services in a very swift manner and still have enough information for your future clients. Add pictures, expected payments and much more !             
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Managing made Easy
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    With the creator dashboard managing your services and orders is very simple. See all of it at the same place, and edit or add in a few clicks !
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Chatting with Clients
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    The on site web chat service we offer permits our Artists to write in realtime with their clients, done are the times where you had to send dozens of emails before starting a gig. hald an hour in chat with the client and you’ll be able to roll
                </p>

                <hr class="border-accent w-full my-3">

            </div>

            {{-- ========================================= --}}

            {{-- Particular --}}
            <div id="part" class="hidden">

                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Register as client
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    At Craftkeis you can easily and quickly create an account as a Client, no credit card needed just enter your information and join the community
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Find Your Artist
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    Search through our selection of partner Artists and Creators, need something specific, our categories will help you find it in no time               
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Make A request
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    You think you found the perfect Artist on the website, make a request in no time, describe your needs and we’ll send your request to the artist. Need more infos ? Chat with the person in real time before ordering !
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Track the Progress
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    The chat function and our Client Dashboard will make tracking your order as easy as never. See all your orders, contacts and bank details in one place !
                </p>

                <hr class="border-accent w-full my-3">

            </div>

        </div>
    </x-card>

    {{-- ==================== --}}

    {{-- User stats --}}




    {{-- Artworks --}}
    <div
    id="carouselExampleCaptions"
    class="relative"
    data-te-carousel-init
    data-te-ride="carousel">
    <!--Carousel indicators-->
    <div
        class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
        data-te-carousel-indicators>
        <button
        type="button"
        data-te-target="#carouselExampleCaptions"
        data-te-slide-to="0"
        data-te-carousel-active
        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
        aria-current="true"
        aria-label="Slide 1"></button>
        <button
        type="button"
        data-te-target="#carouselExampleCaptions"
        data-te-slide-to="1"
        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
        aria-label="Slide 2"></button>
        <button
        type="button"
        data-te-target="#carouselExampleCaptions"
        data-te-slide-to="2"
        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
        aria-label="Slide 3"></button>
    </div>

    <!--Carousel items-->
    <div
        class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
        <!--First item-->
        <div
        class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
        data-te-carousel-active
        data-te-carousel-item
        style="backface-visibility: hidden">
        <img
            src="https://tecdn.b-cdn.net/img/Photos/Slides/img%20(15).jpg"
            class="block w-full"
            alt="..." />
        <div
            class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
            <h5 class="text-xl">First slide label</h5>
            <p>
            Some representative placeholder content for the first slide.
            </p>
        </div>
        </div>
        <!--Second item-->
        <div
        class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
        data-te-carousel-item
        style="backface-visibility: hidden">
        <img
            src="https://tecdn.b-cdn.net/img/Photos/Slides/img%20(22).jpg"
            class="block w-full"
            alt="..." />
        <div
            class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
            <h5 class="text-xl">Second slide label</h5>
            <p>
            Some representative placeholder content for the second slide.
            </p>
        </div>
        </div>
        <!--Third item-->
        <div
        class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
        data-te-carousel-item
        style="backface-visibility: hidden">
        <img
            src="https://tecdn.b-cdn.net/img/Photos/Slides/img%20(23).jpg"
            class="block w-full"
            alt="..." />
        <div
            class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
            <h5 class="text-xl">Third slide label</h5>
            <p>
            Some representative placeholder content for the third slide.
            </p>
        </div>
        </div>
    </div>

    <!--Carousel controls - prev item-->
    <button
        class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
        type="button"
        data-te-target="#carouselExampleCaptions"
        data-te-slide="prev">
        <span class="inline-block h-8 w-8">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6">
            <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        </span>
        <span
        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
        >Previous</span
        >
    </button>
    <!--Carousel controls - next item-->
    <button
        class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
        type="button"
        data-te-target="#carouselExampleCaptions"
        data-te-slide="next">
        <span class="inline-block h-8 w-8">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6">
            <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        </span>
        <span
        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
        >Next</span
        >
    </button>
    </div>

    <script>
        
    // Initialization for ES Users
    import {
    Carousel,
    initTE,
    } from "tw-elements";

    initTE({ Carousel });

        // Buttons as variables
        const freelance = document.querySelector("#freeB");
        const particular = document.querySelector("#partB");

        // Text variables (divs that contain it)
        const freelanceText = document.querySelector("#free");
        const particularText = document.querySelector("#part");

        // State of the text open / closed
        let freeState = true;
        let partState = false;

        // Adding EventListeners to the buttons
        freelance.addEventListener("click", showFree);
        particular.addEventListener("click", showPart);

        function showFree(event){
            
            console.log(event);

            if(freeState == false){

                // Toggle show for freelance
                freelanceText.classList.remove("hidden");
                freelanceText.classList.add("block");

                // Toggle hidden for particular
                particularText.classList.remove("block");
                particularText.classList.add("hidden");

                // Toggle the button classes
                document.querySelector("#freeDec").classList.remove("bg-disabled", "dropshadowDown", "rounded-t-lg", "p-6", "mb-2");
                document.querySelector("#freeDec").classList.add("bg-background", "dropshadow", "rounded-t-lg", "p-6", "mb-2");
                document.querySelector("#partDec").classList.remove("bg-background", "dropshadow", "rounded-t-lg", "p-6", "mb-2");
                document.querySelector("#partDec").classList.add("bg-disabled", "dropshadowDown", "rounded-t-lg", "p-6", "mb-2");


                freeState = true;
                partState = false;

            }
            
        }

        function showPart(event){

            console.log(event);
            
            if(partState == false){
                
                // Toggle hidden for freelance
                freelanceText.classList.add("hidden");
                freelanceText.classList.remove("block");

                // Toggle show for particular
                particularText.classList.add("block");
                particularText.classList.remove("hidden");

                // Toggle the button classes
                document.querySelector("#freeDec").classList.remove("bg-background", "dropshadow", "rounded-t-lg", "p-6", "mb-2");
                document.querySelector("#freeDec").classList.add("bg-disabled", "dropshadowDown", "rounded-t-lg", "p-6", "mb-2");
                document.querySelector("#partDec").classList.remove("bg-disabled", "dropshadowDown", "rounded-t-lg", "p-6", "mb-2");
                document.querySelector("#partDec").classList.add("bg-background", "dropshadow", "rounded-t-lg", "p-6", "mb-2");
                

                freeState = false;
                partState = true;
            }
        }

    </script>

</x-layout>

