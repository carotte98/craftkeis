@props(['product'])

<x-card>
    <div>
        <div>
            <h3>
                <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
            </h3>
            <div>{{ $product->description }}</div>
            <div>{{ $product->price }} €</div>
        </div>
    </div>
</x-card>
