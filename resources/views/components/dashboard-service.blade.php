<x-card-sec> {{-- Manage Services --}}
    <header>
        <a href="/services/create">Create new Service</a>
        <h2>Manage Services</h2>
    </header>            
    <x-card-sec>
        @unless ($user->services->isEmpty())
            @foreach ($user->services as $service)
                <a href="/services/{{$service->id}}">
                    {{$service->title}}
                </a>
                <a href="/services/{{$service->id}}/edit">
                    <i class="fa-solid fa-pencil"></i>Edit
                </a>
                <form method="POST" action="/services/{{$service->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">
                        <i class="fa-solid fa-trash"></i>Delete
                    </button>
                </form>                      
            @endforeach
        @else
            <p>No services found</p>
        @endunless
    </x-card-sec>
</x-card-sec>