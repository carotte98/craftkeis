@props(['service'])

<x-card-sec>
    <div class="w-full">
        
        {{-- Image --}}
        <div class="w-full h-40 bg-[url('/images/Celestia.jpg')] bg-fit bg-no-repeat bg-center rounded-lg shadow-inner">
        </div>
        {{-- Title --}}
        <div class="relative -top-10 -right-5 font-bold bg-background w-max p-2 rounded-t-lg">
            <a href="/services/{{ $service->id }}">{{ $service->title }}</a>
        </div>

        {{-- Bottom part of card content --}}
        <div class="p-7 pt-0 pb-0">

            {{-- Div containing over the line content --}}
            <div class="mb-2 flex flex-row justify-between  text-center">
                
                <div class="flex flex-row space-x-2">
                    {{-- Artist name --}}
                    <div class="text-sm font-bold p-1">
                        by 
                        <a href="/creators/{{ $service->users->id }}">{{ $service->users->name }}</a>
                    </div>

                    {{-- Category bubble --}}
                    <a class="w-24 rounded-full bg-buttons p-1 text-xs" href="?category_id={{$service->category_id}}">{{$service->categories->name}}</a>
                </div>

                <div class="flex flex-row space-x-2">

                    {{-- Order button --}}
                    <form action="" method="post" action="/orders/create">
                        <button class="text-center text-sm h-6 w-20 text-white rounded-lg bg-accent hover:bg-onhover">
                            <a href="/orders/create/{{ $service->id }}">Order</a>
                        </button>
                    </form>  

                </div>

            </div>

            <hr class="border-accent w-full">
            
        
           
            <div class="text-medium p-1 my-3">{{ $service->description }}</div>


            <div class="flex flex-row justify-between text-sm bg-buttons w-full rounded-lg p-1 mt-2">

                <div><strong>Time :</strong> {{ $service->time }}</div>
                <div><strong>Price :</strong> {{ $service->price }} €</div>

            </div>
            

        </div>
        
    </div>
</x-card-sec>
