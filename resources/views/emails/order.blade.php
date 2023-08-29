{{-- this is the actual email that will be sent --}}
<h1>Order Confirmation</h1>

<p>Thank you for your order!</p>

<p>Order ID: {{ $order->id }}</p>
<p>Total Amount: ${{ $order->total }}</p>

<!-- Include more order details as needed -->