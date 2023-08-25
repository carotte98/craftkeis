<x-layout>
    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </a>
        <x-card>
            <x-card-sec> {{-- Profile details --}}
                <img class="w-48 mr-6 mb-6"
                    src="{{ $user->image_address ? asset('storage/' . $user->image_address) : asset('images/no-image.png') }}"
                    alt="profile-picture" />
                <h2>
                    Hello {{ $user->name }}
                </h2>
                <div>Email: {{ $user->email }}</div><br>
                <div>Bio:</div>
                <div>{{ $user->bio }}</div><br>
                <a href="/users/{{ $user->id }}/edit">
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
            </x-card-sec>

            @if ($user->is_creator ==1)
                <x-dashboard-bank :user=$user/>
            @endif

            <x-dashboard-service :user=$user/>

            <x-dashboard-orderClient :user=$user/>

            <x-dashboard-orderCreator :user=$user/>

            <x-card-sec> {{-- DMs --}}
                <h2>
                    Contacts
                </h2>
                <div>
                    {{-- *TEST --}}
                    {{-- Click to add user to contacts --}}
                    <x-card-sec>
                        <h2>All Users (click to add to contacts)</h2>
                        @foreach ($tempContacts as $contact)
                            <div>
                                <strong>
                                    <a href="/users/account/chat/{{ $contact->id }}">{{ $contact->name }}</a>
                                </strong>
                            </div>
                        @endforeach
                    </x-card-sec>
                    {{-- Contacts after conversation has been created --}}
                    {{-- Example user clicks to connect with creator --}}
                    <x-card-sec>
                        <h2>Contacts</h2>
                        @foreach ($contacts as $contact)
                            <div>
                                <strong>
                                    <a href="/users/account/chat/conversation/{{ $contact->id }}">{{ $contact->name }}</a>
                                </strong>
                            </div>
                        @endforeach
                    </x-card-sec>
                </div>
            </x-card-sec>
        </x-card>
        <div>
            @foreach ($user->orderClient as $order)
                <h2>
                    {{ $order }}
                    <strong>Title: {{ $order->title }}</strong>
                    <strong>Description: {{ $order->description }}</strong>
                </h2>
            @endforeach
        </div>
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
