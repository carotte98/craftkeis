<x-layout>

    <x-card>

        

            <x-card-sec>
                {{-- no services found display --}}

                {{-- cols containing the image and the text in their respective layout  --}}
                <div class="flex flex-cols-2 gap-5">
                    {{-- TEXT --}}
                    <div class="flex justify-center items-center flex-col w-2/3 text-xl text-center">
    
                        <hr class="border-accent w-5/6 my-6">
                        <h2 class="text-4xl font-bold uppercase mb-1 mx-auto text-center customLogoBold">
                            Error 404
                        </h2>
                        <p class="text-xl font-bold uppercase mb-1 mx-auto text-center customLogoBold">Looks like that page doesn't exist, Bip boop</p>
                        <hr class="border-accent w-5/6 my-6">
    
                        {{-- BUTTONS --}}
                        <div class="flex flexx-row space-x-5">
                            <a href="/">
                                <button class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                                    <i class="fa-solid fa-bars"></i> Homepage
                                </button>
                            </a>
                        </div>
    
                    </div>
    
                    {{-- IMAGE as background of the div ;) --}}
                    <div style="height:70vh" class="w-full rounded-xl bg-[url('/images/404.png')] bg-contain bg-no-repeat bg-center "></div>
    
                </div>
            </x-card-sec>

        

    </x-card>

</x-layout>