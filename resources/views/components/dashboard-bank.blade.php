<x-card-sec> {{-- Bank details --}}
    <h2>
        Bank Details
    </h2>
    @unless ($user->bank_details == null)
        <div>Payment Method: {{$user->bank_details->payment_method}}</div>
        <div>Card Number: ****
            @php
                echo substr ($user->bank_details->cardNumber, -4);
            @endphp
        </div><br>
        <a href="/bankDetails/{{ $user->bank_details->id }}/edit"> <!-- edit page for bank_details does not exist yet -->
            <i class="fa-solid fa-pencil"></i>Edit
        </a>
    @else
        <div>No bank data found!</div>
        <a href="/register/{{ $user->id }}/bankDetails">
            <i class="fa-solid fa-pencil"></i>Add Bank Details
        </a>
    @endunless
</x-card-sec>