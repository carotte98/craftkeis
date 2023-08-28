<x-card-sec> {{-- Manage Orders from you --}}
    <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
        Given Requests
    </h2>

    <hr class="border-accent w-5/6 mx-auto my-6">
    
        @unless ($user->orderClient->isEmpty())   
        <div class="grid grid-cols-2 gap-3">             
            @foreach ($user->orderClient as $order)
                <x-card-sec>
                    <h2 class="text-lg font-bold uppercase mb-1 mx-auto text-center customLogo">{{ $order->title }}</h2>
                    <hr class="border-accent w-5/6 mx-auto my-6">
                    {{-- uses the table relationships to get the information --}}
                    <p><strong>Service : </strong> {{ $order->service->title }}</p>
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

                    @if($order->order_status=='finished')
                        <div class="flex justify-center">
                            <form action="{{ route('session', ['order' => $order->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="service_name" value="{{ $order->title }}">
                                <input type="hidden" name="total" value="{{ $order->price }}">
                                {{-- <input type="hidden" name="completed_at" value="{{$order->completed_at}}"> --}}
                                <button type="submit" class="text-center text-lg p-2 text-white rounded-lg bg-blue-500 hover:bg-blue-600">
                                    <i class="fa-solid fa-hand-holding-dollar"></i> Pay now
                                </button>
                            </form>
                        </div>
                    @endif
                    

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
        </div>
        @else
            <div class="w-full flex justify-center">
                    <p><strong>No orders found</strong></p>
            </div>
        @endunless

</x-card-sec>