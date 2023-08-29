<x-layout> 
<div class="w-3/6 bg-bgsec dropshadow rounded-lg p-6 mb-2 mx-auto">
    <x-card-sec>
        <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
            Login
        </h2>

        <hr class="border-accent w-5/6 mx-auto my-6">

        <div class="flex flex-col items-center">
            <form action="/users/authenticate" method="POST">
                {{-- Don't forget csrf --}}
                @csrf
    
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email"
                            value="{{ old('email') }}" />
                    </div>
                </div>
                <div>
                    @error('email')
                    <p> {{ $message }}</p>
                    @enderror
                </div>           
    
                <div class="bordered-div">
                    <div class="icon-input-container">
                        <i class="fas fa-key"></i>
                        <input type="password" name="password" />
                    </div>
                </div>        
                    <div>
                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
    
                <hr class="border-accent w-5/6 mx-auto my-6">
    
                <div class="w-full flex justify-center">
                    <div class="" id="Register-button">
                        <button type="submit" class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                            Log In
                        </button>
                        <a href="{{ url()->previous() }}" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
                    </div>
                </div>
    
                <hr class="border-accent w-5/6 mx-auto my-9">
    
                <div class="mt-4 register-footer">
                    <p>Don't have an account?
                        <a href="/register">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </x-card-sec>
</div>
</x-layout>
