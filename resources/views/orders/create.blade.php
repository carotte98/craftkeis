<x-layout>
    <x-card>
    
    <form action="/orders" method="POST">
        @csrf
    
        <div class="flex flex-col mb-6">
            <p class="inline-block text-lg mb-2">Request {{$service->title}} </p>
            <p class="inline-block mb-2">Creator: {{ $service->users->name }} </p>
            <p class="inline-block mb-2">Client: {{ auth()->user()->name }} </p>
        </div>
        
        <input type="hidden" name="user_id1" value="{{ $service->user_id }}">
        <input type="hidden" name="user_id2" value="{{ auth()->id() }}">
        <input type="hidden" name="service_id" value="{{ $service->id }}">
        <input type="hidden" name="price" value="{{ $service->price }}">

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Request Title</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{ old('title') }}" />
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                Describe what you need
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                placeholder="Include measurements, colors, etc">{{old('description')}}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <button class="bg-accent text-white rounded py-2 px-4 hover:bg-onhover">
                Request now
            </button>
    
            <a href="{{ url()->previous() }}" class="text-black ml-4">Back</a>
        </div>
    </form>
    
</x-card>
    
</x-layout>