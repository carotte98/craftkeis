<x-layout>
    <x-card>
    <x-card-sec>
    
    <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
        Request {{$service->title}}
    </h2>

    <hr class="border-accent w-5/6 mx-auto my-6">

    <p class="text-center mb-2">You are ordering from: 
        <a class="w-24 rounded-full bg-buttons text-lg font-bold p-1 px-4" href="/creators/{{ $service->users->id }}">{{ $service->users->name }}</a>
    </p>
    
    <form action="/orders" method="POST">
        @csrf
        <input type="hidden" name="user_id1" value="{{ $service->user_id }}">
        <input type="hidden" name="user_id2" value="{{ auth()->id() }}">
        <input type="hidden" name="service_id" value="{{ $service->id }}">
        <input type="hidden" name="price" value="{{ $service->price }}">


        <div class="bordered-div w-3/4">
            <div class="icon-input-container">
                <i class="fa-regular fa-pen-to-square"></i>
                <input type="text" placeholder="your request title" name="title" value="{{old('title')}}">
            </div>
        </div>
        <div>
            @error('title')
                <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
            @enderror
        </div>

        <div class="bordered-div w-3/4">
            <label for="description" class="inline-block text-lg mb-2">
                Describe what you need
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                placeholder="Include measurements, colors, etc">{{old('description')}}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    
        <hr class="border-accent w-5/6 mx-auto my-6">

        <div class="w-full flex justify-center">
            {{-- the user cannot order if he is the services creator --}}
            @if ($service->user_id != auth()->id())
                <button class="bg-accent text-lg text-white rounded-lg py-2 px-4 hover:bg-onhover">
                    Request now
                </button>
            @else
                <button class="bg-gray-300 text-lg text-gray-500 rounded-lg py-2 px-4" disabled>
                    Request now
                </button>
            @endif
    
            <a href="{{ url()->previous() }}" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
        </div>
    </form>
    
</x-card-sec>
</x-card>
    
</x-layout>