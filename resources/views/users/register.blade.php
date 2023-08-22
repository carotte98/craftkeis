<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- thsi is the font awesome-icons link --}}
    <style>
        .bordered-div {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            width: 300px;
            /* Adjust width as needed */
            background-color: #f4f4f4;
        }

        .icon-input-container {
            display: flex;
            align-items: center;
        }

        .icon-input-container i {
            margin-right: 10px;
            color: #ccc;
        }

        .icon-input-container input {
            border: none;
            border-bottom: 1px solid #ccc;
            padding: 5px;
            width: 100%;
            background-color: #f4f4f4;
        }

        .hidden {
            display: none;
        }
    </style>
    <script>
        function toggleInputs() {
            const isChecked = document.getElementById('role').checked;
            const bioInput = document.getElementById('bio-input');
            const commissionInput = document.getElementById('commission-input');
            const bankInput = document.getElementById('bank_input');

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
    {{-- js script for showing the last 2 inputs when radio button is checked --}}
</head>
<div> {{-- x-layout, not div please replace when layout finished --}}
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"> {{-- Here we also want to replace the div and input a x-card --}}
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register

            </h2>
        </header>

        <form action="/users" method="POST">
            @csrf

            {{-- this div is for the name --}}
            <div class="bordered-div">
                <div class="icon-input-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Name" name="name">
                </div>
            </div>
            @error('name')
                <p class="text-red-500 text-xs mt-1"{{ $message }}></p>
            @enderror

            {{-- this div is for the email --}}
            <div class="bordered-div">
                <div class="icon-input-container">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email">
                </div>
            </div>
            @error('email')
                <p class="text-red-500 text-xs mt-1"{{ $message }}></p>
            @enderror

            {{-- this div is for the phone Number --}}
            <div class="bordered-div">
                <div class="icon-input-container">
                    <i class="fas fa-phone"></i>
                    <input type="number" placeholder="Phone Number" name="phone_number">
                </div>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1"{{ $message }}></p>
            @enderror

            {{-- this div is for the image --}}
            <div class="bordered-div">
                <div class="icon-input-container">
                    <i class="fas fa-image"></i>
                    <input type="file" placeholder="Image" name="image">
                </div>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1"{{ $message }}></p>
            @enderror

            {{-- this div is for the password --}}
            <div class="bordered-div">
                <div class="icon-input-container">
                    <i class="fas fa-key"></i>
                    <input type="text" placeholder="Password" name="password">
                </div>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1"{{ $message }}></p>
            @enderror

            {{-- this div is for the conf password --}}
            <div class="bordered-div">
                <div class="icon-input-container">
                    <i class="fas fa-key"></i>
                    <input type="text" placeholder="Confirm Password" name="confirm_password">
                </div>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1"{{ $message }}></p>
            @enderror

            <div>
                <label for="password2" class="inline-block text-lg mb-2">
                    Are you a creator?
                </label>
                <input type="checkbox" id="role" name="role" value="creator" onclick="toggleInputs()">
            </div>

            {{-- this div is for the bio --}}
            <div class="bordered-div hidden" id="bio-input">
                <div class="icon-input-container">
                    <i class="fas fa-comment"></i>
                    <input type="text" placeholder="Bio" name="bio">
                </div>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1"{{ $message }}></p>
            @enderror

            {{-- this div is for the commission_amount --}}
            <div class="bordered-div hidden" id="commission-input">
                <div class="icon-input-container">
                    <i class="fa-solid fa-briefcase"></i>
                    <input type="number" placeholder="Commission Amount" name="commission_amount">
                </div>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1"{{ $message }}></p>
            @enderror

            {{-- this div is for the bank_id --}}
            <div class="bordered-div hidden" id="bank_input">
                <div class="icon-input-container">
                    <i class="fa-solid fa-building-columns"></i>
                    <input type="text" placeholder="Bank ID" name="bank_id">
                </div>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1"{{ $message }}></p>
            @enderror

            <div class="mb-6">
                <button><a href="">
                        Google

                    </a>
                </button>
                <button>
                    <a href="">
                        Facebook

                    </a>
                </button>
            </div>



            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Sign Up
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Already have an account?
                    <a href="/login" class="text-laravel">Login</a>
                </p>
                <div>
                    <a href="">Terms & conditions</a>
                </div>
            </div>
        </form>
    </div>{{-- Here we also want to replace the div and input a /x-card --}}

</div>{{-- /x-layout, end of the layout --}}
