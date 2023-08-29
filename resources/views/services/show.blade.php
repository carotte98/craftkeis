<x-layout>
<div>
    <x-card>
        <x-card-sec>
            <div class="w-full">
        
                {{-- Image --}}
                <div class="w-full h-40 bg-[url('/images/Celestia.jpg')] bg-cover bg-no-repeat bg-center rounded-lg shadow-inner">
                </div>
                {{-- Title --}}
                <div class="relative -top-10 -right-5 font-bold bg-background w-max p-2 rounded-t-lg">
                    <a href="/services/{{ $service->id }}">{{ $service->title }}</a>
                </div>
        
                {{-- Bottom part of card content --}}
                <div class="p-7 pt-0 pb-0">
        
                    {{-- Div containing over the line content --}}
                    <div class="mb-2 flex flex-row flex-wrap justify-between align-center text-center">
                        
                        <div class="flex flex-row space-x-2">
                            {{-- Artist name --}}
                            <div class="w-52 text-md xl:text-xl font-bold p-1 -ml-6">
                                by <span class="w-full rounded-full hover:bg-buttons p-1">
                                <a href="/creators/{{ $service->users->id }}">{{ $service->users->name }}</a>
                                </span>
                            </div>
        
                        </div>
        
                        <div class="flex flex-row space-x-2">
        
                            {{-- Order button --}}
                            <form action="" method="post" action="/orders/create">
                                <button class="text-center text-lg h-8 w-36 text-white rounded-lg bg-accent hover:bg-onhover">
                                    <a href="/orders/create/{{ $service->id }}">Request</a>
                                </button>
                            </form>
                            {{-- Category bubble --}}
                            <a class="w-36 text-sm" href="?category_id={{$service->category_id}}"><button class=" w-full rounded-full bg-buttons p-1 text-md">{{$service->categories->name}}</button></a>
                           
                        </div>
        
                    </div>
        
                    <hr class="border-accent w-full">
        
        
        
                    <div class="text-lg p-1 my-8">{{ $service->description }}
        
                    </div>
        
        
                    <div class="flex flex-row justify-between text-md bg-buttons w-full rounded-lg p-1 mt-2">
        
                        <div><strong>Time :</strong> {{ $service->time }}</div>
                        <div><strong>Price :</strong> {{ $service->price }} €</div>
        
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