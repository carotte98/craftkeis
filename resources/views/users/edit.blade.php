<x-layout>
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

            <div>
                <label for="is_creator">Are you a creator?</label>
                <input type="checkbox" id="role" onclick="toggleInputs()" name="is_creator" value="{{$user->is_creator}}">
            </div>

            <div class="hidden" id="bio-input">
                <label for="bio">Bio: </label>
                <input type="text" name="bio" value="{{$user->bio}}"/>
                @error('bio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="hidden" id="commission-input">
                <label for="commission_amount">Commission Amount: </label>
                <input type="number" name="commission_amount" value="{{$user->commission_amount}}"/>
                @error('commission_amount')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="hidden" id="bank-input">
                <label for="bank_id">Bank ID: </label>
                <input type="text" name="bank_id" value="{{$user->bank_id}}"/>
                @error('bank_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <button>
                    Update Account Settings
                </button>
    
                <a href="../../users/{{$user->id}}"> Back </a>
            </div>
        </form>
    </x-card>  

    <script>
        function toggleInputs() {
            const isChecked = document.getElementById('role').checked;
            const bioInput = document.getElementById('bio-input');
            const commissionInput = document.getElementById('commission-input');
            const bankInput = document.getElementById('bank-input');

            if (isChecked) {
                bioInput.classList.remove('hidden');
                commissionInput.classList.remove('hidden');
                bankInput.classList.remove('hidden');
            } else {
                bioInput.classList.add('hidden');
                commissionInput.classList.add('hidden');
                bankInput.classList.add('hidden');
            }
        }
    </script>
</x-layout>