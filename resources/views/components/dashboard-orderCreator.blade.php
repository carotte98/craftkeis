<x-card-sec> {{-- Manage Orders to you --}}
    <h2>
        Received Requests
    </h2>

    @unless ($user->orderCreator->isEmpty())                
        @foreach ($user->orderCreator as $order)
            <x-card-sec>
                <h2>{{ $order->title }}</h2>
                {{-- uses the table relationships to get the information --}}
                <p>Category: {{ $order->service->categories->name }}</p>
                <p>Commission from: {{ $order->userClient->name }}</p>
                <p>Description: <br>{{ $order->description }}</p>
                <p>Price: {{ $order->price }}</p>
                <p>Status:
                    {{-- pending --}}
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

                    {{-- finished --}}
                    @elseif ($order->order_status === 'finished')
                        <i class="fa-solid fa-check-circle text-green-500"></i> Finished
        
                    {{-- declined --}}
                    @elseif ($order->order_status === 'declined')
                        <i class="fa-solid fa-ban text-red-500"></i> Declined

                    {{-- accepted --}}
                    @elseif ($order->order_status === 'accepted')
                        <i class="fa-regular fa-handshake text-green-500"></i> Accepted

                        {{-- button when creator is finished --}}
                        <form action="/orders/{{$order->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="finished">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 mt-1 rounded">
                                <i class="fa-solid fa-check-circle text-white"></i> Finished
                            </button>
                        </form>
                    @else
                        Status Unknown
                    @endif
                </p>  
            </x-card-sec>
        @endforeach
    @else
        <p>No orders found</p>
    @endunless
</x-card-sec>