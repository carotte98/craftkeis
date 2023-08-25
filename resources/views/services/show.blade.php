<x-layout>
<a href="/"><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div>
    <x-card>
        <x-card-sec>
            <div>{{ $service->status }}</div>
            <h3>{{$service->title}}</h3>
            <div>Creator: <a href="/creators/{{ $service->users->id }}">{{ $service->users->name }}</a></div>
            <div>{{ $service->description }}</div>
            <div>{{ $service->time }}</div>
            <div>{{ $service->price }}</div>
            <div>{{ $service->categories->name }}</div>
            {{-- order button, sents to order form --}}
            <form action="" method="post" action="/orders/create">
                <button class="text-center text-lg h-8 w-20 text-white rounded-lg bg-accent hover:bg-onhover">
                    <a href="/orders/create/{{ $service->id }}">Order</a>
                </button>
            </form>       

        </x-card-sec>
    </x-card>
</div>
</x-layout>