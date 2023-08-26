<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- thsi is the font awesome-icons link --}}

    {{-- start of styling --}}
    <style>
        .bordered-div {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            width: 300px;
            /* Adjust width as needed */
            background-color: #f4f4f4;
            margin:auto;
            margin-top: 1rem;
        }

        /* fot the icon container */
        .icon-input-container {
            display: flex;
            align-items: center;
        }

        /* for the icon itself */
        .icon-input-container i {
            margin-right: 10px;
            color: #ccc;
        }

        /* style for the input next to icons */
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


        .register-footer{
            text-align: center;
        }


        #Register-button{
            margin-left: 47%;
            margin-top: 1rem;
        }
    </style>
</head>
{{-- end of styling --}}

<form action="/bankDetails" method="POST">
    @csrf

    {{-- this div is for the first name --}}
    <div class="bordered-div">
        <div class="icon-input-container">
            <i class="fa-solid fa-user"></i>
            <input type="text" placeholder="First Name" name="firstName" value="{{old('firstName')}}">
        </div>
    </div>
    <div>
        @error('firstName')
            <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
        @enderror
    </div>

    {{-- this div is for the last name --}}
    <div class="bordered-div">
        <div class="icon-input-container">
            <i class="fa-solid fa-user"></i>
            <input type="text" placeholder="Last Name" name="lastName" value="{{old('lastName')}}">
        </div>
    </div>
    <div>
        @error('lastName')
            <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
        @enderror
    </div>

    {{-- this div is for the cardNumber --}}
    <div class="bordered-div">
        <div class="icon-input-container">
            <i class="fa-solid fa-user"></i>
            <input type="number" placeholder="Card Number" name="cardNumber" value="{{old('cardNumber')}}">
        </div>
    </div>
    <div>
        @error('cardNumber')
            <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
        @enderror
    </div>

        {{-- this div is for the payment_method --}}
        <div class="bordered-div">
            <div class="icon-input-container">
                <i class="fa-solid fa-card"></i>
                <select name="payment_method">
                    <option value="Visa">Visa</option>
                    <option value="MasterCard">MasterCard</option>
                    <option value="Maestro">Maestro</option>
                </select>
            </div>
        </div>
                    {{-- this div is for the CCV --}}
    <div class="bordered-div">
        <div class="icon-input-container">
            <i class="fa-solid fa-user"></i>
            <input type="number" placeholder="CCV" name="ccv" value="{{old('ccv')}}">
        </div>
    </div>
    <div>
        @error('ccv')
            <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
        @enderror
    </div>

            {{-- this div is for the expiration Date --}}
    <div class="bordered-div">
        <div class="icon-input-container">
            <i class="fa-solid fa-user"></i>
            <input type="text" placeholder="MM / YY" name="expireDate" value="{{old('expireDate')}}">
        </div>
    </div>
    <div>
        @error('expireDate')
            <p class="text-red-500 text-xs mt-1 register-footer">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6" id="Register-button">
        <button type="submit" class="bg-white text-black rounded py-2 px-4 hover:bg-white register-footer">
            Submit
        </button>
    </div>

