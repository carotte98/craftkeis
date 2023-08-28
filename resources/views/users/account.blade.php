<x-layout>
    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
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
                <!-- {{-- inbox for creators, no longer needed i think? --}}
                <span class="text-lg">
                    <i class="fa-solid fa-inbox"></i>
                    <a href="/users/account/commissions" class="hover:text-accent">Inbox</a>
                </span> -->
        </x-card-sec>

        @if ($user->is_creator ==1)
            <x-dashboard-bank :user=$user/>
        @endif

        @if ($user->is_creator ==1)
            <x-dashboard-service :user=$user/>
        @endif

        <x-dashboard-orderClient :user=$user/>

        @if ($user->is_creator ==1)
            <x-dashboard-orderCreator :user=$user/>
        @endif

        <!-- Shop Manager, leave commented until shop is fully done -->
        <!-- @if ($user->is_creator ==1)
            <x-dashboard-product :user=$user/>
        @endif -->

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
    <x-card>
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

</x-layout>
