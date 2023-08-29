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

                    <p>Craftkéis is an Online platform for freelance artists. A community of Creators in many domains of Arts are present already, ranging from 3D modelling and digital illustrations to traditional paintings or wood sculpting. Browse now our vast list of services offered by our Creators or join us as one and find your next dream gig!</p>
                    <p>Craftkéis is a premier online freelancing platform dedicated to the arts. We proudly host a diverse community of freelancers skilled in a broad spectrum of artistic domains, ranging from cutting-edge 3D modeling to traditional painting and wood sculpting. Explore our extensive roster of services offered by our esteemed freelancers, or join our community to secure your next distinguished project.</p>
                    {{-- <p>Craftkéis is an Online freelancing platform. A community of Freelancers in many domains of Arts are present already, from the more modern approaches like 3d modelling to more classical painting or wood Sculpting. Browse now our vast list of services given by our Freelancers or join us as one and find your next dream contract !</p> --}}

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

    {{-- User stats --}}

    <x-card>
        <x-card-sec>
            <div class="flex flex-col items-center justify-center">
                <hr class="border-accent w-5/6 my-6">
                <div class="grid grid-cols-3 w-5/6 mx-auto p-4 text-center text-2xl my-4">
                    <div class="border-4 border-accent w-1/2 rounded-full mx-auto">
                        <i class="fa-solid fa-user relative -top-6 text-4xl"></i>
                        <p class="font-bold">{{ $totalUsers }}</p>
                        <h3 class="relative font-bold top-8 text-lg">Total Users</h3>
                    </div>
    
                    <div class="border-4 border-accent w-1/2 rounded-full mx-auto">
                        <i class="fa-solid fa-paintbrush relative -top-6 text-4xl"></i>
                        <p class="font-bold">{{ $totalCreators }}</p>
                        <h3 class="relative font-bold top-8 text-lg">Total Creators</h3>
                    </div>
    
                    <div class="border-4 border-accent w-1/2 rounded-full mx-auto">
                        <i class="fa-solid fa-file-pen relative -top-6 text-4xl"></i>
                        <p class="font-bold">{{ $totalServices }}</p>
                        <h3 class="relative font-bold top-8 text-lg">Total Services</h3>
                    </div>
                </div>
                <hr class="border-accent w-5/6 my-6">
            </div>
        </x-card-sec>
    </x-card>
    <br>
    {{-- ======================== --}}

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
        {{-- <div class="relative bg-background dropshadowUp rounded-t-lg p-6 mb-2 z-40"> --}}

            {{-- Freelancer
            <div id="free" class="block">

                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Safe and Easy Registration
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    A freelancer in need of visibility and some gigs? Search no further! Craftkeis is a platform made for freelance artists of all kind. Just check the Creator option during registration and you’ll be able to link your Bank account for future payments.
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Fast and Customizable Services
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    Offering several types of Services? No problem, you’ll be able to create your services in a very swift manner while still presenting enough information for any future clients. Add pictures, expected payments and much more!             
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Managing made Easy
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    With the creator dashboard managing your services and requests is very simple. See all of it at the same place, and edit or add in a few clicks!
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Chatting with Clients
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    The on-site web chat service we offer permits our creators to write in realtime with their clients! Gone are the times where you had to send dozens of emails before starting a gig. Hop into chat with your client and you’ll be able to roll!
                </p>

                <hr class="border-accent w-full my-3">

            </div>

            {{-- ========================================= --}}


            {{-- Particular --}}
            {{-- <div id="part" class="hidden">

                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Register as client
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    At Craftkeis you can easily and quickly create an account as a Client, no credit card needed just enter your information and join the community!
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Find Your Artist
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    Search through the vast selection of services offered by our partner Artists and Creators. Need something specific? Our categories will help you find it in no time!              
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Make A request
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    Found the perfect Artist for what you're looking for? Make a request in no time, describe your needs and we’ll send it all to the artist. Need more infos? Chat with them in real time before finalizing your request!
                </p>

                <hr class="border-accent w-full my-3">


                <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                    Track the Progress
                </h2>

                <p class="mb-1 ml-2 text-lg">
                    The chat function and our Client Dashboard will make tracking your requests and their current status easier then ever before!
                </p>

                <hr class="border-accent w-full my-3">

            </div> --}}

            <div class="relative bg-background dropshadowUp rounded-t-lg p-6 mb-2 z-40">

                {{-- Freelancer --}}
                <div id="free" class="block">
            
                    <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                        Seamless Registration
                    </h2>
            
                    <p class="mb-1 ml-2 text-lg">
                        If you're an artist or freelancer seeking greater visibility and opportunities, Craftkéis is designed for you. Opt for the 'Creator' registration and seamlessly link your bank account for secure transactions.
                    </p>
            
                    <hr class="border-accent w-full my-3">
            
                    <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                        Efficient and Customizable Service Listings
                    </h2>
            
                    <p class="mb-1 ml-2 text-lg">
                        List multiple services with ease, providing ample details for potential clients. Incorporate images, set your pricing, and more to enhance your listing.
                    </p>
            
                    <hr class="border-accent w-full my-3">
            
                    <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                        Simplified Management
                    </h2>
            
                    <p class="mb-1 ml-2 text-lg">
                        Our intuitive creator dashboard simplifies the management of your services and orders. Access, modify, or add details with just a few clicks.
                    </p>
            
                    <hr class="border-accent w-full my-3">
            
                    <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                        Real-time Client Communication
                    </h2>
            
                    <p class="mb-1 ml-2 text-lg">
                        Our integrated chat feature facilitates real-time communication between artists and clients. Say goodbye to extended email threads; a brief chat can set the stage for your next project.
                    </p>
            
                    <hr class="border-accent w-full my-3">
            
                </div>
            
                {{-- ========================================= --}}
            
                {{-- Particular --}}
                <div id="part" class="hidden">
            
                    <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                        Client Registration
                    </h2>
            
                    <p class="mb-1 ml-2 text-lg">
                        Join Craftkéis as a client with a straightforward registration process. No credit card required—simply input your details and become a part of our community.
                    </p>
            
                    <hr class="border-accent w-full my-3">
            
                    <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                        Discover Talented Artists
                    </h2>
            
                    <p class="mb-1 ml-2 text-lg">
                        Explore our curated selection of artists and creators. If you have a specific requirement, our categorized listings will guide you to the perfect match swiftly.
                    </p>
            
                    <hr class="border-accent w-full my-3">
            
                    <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                        Initiate a Project
                    </h2>
            
                    <p class="mb-1 ml-2 text-lg">
                        Found an artist that resonates with your vision? Submit your request, outline your needs, and we'll facilitate the connection. Need more details? Engage in real-time chat before finalizing your order.
                    </p>
            
                    <hr class="border-accent w-full my-3">
            
                    <h2 class="text-2xl font-bold uppercase mb-1 customLogo ml-1 mb-1">
                        Monitor Your Project's Progress
                    </h2>
            
                    <p class="mb-1 ml-2 text-lg">
                        Track your orders with unparalleled ease through our chat feature and dedicated client dashboard. View all orders, communications, and transaction details in one consolidated space.
                    </p>
            
                    <hr class="border-accent w-full my-3">
            
                </div>
            
            </div>
            

        </div>
    </x-card>

    {{-- ==================== --}}
 
    
    <script>

        
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

