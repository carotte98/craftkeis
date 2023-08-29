<x-card-sec> {{-- Bank details --}}
    <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
        Bank Details
    </h2>
    <hr class="border-accent w-5/6 mx-auto my-6">
    @unless ($user->bank_details == null)
        <div class="w-2/3 mx-auto text-center">
            <div class="text-lg"><strong>Card Number:</strong> 
            </div>
            <p class="text-lg">
                **** **** ****
            @php
                echo substr ($user->bank_details->cardNumber, -4);
            @endphp
            </p>
            <br>
        </div>
        <hr class="border-accent w-5/6 mx-auto my-6">
        <div class="flex justify-center">
            <a href="/bank-details/{{ $user->bank_details->id }}/edit"> <!-- edit page for bank_details does not exist yet -->
                <button class="text-center text-lg p-2 text-white rounded-lg bg-accent hover:bg-onhover">
                    <i class="fa-solid fa-pencil"></i>Edit
                </button>
            </a>
        </div>
    @else
        <div>No bank data found!</div>
        <hr class="border-accent w-5/6 mx-auto my-6">
        {{-- ! --}}
        {{-- @if (auth()->user()->id == 1) --}}
        <a href="/register/{{ $user->id }}/bank-details">
            <i class="fa-solid fa-pencil"></i>Add Bank Details
        </a>
    @endunless
</x-card-sec>