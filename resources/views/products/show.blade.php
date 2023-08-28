<x-layout>
<a href="/"><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div>
    <x-card>
        <div>
            <h3>{{$product->title}}</h3>
            <div>Seller: <a href="/creators/{{ $product->users->id }}">{{ $product->users->name }}</a></div>
            <div>{{ $product->description }}</div>
            <div>{{ $product->price }}</div>
                <button class="text-center text-lg h-8 w-20 text-white rounded-lg bg-accent hover:bg-onhover">
                    <a href="">Buy</a>
                </button>  

        </div>
    </x-card>
</div>
</x-layout>