<x-layout>
    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <x-card>
        <header>
            <h2>
                Edit Account Settings
            </h2>
        </header>
    
        <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name: </label>
                <input type="text" name="name" value="{{$user->name}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email">Email: </label>
                <input type="text" name="email" value="{{$user->email}}"/>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone_number">Phone Number: </label>
                <input type="number" name="phone_number" value="{{$user->phone_number}}"/>
                @error('phone_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image_address">Profile Picture: </label>
                <input type="file" name="image_address" value="{{$user->image_address}}"/>
                @error('image_address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password">Password: </label>
                <input type="password" name="password"/>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="confirm_password">Confirm Password: </label>
                <input type="password" name="confirm_password"/>
                @error('confirm_password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div id="bio-input">
                <label for="bio">Bio: </label>
                <input type="text" name="bio" value="{{$user->bio}}"/>
                @error('bio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="is_creator">Are you a creator?</label>
                <input type="checkbox" id="role" name="is_creator" value="1">
            </div>
    
            <div>
                <button>
                    Update Account Settings
                </button>
            </div>
        </form>
    </x-card>
</x-layout>