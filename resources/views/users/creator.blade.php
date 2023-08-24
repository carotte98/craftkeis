<x-layout>
    <a href="/"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
<div>
    <x-card>
        <div>
            <img class="w-48 mr-6 mb-6" src="{{ $user->image_address ? asset('storage/' . $user->image_address) : asset('images/no-image.png')}}" alt="profile-picture" />
            <h2>
                {{$user->name}}
            </h2>
            <div>Email: {{ $user->email}}</div><br>
            <div>Bio:</div>
            <div>{{ $user->bio}}</div><br>
        </div>
    </x-card>
</div>
    <h2>Offered Services</h2>
    @foreach ($user->services as $service)
        <x-service-card :service="$service" />
    @endforeach
</x-layout>
