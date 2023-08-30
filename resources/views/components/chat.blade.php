@props(['contactUsers'])
<div class=" scale-75 md:scale-100 py-5 message-window-page mr-4 bg-bgsec dropshadow rounded-lg p-6 mb-2 mx-auto">
    <details class="group">
        <summary class=" right-10 md:-right-0 flex items-center font-medium cursor-pointer list-none mb-3">
            <span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                    width="24">
                    <path d="M6 9l6 6 6-6"></path>
                </svg>
            </span>
            <p class="-right-10 md:-right-0 sm:text-md md:text-lg lg:text-xl customLogoBold text-black pl-4">MESSAGES</p>
            
        </summary>
        <div class="w-fit bg-background dropshadow rounded-lg p-6 mb-2">
            <hr class="border-accent w-5/6 mx-auto my-6">
            <div class="message-window-open flex flex-col p-2 items-center mb:justify-startt mb-4 md:mb-0 md:flex-row">
                <div class="md:mr-8 mb-4 md.mb-0">
                    <h2 class="customLogoBold text-sm">Contacts</h2>
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
        </div>
    </details>
</div>