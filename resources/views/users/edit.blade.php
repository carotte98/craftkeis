<x-layout>
    <x-card>
        <header>
            <h2>
                Edit Account Settings
            </h2>
        </header>
    
        <form action="/users/account" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$user->name}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <button>
                    Update Account Settings
                </button>
    
                <a href="../../users/account"> Back </a>
            </div>
        </form>
    </x-card>  

</x-layout>