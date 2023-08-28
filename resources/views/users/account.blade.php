<x-layout>
    <div class="flex justify-center mb-3">
        <a href="{{ url()->previous() }}">
            <button class="text-center text-lg p-2 text-white rounded-lg bg-bgsec hover:bg-onhover">
                <i class="fa-solid fa-arrow-left"></i> Back
            </button>
        </a>
    </div>
    <x-card>
        <x-card-sec> {{-- Profile details --}}
            <div class="flex justify-center">
                <img class="w-48 mr-6 mb-6"
                src="{{ $user->image_address ? asset('storage/' . $user->image_address) : asset('images/no-image.png') }}"
                alt="profile-picture" />
            </div>

            <hr class="border-accent w-5/6 mx-auto my-6">
            
            <div class="w-2/3 mx-auto">
                <h2 class="text-lg">
                    <strong>Hello {{ $user->name }}</strong>
                </h2>
                <br>
                <div><strong>Email : </strong> {{ $user->email }}</div><br>
                <div><strong>Bio : </strong></div>
                <div>{{ $user->bio }}</div>
                <br>
            </div>

            <hr class="border-accent w-5/6 mx-auto my-6">
            
            <div class="flex justify-center">
                <a href="/users/{{ $user->id }}/edit">
                    <button class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                        <i class="fa-solid fa-pencil"></i>Edit
                    </button>
                </a>
            </div>
                
            </x-card-sec>

            @if ($user->is_creator ==1)
                <x-dashboard-bank :user=$user/>
            @endif

            <x-dashboard-service :user=$user/>

            <x-dashboard-orderClient :user=$user/>

            <x-dashboard-orderCreator :user=$user/>

        <x-card-sec> 
            {{-- DMs --}}
            {{-- Contacts after conversation has been created --}}
            {{-- Example user clicks to connect with creator --}}
            <h2>Contacts</h2>
            @foreach ($contacts as $contact)
                <div id="contact" value="{{ $contact->conversation_id }}">
                    {{ $contact->name }}
                </div>
            @endforeach

            <x-window></x-window>
        </x-card-sec>
    </x-card>
</x-layout>
