<x-layout>
    <x-card>
        
        @unless(count($services))
            <x-card-sec>
                {{-- no services found display --}}

                {{-- cols containing the image and the text in their respective layout  --}}
                <div class="flex flex-cols-2 gap-5">
                    {{-- TEXT --}}
                    <div class="flex justify-center items-center flex-col w-2/3 text-xl text-center">
    
                        <hr class="border-accent w-5/6 my-6">
                        <h2 class="text-4xl font-bold uppercase mb-1 mx-auto text-center customLogoBold">
                            Oops, no services found!
                        </h2>
                        <hr class="border-accent w-5/6 my-6">
    
                        {{-- BUTTONS --}}
                        <div class="flex flexx-row space-x-5">
                            <a href="/services/index">
                                <button class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                                    <i class="fa-solid fa-bars"></i> All Services
                                </button>
                            </a>
                        </div>
    
                    </div>
    
                    {{-- IMAGE as background of the div ;) --}}
                    <div style="height:70vh" class="w-full rounded-xl bg-[url('/images/sad_robot.png')] bg-contain bg-no-repeat bg-center "></div>
    
                </div>
            </x-card-sec>
                {{-- end no services --}}
                
        @else
            <div class="grid grid-cols-2 gap-3">
                @foreach ($services as $service)
                <x-service-card :service="$service" />
                @endforeach
            </div>
        @endunless
                
        <div class="flex justify-between mt-3">
            {{$services->links()}}
        </div>
                
        </x-card>
</x-layout>