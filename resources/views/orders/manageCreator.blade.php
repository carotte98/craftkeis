<x-layout>
    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>

    @if (count($orders) == 0)
        <p>No commissions found</p>
    @endif
    
    <h1 class="text-center">Your commissions</h1>

    @foreach ($orders as $order)
        <x-card>
            <h2>{{ $order->title }}</h2>
            {{-- uses the table relationships to get the information --}}
            <p>Category: {{ $order->service->categories->name }}</p>
            <p>Commission from: {{ $order->userClient->name }}</p>
            <p>Description: <br>{{ $order->description }}</p>
            <p>Price: {{ $order->price }}</p>
            <p>Status:
                @if ($order->order_status === 'pending')
                    <i class="fa-solid fa-hourglass-half text-yellow-500"></i> Pending
                    {{-- creator needs to accept or decline --}}
                    <div class="flex space-x-2">
                        <form action="/orders/{{$order->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 mt-1 rounded">
                                <i class="fa-solid fa-check mr-2"></i> Accept
                            </button>
                        </form>
                        <form action="/orders/{{$order->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="declined">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 mt-1 rounded">
                                <i class="fa-solid fa-times mr-2"></i> Decline
                            </button>
                        </form>
                    </div>    
                @elseif ($order->order_status === 'finished')
                    <i class="fa-solid fa-check-circle text-green-500"></i> Completed
                @elseif ($order->order_status === 'declined')
                    <i class="fa-solid fa-ban text-red-500"></i> Declined
                @elseif ($order->order_status === 'accepted')
                    <i class="fa-solid fa-check-circle text-blue-500"></i> Accepted
                @else
                    Status Unknown
                @endif
            </p>
            

        </x-card>
    @endforeach
    
</x-layout>