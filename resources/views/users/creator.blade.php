<x-layout>
    <x-card>
        <x-card-sec>
            <img class="w-48 mr-6 mb-6" src="{{ $user->image_address ? asset('storage/' . $user->image_address) : asset('images/no-image.png')}}" alt="profile-picture" />
            <h2>
                {{$user->name}}
            </h2>
            <div>Email: {{ $user->email}}</div><br>
            <div>Bio:</div>
            <div>{{ $user->bio}}</div><br>
        </x-card-sec>
        <x-card-sec>
            <h2>Offered Services</h2>
            @foreach ($user->services as $service)
                <x-service-card :service="$service" />
            @endforeach
        </x-card-sec>
        <div class="w-full flex justify-center mt-3">
            <a href="{{ url()->previous() }}" class="py-2 px-4 mx-2 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
        </div>
    </x-card>
</x-layout>
