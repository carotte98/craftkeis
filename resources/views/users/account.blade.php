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
        <a href="/users/account/orders">
            <i class="fa-solid fa-gear"></i>Orders
        </a>
        {{-- inbox for creators --}}
        <span class="text-lg">
            <i class="fa-solid fa-inbox"></i>
            <a href="/users/account/commissions" class="hover:text-accent">Inbox</a>
        </span>
    </x-card>
    <form class="inline" method="POST" action="/logout">
        @csrf
        <button>
            Logout
        </button>
    </form>
</div>
    <div>
        <h2>
            Hello {{ $user->name }}
        </h2>
    </div>
    <form class="inline" method="POST" action="/logout">
        @csrf
        <button>
            Logout
        </button>
    </form>
    <hr>
    {{-- *TEST --}}
    {{-- Click to add user to contacts --}}
    <h2>All Users (click to add to contacts)</h2>
    <div>
        @foreach ($tempContacts as $contact)
            <div>
                <strong>
                    <a href="/users/account/chat/{{ $contact->id }}">{{ $contact->name }}</a>
                </strong>
            </div>
        @endforeach
    </div>
    <hr>
    {{-- Contacts after conversation has been created --}}
    {{-- Example user clicks to connect with creator --}}
    <h2>Contacts</h2>
    @foreach ($contacts as $contact)
    <div>
        <strong>
            <a href="/users/account/chat/conversation/{{ $contact->id }}">{{ $contact->name }}</a>
        </strong>
    </div>
@endforeach
</x-layout>
