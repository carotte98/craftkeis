<x-layout>
<div>
    <x-card>
        <x-card-sec>
            <div class="w-full">
        
                {{-- image and title are link --}}
                <a href="/services/{{ $service->id }}">
                    {{-- Image --}}
                    <div class="w-full h-40 bg-[url('/public/storage/images/Celestia.jpg')] bg-cover bg-no-repeat bg-center rounded-lg shadow-inner">
                    </div>
                    {{-- Title --}}
                    <div class="relative -top-8 md:-top-10 -right-2 md:-right-5 font-bold bg-background w-max p-2 rounded-t-lg text-xs md:text-lg">
                        {{ $service->title }}
                    </div>
                </a>
        
                {{-- Bottom part of card content --}}
                <div class="p-7 pt-0 pb-0">
        
                    {{-- Div containing over the line content --}}
                    <div class="mb-2 flex flex-row flex-wrap justify-between align-center text-center">
                        
                        <div class="flex flex-row space-x-2">
                            {{-- Artist name --}}
                            <div class="w-36 text-xs xl:text-sm font-bold p-1 -ml-4 md:-ml-6">
                                by 
                                <span class="w-full rounded-full hover:bg-buttons p-1"><a href="/creators/{{ $service->users->id }}">{{ $service->users->name }}</a></span>
                            </div>
        
                        </div>
        
                        <div class="flex flex-row space-x-2">
        
                            {{-- Order button --}}
                                <button class="text-center text-xs md:text-sm h-6 w-20 text-white rounded-lg bg-accent hover:bg-onhover">
                                    <a href="/orders/create/{{ $service->id }}">Request</a>
                                </button>
                            </form>
                            {{-- Category bubble --}}
                            <a class="w-24 text-xs md:text-sm" href="?category_id={{$service->category_id}}"><button class=" w-full rounded-full bg-buttons p-1 text-xs">{{$service->categories->name}}</button></a>
                           
                        </div>
        
                    </div>
        
                    <hr class="border-accent w-full">
        
        
        
                    <div class="text-sm md:text-medium p-1 my-3">{{ $service->description }}
        
                    </div>
        
        
                    <div class="flex flex-row justify-between text-xs md:text-sm bg-buttons w-full rounded-lg p-1 mt-2">
        
                        <div class="w-1/2"><strong>Time :</strong> {{ $service->time }}</div>
                        <div class="w-1/2"><strong>Price :</strong> {{ $service->price }} €</div>
        
                    </div>
        
        
                </div>
        
            </div>
        </x-card-sec>

        <div class="w-full flex justify-center mt-3">
            <a href="{{ url()->previous() }}" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
        </div>

    </x-card>
</div>
</x-layout>