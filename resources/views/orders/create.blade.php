<x-layout>
    <x-card>
    @php
        $Id = {{}}
        $order = Service::find($Id);
    
    @endphp

    <form action="/orders/store" method="POST">
        @csrf
    
        <div class="flex flex-col mb-6">
            <p class="inline-block text-lg mb-2">One order of -Service- </p>
            <p class="inline-block mb-2">Creator: {{}} </p>
            <p class="inline-block mb-2">Client: -- </p>
        </div>
        
        <input type="hidden" name="creator" value="{{}}">

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Order Title</label>
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
                placeholder="Include requirements, colors, etc">{{old('description')}}</textarea>
        </div>
    
        <div class="mb-6">
            <button class="bg-accent text-white rounded py-2 px-4 hover:bg-onhover">
                Create Order
            </button>
    
            <a href="/" class="text-black ml-4">Back</a>
        </div>
    </form>
    
</x-card>
    
</x-layout>