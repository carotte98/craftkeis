<x-layout>
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
