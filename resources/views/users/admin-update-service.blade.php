@auth    
    @php
        if (auth()->user()->is_creator !== 1 && auth()->user()->id != 1) {
            header('Location: http://localhost:8000/');
            exit();
        }
    @endphp
@endauth

<x-layout>
    <x-card>
        <x-card-sec>
            <header>
                <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                    Edit Service
                </h2>
                <p class="text-lg font-bold uppercase mb-1 mx-auto text-center customLogo">Edit: {{$service->title}}</p>
            </header>
            
            <hr class="border-accent w-5/6 mx-auto my-6">

            <form action="/users/1/update-service/{{$service->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-regular fa-pen-to-square"></i>
                    <input type="text" name="title" value="{{$service->title}}"/>
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
                    <select class="border border-gray-200 rounded p-2 w-full" name="category_id" value="{{$service->category_id}}">
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
                        <input type="text" name="description" value="{{$service->description}}"/>
                    </div>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-solid fa-tag"></i>
                        <input type="number" name="price" value="{{$service->price}}"/>
                    </div>
                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-regular fa-hourglass-half"></i>
                        <input type="text" name="time" value="{{$service->time}}"/>
                    </div>
                    @error('time')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-solid fa-bookmark"></i>
                        <select class="border border-gray-200 rounded p-2 w-full" name="status" value="{{$service->status}}">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        </select>
                    </div>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <hr class="border-accent w-5/6 mx-auto my-6">

                <div class="w-full flex justify-center">
                    <button class="bg-accent text-lg text-white rounded-lg py-2 px-4 hover:bg-onhover">
                        Update Service
                    </button>
                    <a href="/users/{{auth()->user()->id}}" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
                </div>
            </form>
        </x-card-sec>
    </x-card>
</x-layout>