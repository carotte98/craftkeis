<x-layout>
    <x-card>
        <header>
            <h2>
                Edit Service
            </h2>
            <p>Edit: {{$service->name}}</p>
        </header>
    
        <form action="/services/{{$service->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Service Title</label>
                <input type="text" name="title" value="{{$service->title}}"/>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label for="category_id">Category</label>
                <select name="category_id" value="{{$service->category_id}}">
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
                <input type="text" name="description" value="{{$service->description}}"/>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" value="{{$service->price}}"/>
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="time">Duration</label>
                <input type="text" name="time" value="{{$service->time}}"/>
                @error('time')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label for="status">Status</label>
                <select name="status" value="{{$service->status}}">
                  <option value="open">Open</option>
                  <option value="overbooked">Overbooked</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <button>
                    Update Service
                </button>
    
                <a href="/"> Back </a>
            </div>
        </form>
    </x-card>  

</x-layout>