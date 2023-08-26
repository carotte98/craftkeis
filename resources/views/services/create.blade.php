@auth    
    @php
        if (auth()->user()->is_creator !== 1) {
            header('Location: http://localhost:8000/');
            exit();
        }
    @endphp
@endauth

<x-layout>
    @auth
    <x-card>
        <x-card-sec>
            <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                Create a Service
            </h2>

            <hr class="border-accent w-5/6 mx-auto my-6">

            <form action="/services" method="POST" enctype="multipart/form-data" class="w-3/4 mx-auto">
                @csrf

                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <input type="text" placeholder="Service Title" name="title" value="{{old('title')}}">
                    </div>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="bordered-div">
                    <label for="category_id" class="icon-input-container">
                        <i class="fa-solid fa-palette"></i>
                        Category
                    </label>
                    <select class="border border-gray-200 rounded p-2 w-full" name="category_id" value="{{old('category_id')}}">
                        <option value="1">3D Modelling</option>
                        <option value="2">2D Illustration</option>
                        <option value="3">Painting</option>
                        <option value="4">SFX</option>
                        <option value="5">Wood Sculpting</option>
                        <option value="6">Logo Design</option>
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="description" placeholder="Description" value="{{old('description')}}">
                    </div>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-solid fa-tag"></i>
                        <input class="border border-gray-200 rounded p-2 w-full" type="number" name="price" placeholder="Price" value="{{old('price')}}">
                    </div>
                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-regular fa-hourglass-half"></i>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="time" placeholder="Estimated time" value="{{old('time')}}">
                    </div>
                    @error('time')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <hr class="border-accent w-5/6 mx-auto my-6">
                
                <div class="w-full flex justify-center">
                    <button class="bg-accent text-lg text-white rounded-lg py-2 px-4 hover:bg-onhover">
                        Create Service
                    </button>
                    <a href="/" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
                </div>
            </form>
        </x-card-sec>
    </x-card>
    @endauth
</x-layout>
