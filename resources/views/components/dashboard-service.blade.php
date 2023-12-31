<x-card-sec> {{-- Manage Services --}}
    <header>
        
        <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">Manage Services</h2>
        <hr class="border-accent w-5/6 mx-auto my-6">
       <div class="flex justify-center text-lg my-5">
        @if(auth()->user()->id !== 1)
        <a href="/services/create">
            <button class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover space-x-2 flex flex-row">
                <i class="fa-solid fa-pencil"></i><p>Create new Service</p>
            </button>
        </a>
        @endif
        {{-- <a href="{{ auth()->user()->id == 1 ? '/users/1/bank-create/' . $user->id : '/register/' . $user->id . '/bank-details' }}"> --}}
       </div>
    </header>            
    
        
            @unless ($user->services->isEmpty())
            <div class="md:grid md:grid-cols-2 xl:grid-cols-3 gap-3">
                @foreach ($user->services as $service)
                <x-card-sec>
                    <a class="text-lg font-bold uppercase mb-1 mx-auto text-center customLogo" href="/services/{{$service->id}}">
                        {{$service->title}}
                    </a>
                    <hr class="border-accent w-5/6 mx-auto my-6">
                    <p>{{$service->description}}</p>
                    <hr class="border-accent w-5/6 mx-auto my-6">
                    <div class="flex flex-row gap-x-2 justify-center mt-3">
                        <a href="{{ auth()->user()->id == 1 ? '/users/1/update-service/' . $service->id : '/services/' . $service->id . '/edit' }}">
                            <button class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                                <i class="fa-solid fa-pencil"></i>Edit
                            </button>
                        </a>
                        <form method="POST" action="/services/{{$service->id}}">
                            @csrf
                            @method('DELETE')
                            <button id="delete-button" class="text-center text-lg p-2 text-white rounded-lg bg-red-500 hover:bg-onhover">
                                <i class="fa-solid fa-trash"></i>Delete
                            </button>
                        </form>               
                    </div>    
                </x-card-sec>   
                @endforeach
            </div>
            @else
            <div class="w-full flex justify-center">
                <p><strong>No services found</strong></p>
             </div>
            @endunless
        

</x-card-sec>