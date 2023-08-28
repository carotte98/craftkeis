@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 9000)" x-show="show" 
        class="absolute top-0 left-1/2 transform -translate-x-1/2 mt-20 w-96 bg-accent text-white py-10 px-50 shadow-md text-center text-xl ">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif