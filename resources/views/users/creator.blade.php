<x-layout>
    <x-card>
        
        <x-card-sec>
            <div class="flex justify-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $user->image_address ? asset('storage/' . $user->image_address) : asset('images/no-image.png') }}"
                    alt="profile-picture" />
            </div>

            <hr class="border-accent w-5/6 mx-auto my-6">

            <div class="w-2/3 mx-auto">
                <h2 class="text-sm md:text-lg">
                    <strong>Hi, I'm {{ $user->name }}</strong>
                </h2>
                <br>
                <div class="text-xs md:text-base"><strong>Email : </strong> {{ $user->email }}</div><br>
                <div class="text-xs md:text-base"><strong>Bio : </strong></div>
                <div class="text-xs md:text-base">{{ $user->bio }}</div>
                <br>
            </div>

            <hr class="border-accent w-5/6 mx-auto my-6">
        </x-card-sec>

        <x-card-sec>
            <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
                Offered Services
            </h2>

            <hr class="border-accent w-5/6 mx-auto my-6">
            
            <div class="md:grid md:grid-cols-2 md:gap-3">
                @foreach ($user->services as $service)
                    <x-service-card :service="$service" />
                @endforeach
            </div>
        </x-card-sec>

        <div class="w-full flex justify-center mt-3">
            <a href="{{ url()->previous() }}" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
        </div>

    </x-card>
</x-layout>
