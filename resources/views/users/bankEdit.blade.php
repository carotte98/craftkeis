<x-layout>
    <x-card class="w-2/6 ">
        <x-card-sec>
            <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                Edit Bank Details
            </h2>
            
            <hr class="border-accent w-5/6 mx-auto my-6">
    
            <form action="/bankDetails/{{$bank_details->id}}" method="POST">
                @csrf
                @method('PUT')

            {{-- this div is for the first name --}}
            <div class="bordered-div">
                <label for="firstName">First Name: </label>
                <input type="text" name="firstName" value="{{$bank_details->firstName}}">
            </div>
            <div>
                @error('firstName')
                    <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- this div is for the last name --}}
            <div class="bordered-div">
                <label for="lastName">Last Name: </label>
                <input type="text" name="lastName" value="{{$bank_details->lastName}}">
            </div>
            <div>
                @error('lastName')
                    <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- this div is for the cardNumber --}}
            <div class="bordered-div">
                <label for="cardNumber">Card Number: </label>
                <input type="number" name="cardNumber" value="{{$bank_details->cardNumber}}">
            </div>
            <div>
                @error('cardNumber')
                    <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- this div is for the payment_method --}}
            <div class="bordered-div">
                <label for="payment_method">Payment Method: </label>
                <select name="payment_method" value="{{$bank_details->payment_method}}">
                    <option value="Visa">Visa</option>
                    <option value="MasterCard">MasterCard</option>
                    <option value="Maestro">Maestro</option>
                </select>
            </div>
            <div>
                @error('payment_method')
                    <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                @enderror
            </div>

                    {{-- this div is for the CCV --}}
            <div class="bordered-div">
                <label for="ccv">CCV: </label>
                <input type="number" name="ccv" value="{{$bank_details->ccv}}">
            </div>
            <div>
                @error('ccv')
                    <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                @enderror
            </div>

            {{-- this div is for the expiration Date --}}
            <div class="bordered-div">
                <label for="expireDate">Expiration Date: </label>
                <input type="text" name="expireDate" value="{{$bank_details->expireDate}}">
            </div>
            <div>
                @error('expireDate')
                    <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full flex justify-center mt-4">
                <div class="" id="Register-button">
                    <button type="submit" class="text-center text-sm md:text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                        Update Bank Details
                    </button>
                </div>
                <a href="/users/{{auth()->user()->id}}" class="py-2 px-4 mx-2 text-center  text-sm md:text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
            </div>
            </form>
        </x-card-sec>
    </x-card>  
</x-layout>

