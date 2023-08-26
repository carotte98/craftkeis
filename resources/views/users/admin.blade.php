<script>
    // ...
    // extend: {
    //   keyframes: {
    //     fadeIn: {
    //       "0%": { opacity: 0 },
    //       "100%": { opacity: 100 },
    //     },
    //   },
    //   animation: {
    //     fadeIn: "fadeIn 0.2s ease-in-out forwards",
    //   },
    // },
    // ...
</script>
<style>
    p {
        max-width: 100%;
        overflow-wrap: break-word;
    }
</style>
<x-layout>
    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </a>
    <x-card>{{-- DMs --}}
        {{-- <x-dashboard-bank :user=$user />

                    <x-dashboard-service :user=$user />

                    <x-dashboard-orderClient :user=$user />

                    <x-dashboard-orderCreator :user=$user /> --}}
        <x-card-sec class="max-w-screen-xl mx-auto px-5 bg-white min-h-sceen">
            <div class="flex flex-col items-center">
                <h2 class="font-bold text-5xl mt-5 tracking-tight">
                    ADMIN DASHBOARD
                </h2>
                <p class="text-neutral-500 text-xl mt-3">
                    List of all Users
                </p>
            </div>
            <div class="divide-y divide-neutral-200 mx-auto">
                @foreach ($users as $user)
                    <div class="py-5">
                        <details class="group">
                            <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                                <p> {{ $user }}</p>
                                <span class="transition group-open:rotate-180">
                                    <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </summary>
                            {{-- <x-dashboard-bank :user=$user /> --}}

                            <x-dashboard-service :user=$user />

                            <x-dashboard-orderClient :user=$user />

                            <x-dashboard-orderCreator :user=$user />
                        </details>
                    </div>
                @endforeach
            </div>
        </x-card-sec>

        <h2>Contacts</h2>
        @foreach ($contacts as $contact)
            <div>
                <strong>
                    <a href="/users/account/chat/conversation/{{ $contact->id }}">{{ $contact->name }}</a>
                </strong>
            </div>
        @endforeach
    </x-card>
</x-layout>
