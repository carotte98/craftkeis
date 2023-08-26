<x-card-sec> {{-- Manage Orders from you --}}
    <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
        Given Requests
    </h2>

    <hr class="border-accent w-5/6 mx-auto my-6">
    <div class="grid grid-cols-2 gap-3">
        @unless ($user->orderClient->isEmpty())                
            @foreach ($user->orderClient as $order)
                <x-card-sec>
                    <h2 class="text-lg font-bold uppercase mb-1 mx-auto text-center customLogo">{{ $order->title }}</h2>
                    <hr class="border-accent w-5/6 mx-auto my-6">
                    {{-- uses the table relationships to get the information --}}
                    <p><strong>Category : </strong> {{ $order->service->categories->name }}</p>
                    <p><strong>Creator : </strong> {{ $order->userCreator->name }}</p>
                    <p><strong>Description : </strong> <br>{{ $order->description }}</p>
                    <p><strong>Price : </strong> {{ $order->price }}</p>
                    <p><strong>Status : </strong>
                        @if ($order->order_status === 'pending') 
                            <i class="fa-solid fa-hourglass-half text-yellow-500"></i> Pending
                            
                        @elseif ($order->order_status === 'finished')
                            <i class="fa-solid fa-check-circle text-green-500"></i> Completed
                            <hr class="border-accent w-5/6 mx-auto my-6">
                        @elseif ($order->order_status === 'declined')
                            <i class="fa-solid fa-ban text-red-500"></i> Declined
                            
                        @elseif ($order->order_status === 'accepted')
                            <i class="fa-solid fa-check-circle text-blue-500"></i> Accepted
                            
                        @else
                            Status Unknown
                        @endif
                    </p>

                    {{-- only cancel while not completed --}}
                    @unless ($order->order_status === 'finished')
                        <hr class="border-accent w-5/6 mx-auto my-6">
                        <div class="flex justify-center">
                            <form action="/orders/{{$order->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-center text-lg p-2 text-white rounded-lg bg-red-500 hover:bg-red-600">
                                    <i class="fa-solid fa-times mr-2"></i> Cancel
                                </button>
                            </form>   
                        </div>             
                    @endunless
                </x-card-sec>
            @endforeach
        @else
            <hr class="border-accent w-5/6 mx-auto my-6">
            <p>No orders found</p>
        @endunless
    </div>
</x-card-sec>