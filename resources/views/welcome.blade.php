<x-layout>

    {{-- What is craftkeis --}}
    {{-- Intro on What the website is for and link to all categories --}}
    <x-card>
        <x-card-sec>
            {{-- cols containing the image and the text in their respective layout  --}}
            <div class="flex flex-cols-2 gap-5">
                {{-- TEXT --}}
                <div class="flex justify-center items-center flex-col w-2/3 text-xl text-center">

                    <h2 class="text-4xl font-bold uppercase mb-1 mx-auto text-center customLogo">
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

    <div class="stats-card w-1/2">
        <h3>Total Users</h3>
        <p>{{ $totalUsers }}</p>

        <h3>Total Creators</h3>
        <p>{{ $totalCreators }}</p>

        <h3>Total Services</h3>
        <p>{{ $totalServices }}</p>
    </div>

    {{-- Artworks --}}

    <div x-data="carousel()" x-init="init()">
        <div class="relative">
            <!-- Carousel Items -->
            <div 
                class="absolute inset-0 flex transition-transform duration-500"
                :style="`transform: translateX(-${current * 100}%)`"
            >
                @foreach ($artworks as $artwork)
                    <div class="min-w-full bg-cover bg-center h-64" style="background-image: url('/images/{{ $artwork }}')"></div>
                @endforeach
            </div>
    
            <!-- Carousel Navigation (Optional) -->
            <div class="absolute bottom-0 left-0 right-0 flex justify-center space-x-2">
                @foreach ($artworks as $index => $artwork)
                    <button 
                        @click="current = {{ $index }}"
                        :class="{ 'bg-white': current === {{ $index }}, 'bg-gray-400': current !== {{ $index }} }"
                        class="w-4 h-4 rounded-full"
                    ></button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Javascript --}}
    
    <script>

        function carousel() {
            return {
                current: 0,
                init() {
                    setInterval(() => {
                        this.current = (this.current + 1) % {{ count($artworks) }};
                    }, 3000); // Change slide every 3 seconds
                }
            };
        }
        
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

