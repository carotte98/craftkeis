{{-- no more JS T.T --}}

<x-layout> {{-- x-layout, not div please replace when layout finished --}}
    <div class="w-3/6 bg-bgsec dropshadow rounded-lg p-6 mb-2 mx-auto"> {{-- Here we also want to replace the div and input a x-card --}} 
        <x-card-sec>
        {{-- ? Do we need a x-card, always found it wierd (cedric) --}}
        {{-- * Yeah we need it no worries mate --}}

            <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                Register

            </h2>

            <hr class="border-accent w-5/6 mx-auto my-6">

            <form action="/users" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- this div is for the name --}}
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name" name="name" value="{{old('name')}}">
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
                        <input type="file" placeholder="Image" name="image_address" value="{{old('image_address')}}">
                    </div>
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
                        Are you a creator?
                    </label>
                    <input type="checkbox" id="role" onclick="toggleInputs()" name="is_creator" value="1">
                </div>


                <hr class="border-accent w-5/6 mx-auto my-6">


                <div class="w-full flex justify-center">
                    <div class="" id="Register-button">
                        <button type="submit" class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                            Sign Up
                        </button>
                        <a href="{{ url()->previous() }}" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
                    </div>
                </div>

                <div class="mb-6 flex justify-center space-x-2 text-lg" id="Link-button">
                    <button id="google">
                        <a href="">
                            <i class="fa-brands fa-google" style="color: #ffffff;"></i>
                        </a>
                    </button>
                    <button class="" id="facebook">
                        <a href="">
                            <i class="fa-brands fa-facebook-f" style="color: #ffffff;"></i>
                        </a>
                    </button>
                </div>

                <hr class="border-accent w-5/6 mx-auto my-3">

                <div class="mt-4 register-footer">
                    <p>
                        Already have an account?
                        <a href="/login" ><strong>Login</strong></a>
                    </p>
                    <div>
                        <p>Terms & conditions</p>
                    </div>
                </div>
            </form>
        </x-card-sec>
    </div>{{-- Here we also want to replace the div and input a /x-card --}}

</x-layout>{{-- /x-layout, end of the layout --}}
