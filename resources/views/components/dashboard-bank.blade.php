<x-card-sec> {{-- Bank details --}}
    <h2>
        Bank Details
    </h2>
    <div>Payment Method: {{$user->bank_details->payment_method}}</div>
    <div>Card Number: {{$user->bank_details->cardNumber}}</div>
</x-card-sec>