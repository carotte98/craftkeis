<x-layout>
    <x-card>
        <header>
            {{-- still a work in progress --}}
            <h2>
                Edit Account Settings
            </h2>
        </header>
    
        <form action="/users/account" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$service->name}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" value="{{$service->email}}"/>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label for="phone_number">Phone Number</label>
                <input type="number" name="phone_number" value="{{$service->phone_number}}"/>
                @error('phone_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="is_creator">Are you a creator?</label>
                <input type="checkbox" id="is_creator" value="creator" name="is_creator">
            </div>

            <div>
                <label for="bio">Bio</label>
                <input type="text" name="bio" value="{{$service->bio}}"/>
                @error('bio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label for="phone_number">Commission Amount</label>
                <input type="number" name="phone_number" value="{{$service->phone_number}}"/>
                @error('phone_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="bank_id">Bank ID</label>
                <input type="text" name="bank_id" value="{{$service->bank_id}}"/>
                @error('bank_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <button>
                    Update Account Settings
                </button>
    
                <a href="/user/account"> Back </a>
            </div>
        </form>
    </x-card>  

</x-layout>