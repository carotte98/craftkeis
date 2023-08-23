<x-layout>
    <a href="/"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
<div>
    <x-card>
        <div>
            <img class="w-48 mr-6 mb-6" src="{{ $user->image_address ? asset('storage/' . $user->image_address) : asset('images/no-image.png')}}" alt="profile-picture" />
            <h2>
                Hello {{$user->name}}
            </h2>
            <div>Email: {{ $user->email}}</div><br>
            <div>Bio:</div>
            <div>{{ $user->bio}}</div><br>
        </div>
        <a href="/users/{{$user->id}}/edit">
            <i class="fa-solid fa-pencil"></i>Edit
        </a>
    </x-card>
    <form class="inline" method="POST" action="/logout">
        @csrf
        <button>
            Logout
        </button>
    </form>
</div>
</x-layout>