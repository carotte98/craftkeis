<x-layout>

    {{-- About us --}}
    {{-- description of our team --}}
    <x-card>
        <x-card-sec>
            <div class="flex gap-5 justify-center">
                {{-- TEXT --}}
                <div class="flex justify-center items-center flex-col w-2/3 text-xl text-center">

                    <h2 class="text-4xl font-bold uppercase mb-1 mx-auto my-auto text-center customLogo">
                        About Us
                    </h2>

                    <hr class="border-accent w-5/6 my-6">


                </div>

            </div>

        </x-card-sec>
    </x-card>
    
    <x-card>
        <x-card-sec>
            {{-- cols containing the image and the text in their respective layout  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                {{-- TEXT --}}
                <div class="flex justify-center items-center flex-col w-2/3 mx-auto my-auto text-xl text-center">

                    <h2 class="text-4xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                        Thierry
                    </h2>

                    <hr class="border-accent w-5/6 my-6">

                    <p>Former game artist and game Designer, taking a trip into the IT world. I was working for some time as a freelancer in 3D arts
                        This got mostly replaced by mw project of developing my very own video game and releasing it. I enjoy Front end as much as Back
                        End work.
                    </p>

                    <hr class="border-accent w-5/6 my-6">

                </div>

                {{-- IMAGE as background of the div ;) --}}
                <div style="height:40vh" class="w-full rounded-xl bg-[url('/public/storage/images/thierry.png')] bg-contain bg-no-repeat bg-center my-auto"></div>

            </div>

        </x-card-sec>
        <div class="bg-background dropshadow rounded-lg p-6 mb-2 h-fit">
            {{-- cols containing the image and the text in their respective layout  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-5">

                {{-- IMAGE as background of the div ;) --}}
                <div style="height:40vh" class="w-full rounded-xl bg-[url('/public/storage/images/cedric.png')] bg-contain bg-no-repeat bg-center my-auto"></div>

                {{-- TEXT --}}
                <div class="flex justify-center items-center flex-col w-2/3 mx-auto my-auto text-xl text-center">

                    <h2 class="text-4xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                        Cedric
                    </h2>

                    <hr class="border-accent w-5/6 my-6">

                    <p>Hello there! I am a keen junior full stack developer who enjoys programming and is always up for a challenge. With a knack for Python, JavaScript, PHP and a dash of Linux, I'm excited to dive into the world of web development.</p>

                    <hr class="border-accent w-5/6 my-6">

                </div>
            </div>

        </div>
        <div class="bg-background dropshadow rounded-lg p-6 mb-2 h-fit">
            {{-- cols containing the image and the text in their respective layout  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                {{-- TEXT --}}
                <div class="flex justify-center items-center flex-col w-2/3 mx-auto my-auto text-xl text-center">

                    <h2 class="text-4xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                        Michelle
                    </h2>

                    <hr class="border-accent w-5/6 my-6">

                    <p>Greetings! Being a PC gamer since a young age, I believe in continuous learning and exploring new tech. Outside of coding, I enjoy listening to music and 3D modeling. Proud to be a part of this dynamic team, I look forward to contributing to our collective success.</p>

                    <hr class="border-accent w-5/6 my-6">

                </div>

                {{-- IMAGE as background of the div ;) --}}
                <div style="height:40vh" class="w-full rounded-xl bg-[url('/public/storage/images/michelle.png')] bg-contain bg-no-repeat bg-center my-auto"></div>

            </div>

        </div>
        <div class="bg-background dropshadow rounded-lg p-6 mb-2 h-fit">
            {{-- cols containing the image and the text in their respective layout  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- IMAGE as background of the div ;) --}}
                <div style="height:40vh" class="w-full rounded-xl bg-[url('/public/storage/images/tim.png')] bg-contain bg-no-repeat bg-center my-auto"></div>

                {{-- TEXT --}}
                <div class="flex justify-center items-center flex-col w-2/3 mx-auto my-auto text-xl text-center">

                    <h2 class="text-4xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                        Tim
                    </h2>

                    <hr class="border-accent w-5/6 my-6">

                    <p>Hello! I am a digital artist and web developer. My love for video games and past attempts to make my own have fuelled my interest in programming. When I encounter problems, I usually either manage to solve them by myself or know where an existing solution can be found.</p>

                    <hr class="border-accent w-5/6 my-6">

                </div>
            </div>

        </div>
        <div class="bg-background dropshadow rounded-lg p-6 mb-2 h-fit">
            {{-- cols containing the image and the text in their respective layout  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                {{-- TEXT --}}
                <div class="flex justify-center items-center flex-col w-2/3 mx-auto my-auto text-xl text-center">

                    <h2 class="text-4xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                        Joe
                    </h2>

                    <hr class="border-accent w-5/6 my-6">

                    <p>I've been passionate about coding since my school days, and I've built a strong foundation in backend development.
                        I really enjoy crafting efficient and innovative solutions in this realm. 
                        Collaborative group projects are where I shine, and I take pride in contributing to successful team efforts. 
                        Outside of coding, I'm all about friendly and positive attitude when working with my co-workers.
                    </p>

                    <hr class="border-accent w-5/6 my-6">

                </div>

                {{-- IMAGE as background of the div ;) --}}
                <div style="height:40vh" class="w-full rounded-xl bg-[url('/public/storage/images/joe.png')] bg-contain bg-no-repeat my-auto bg-center "></div>

            </div>

        </div>
    </x-card>

</x-layout>

