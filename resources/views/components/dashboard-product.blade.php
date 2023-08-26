<x-card-sec> {{-- Manage Shop --}}
    <header>
        <i class="fa-solid fa-pencil"></i>
        <a href="/products/create">Create new Product</a>
        <h2>Manage Shop</h2>
    </header>            
    <x-card-sec>
        @unless ($user->products->isEmpty())
            @foreach ($user->products as $product)
                <a href="/products/{{$product->id}}">
                    {{$product->name}}
                </a>
                <a href="/products/{{$product->id}}/edit">
                    <i class="fa-solid fa-pencil"></i>Edit
                </a>
                <form method="POST" action="/products/{{$product->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">
                        <i class="fa-solid fa-trash"></i>Delete
                    </button>
                </form>                      
            @endforeach
        @else
            <p>No products found</p>
        @endunless
    </x-card-sec>
</x-card-sec>