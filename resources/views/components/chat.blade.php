@props(['contactUsers'])
<x-card class="py-5 message-window-page mr-4" style="width: 600px">
    <details class="group">
        <summary class="flex items-center font-medium cursor-pointer list-none mb-3">
            <span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                    width="24">
                    <path d="M6 9l6 6 6-6"></path>
                </svg>
            </span>
            <p class="customLogo text-lg text-black pl-4">MESSAGES</p>
            
        </summary>
        <x-card-sec>
            <hr class="border-accent w-5/6 mx-auto my-6">
            <div class="message-window-open">
                <div class="mr-8">
                    <h2 class="customLogo text-sm">Contacts</h2>
                    <hr class="border-accent w-5/6 mx-auto my-2">
                    @foreach ($contactUsers as $contact)
                        <p id="contact"
                            class="{{ $contact->conversation_id == session('last_conversation') ? 'active-contact' : '' }}"
                            value="{{ $contact->conversation_id }}">
                            {{ $contact->name }}
                        </p>
                    @endforeach
                </div>
                <x-window />
            </div>
            <hr class="border-accent w-5/6 mx-auto my-6">
        </x-card-sec>
    </details>
</x-card>