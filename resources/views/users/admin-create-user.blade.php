{{-- no more JS T.T --}}
<x-layout> {{-- x-layout, not div please replace when layout finished --}}
    <div class="w-11/12 md:w-3/6 bg-bgsec dropshadow rounded-lg p-6 mb-2 mx-auto"> {{-- Here we also want to replace the div and input a x-card --}} 
        <x-card-sec>
        {{-- ? Do we need a x-card, always found it wierd (cedric) --}}
        {{-- * Yeah we need it no worries mate --}}
        {{-- ! HELP --}}

            <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                Create User

            </h2>

            <hr class="border-accent w-5/6 mx-auto my-6">
{{-- ! --}}
            <form  action="/users/1" method="POST" enctype="multipart/form-data" id="signUp"> 
                @csrf

                {{-- this div is for the name --}}
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Username" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                    @enderror
                </div>

                {{-- this div is for the email --}}
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email" value="{{old('email')}}">
                    </div>
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                @enderror

                {{-- this div is for the phone Number --}}
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fas fa-phone"></i>
                        <input type="number" placeholder="Phone Number" name="phone_number" value="{{old('phone_number')}}">
                    </div>
                </div>

                {{-- this div is for the image --}}
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fas fa-image"></i>
                        <input type="file" placeholder="Image" name="image_address" value="{{old('image_address')}}" accept="image/png, image/jpeg">>
                    </div>
                </div>

                {{-- this div is for the password --}}
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fas fa-key"></i>
                        <input id="pswd" type="password" placeholder="Password" name="password">
                    </div>
                    <div id="pswd_info" class="bg-green-100 p-4 mt-2 rounded border border-green-200" style="display: none;">
                        <p id="number" class="invalid">a number</p>
                        <p id="symbol" class="invalid">a symbol</p>
                        <p id="capital" class="invalid">uppercase letter</p>
                        <p id="letter" class="invalid">lowercase letter</p>
                        <p id="length" class="invalid">at least 6 characters</p>
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

                {{-- this div is for the bio --}}
                <div class="bordered-div" id="bio-input">
                    <div class="icon-input-container">
                        <i class="fas fa-comment"></i>
                        <input type="text" placeholder="Bio" name="bio">
                    </div>
                </div>

                {{-- this div is for the checkbox --}}
                <div class="bordered-div ">
                    <label for="is_creator" class="inline-block text-lg mb-2">
                        Is he a creator?
                    </label>
                    <input type="checkbox" id="role" name="is_creator" value="1">
                </div>


                <hr class="border-accent w-5/6 mx-auto my-6">


                <div class="w-full flex justify-center">
                    <div class="" id="Register-button">
                        <button type="submit" class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                            Create
                        </button>
                        <a href="{{ url()->previous() }}" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
                    </div>
                </div>
            </form>
        </x-card-sec>
    </div>{{-- Here we also want to replace the div and input a /x-card --}}

</x-layout>{{-- /x-layout, end of the layout --}}

<script src="/js/app.js"></script>

