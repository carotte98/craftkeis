<x-layout>
<div class="w-3/6 bg-bgsec dropshadow rounded-lg p-6 mb-2 mx-auto">
        
    <x-card-sec>
                
        <header>
            <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
            Edit Account Settings
            </h2>
        </header>

        <hr class="border-accent w-5/6 mx-auto my-6">

        <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
        
                    <div class="bordered-div">
                        <div class="icon-input-container">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="name" value="{{$user->name}}"/>
                        </div>
                    </div>
                    <div>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="bordered-div">
                        <div class="icon-input-container">
                            <i class="fas fa-envelope"></i>
                            <input type="text" name="email" value="{{$user->email}}"/>
                        </div>
                    </div>
                    <div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <div class="bordered-div">
                        <div class="icon-input-container">
                            <i class="fas fa-phone"></i>
                            <input type="number" name="phone_number" value="{{$user->phone_number}}"/>
                        </div>
                    </div>
                    <div>
                        @error('phone_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <div class="bordered-div">
                        <div class="icon-input-container">
                            <i class="fas fa-image"></i>
                            <input type="file" name="image_address" value="{{$user->image_address}}"/>
                        </div>
                    </div>
                    <div>
                        @error('image_address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
        
                    {{-- this div is for the password --}}
                    <div class="bordered-div">
                        <div class="icon-input-container">
                            <i class="fas fa-key"></i>
                            <input type="password" placeholder="Password" name="password">
                        </div>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                    @enderror

                    {{-- this div is for the conf password --}}
                    <div class="bordered-div">
                        <div class="icon-input-container">
                            <i class="fas fa-key"></i>
                            <input type="password" placeholder="Confirm Password" name="confirm_password">
                        </div>
                    </div>
                    @error('confirm_password')
                        <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                    @enderror
        
                    <div class="bordered-div" id="bio-input">
                        <div class="icon-input-container">
                            <i class="fas fa-comment"></i>
                            <input type="text" name="bio" value="{{$user->bio}}"/>
                        </div>
                    </div>        
                    <div>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- this div is for the checkbox --}}
                    <div class="bordered-div ">
                        <label for="is_creator" class="inline-block text-lg mb-2">
                            Are you a creator?
                        </label>
                        <input type="checkbox" id="role" onclick="toggleInputs()" name="is_creator" value="{{$user->is_creator}}">
                    </div>
                    
                    <hr class="border-accent w-5/6 mx-auto my-6">

                    <div class="w-full flex justify-center">
                        <div class="" id="Register-button">
                            <button type="submit" class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                                Update Account
                            </button>
                        </div>
                    </div>
        
                    
                
        </form>
    </x-card-sec>
</x-layout>