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
        <header>
            <h2>
                Create a Service
            </h2>
        </header>
    
        <form action="/services" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title">Service Title</label>
                <input type="text" name="title" value="{{old('title')}}"/>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label for="category_id">Category</label>
                <select name="category_id" value="{{old('category_id')}}">
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

            <div>
                <label for="description">Description</label>
                <input type="text" name="description" value="{{old('description')}}"/>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" value="{{old('price')}}"/>
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="time">Duration</label>
                <input type="text" name="time" value="{{old('time')}}"/>
                @error('time')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <button>
                    Create Service
                </button>
    
                <a href="/"> Back </a>
            </div>
        </form>
    </x-card>  
        
    @endauth

</x-layout>