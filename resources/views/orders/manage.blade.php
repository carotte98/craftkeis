<x-layout>
    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>

    @if (count($orders) == 0)
        <p>No orders found</p>
    @endif
    
    @foreach ($orders as $order)
        <x-card>
            <h2>{{ $order->title }}</h2>
            {{-- uses the table relationships to get the information --}}
            <p>Category: {{ $order->service->categories->name }}</p>
            <p>Commission to: {{ $order->userCreator->name }}</p>
            <p>Description: <br>{{ $order->description }}</p>
            <p>Price: {{ $order->price }}</p>
            <p>Status:
                @if ($order->order_status === 'pending')
                    <i class="fas fa-hourglass-half text-yellow-500"></i> Pending
                @elseif ($order->order_status === 'finished')
                    <i class="fas fa-check-circle text-green-500"></i> Completed
                @elseif ($order->order_status === 'accepted')
                    <i class="fas fa-check-circle text-blue-500"></i> Cancelled
                @else
                    Status Unknown
                @endif
            </p>
        </x-card>
    @endforeach
    
</x-layout>