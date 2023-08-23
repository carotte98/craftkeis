<x-layout>
<a href="/"><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div>
    <x-card>
        <div>
            <div>{{ $service->status }}</div>
            <h3>{{$service->name}}</h3>
            <div>by {{ $service->user_id }}</div>
            <div>{{ $service->description }}</div>
            <div>{{ $service->time }}</div>
            <div>{{ $service->price }}</div>
            <x-service-category :category="$service->category_id" />
            {{-- order button, sents to order form --}}
            <form action="" method="post" action="/">
            {{-- <form action="" method="post" action="/listings/{{$listing->id}}"> --}}
                <button class="text-center text-lg h-8 w-20 text-white rounded-lg bg-accent hover:bg-onhover">
                    Order
                </button>
            </form>       

        </div>
    </x-card>
</div>
</x-layout>