<x-layout>
    <div class="w-3/6 bg-bgsec dropshadow rounded-lg p-6 mb-2 mx-auto">
        <x-card-sec>
            <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                Contact Us
            </h2>

            <hr class="border-accent w-5/6 mx-auto my-6">
            
            <form action="/contact" method="POST" class="w-3/4 mx-auto">
                @csrf

                <div class="bordered-div w-3/4">
                    <div class="icon-input-container">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" placeholder="Your Name" name="name" value="{{old('name')}}">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="bordered-div w-3/4">
                    <div class="icon-input-container">
                        <i class="fa-regular fa-envelope"></i>
                        <input class="border border-gray-200 rounded p-2 w-full" type="email" name="email" placeholder="Your Email" value="{{old('email')}}">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="bordered-div w-3/4">
                    <div class="icon-input-container">
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="message" rows="5" placeholder="Do you have a question or suggestion?">{{old('message')}}</textarea>
                    </div>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="border-accent w-5/6 mx-auto my-6">
                
                <div class="w-full flex justify-center">
                    <button class="bg-accent text-lg text-white rounded-lg py-2 px-4 hover:bg-onhover">
                        Send Message
                    </button>
                </div>
            </form>
        </x-card-sec>
    </div>
</x-layout>
