<x-layout>
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
                <button class="text-center text-lg h-8 w-20 text-white rounded-lg bg-accent hover:bg-onhover">
                    <a href="/orders/create/{{ $service->id }}">Order</a>
                </button>    

        </x-card-sec>
        <div class="w-full flex justify-center mt-3">
            <a href="{{ url()->previous() }}" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
        </div>
    </x-card>
</div>
</x-layout>