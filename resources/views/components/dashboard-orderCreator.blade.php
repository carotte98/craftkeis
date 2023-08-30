<x-card-sec> {{-- Manage Orders to you --}}
    <h2 class="text-2xl font-bold uppercase mb-1 mx-auto text-center customLogo">
        Received Requests
    </h2>

    <hr class="border-accent w-5/6 mx-auto my-6">

    

        @unless ($user->orderCreator->isEmpty())   
        <div class="md:grid md:grid-cols-2 gap-3">             
        @foreach ($user->orderCreator as $order)
            <x-card-sec>
                <h2 class="text-lg font-bold uppercase mb-1 mx-auto text-center customLogo">{{ $order->service->title }}</h2>
                <hr class="border-accent w-5/6 mx-auto my-6">
                {{-- uses the table relationships to get the information --}}
                <p><strong>Category : </strong> {{ $order->service->categories->name }}</p>
                <p><strong>Client : </strong> 
                    <a href="/creators/{{ $order->userClient->id }}" class="w-full rounded-full bg-buttons px-1">
                        {{ $order->userClient->name }}</a>                    
                </p>
                <p><strong>Title : </strong>{{ $order->title }}</p>
                <p><strong>Description : </strong> <br>{{ $order->description }}</p>
                <p><strong>Price : </strong> {{ $order->price }}€</p>
                <p><strong>Status : </strong>
                    {{-- pending --}}
                    @if ($order->order_status === 'pending')
                    
                        <i class="fa-solid fa-hourglass-half text-yellow-500"></i> Pending
                        <hr class="border-accent w-5/6 mx-auto my-6">
                        {{-- creator needs to accept or decline --}}
                        <div class="flex space-x-2">
                            <form action="/orders/{{$order->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="accepted">
                                    <button type="submit" class="text-center text-lg p-2 text-white rounded-lg bg-blue-500 hover:bg-blue-600">
                                        <i class="fa-solid fa-check mr-2"></i> Accept
                                    </button>
                                </form>
                                <form action="/orders/{{$order->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="declined">
                                    <button type="submit" class="text-center text-lg p-2 text-white rounded-lg bg-red-500 hover:bg-red-600">
                                        <i class="fa-solid fa-times mr-2"></i> Decline
                                    </button>
                                </form>
                                
                            </div>    
                            

                        {{-- finished --}}
                        @elseif ($order->order_status === 'finished')
                            <i class="fa-solid fa-check-circle text-green-500"></i> Finished
                            <hr class="border-accent w-5/6 mx-auto my-6">
            
                        {{-- declined --}}
                        @elseif ($order->order_status === 'declined')
                            <i class="fa-solid fa-ban text-red-500"></i> Declined
                            <hr class="border-accent w-5/6 mx-auto my-6">

                        {{-- accepted --}}
                        @elseif ($order->order_status === 'accepted')
                            <i class="fa-regular fa-handshake text-green-500"></i> Accepted
                            <hr class="border-accent w-5/6 mx-auto my-6">
                            
                            {{-- button when creator is finished --}}
                            <form action="/orders/{{$order->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="finished">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 mt-1 rounded">
                                    <i class="fa-solid fa-check-circle text-white"></i> Finished
                                </button>
                            </form>
                            <hr class="border-accent w-5/6 mx-auto my-6">

                            {{-- paid --}}
                            @elseif ($order->order_status === 'paid')
                                <i class="fa-solid fa-money-bill text-green-500"></i> Paid
                                <hr class="border-accent w-5/6 mx-auto my-6">
                        @else
                            Status Unknown
                        @endif
                    </p>  
                </x-card-sec>
            @endforeach
        </div>
        @else
        <div class="w-full flex justify-center">
            <p><strong>No orders found</strong></p>
        </div>
        @endunless

</x-card-sec>