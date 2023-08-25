<x-layout>
    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </a>
        <x-card>
            <x-card-sec> {{-- Profile details --}}
                <img class="w-48 mr-6 mb-6"
                    src="{{ $user->image_address ? asset('storage/' . $user->image_address) : asset('images/no-image.png') }}"
                    alt="profile-picture" />
                <h2>
                    Hello {{ $user->name }}
                </h2>
                <div>Email: {{ $user->email }}</div><br>
                <div>Bio:</div>
                <div>{{ $user->bio }}</div><br>
                <a href="/users/{{ $user->id }}/edit">
                    <i class="fa-solid fa-pencil"></i>Edit
                </a>
                <a href="/users/account/orders">
                    <i class="fa-solid fa-gear"></i>Orders
                </a>
                {{-- inbox for creators --}}
                <span class="text-lg">
                    <i class="fa-solid fa-inbox"></i>
                    <a href="/users/account/commissions" class="hover:text-accent">Inbox</a>
                </span>
            </x-card-sec>

            <x-card-sec> {{-- Bank details --}}
                <h2>
                    Bank Details
                </h2>
                <div>Payment Method: {{$user->bank_details->payment_method}}</div>
                <div>Card Number: {{$user->bank_details->cardNumber}}</div>
            </x-card-sec>

            <x-card-sec> {{-- Manage Services --}}
                <header>
                    <a href="/services/create">Create new Service</a>
                    <h2>Manage Services</h2>
                </header>            
                <x-card-sec>
                    @unless ($user->services->isEmpty())
                        @foreach ($user->services as $service)
                            <a href="/services/{{$service->id}}">
                                {{$service->title}}
                            </a>
                            <a href="/services/{{$service->id}}/edit">
                                <i class="fa-solid fa-pencil"></i>Edit
                            </a>
                            <form method="POST" action="/services/{{$service->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">
                                    <i class="fa-solid fa-trash"></i>Delete
                                </button>
                            </form>                      
                        @endforeach
                    @else
                        <p>No services found</p>
                    @endunless
                </x-card-sec>
            </x-card-sec>

            <x-card-sec> {{-- Manage Orders from you --}}
                <h2>
                    Given Requests
                </h2>
            
                @unless ($user->orderClient->isEmpty())                
                    @foreach ($user->orderClient as $order)
                        <x-card-sec>
                            <h2>{{ $order->title }}</h2>
                            {{-- uses the table relationships to get the information --}}
                            <p>Category: {{ $order->service->categories->name }}</p>
                            <p>Commission to: {{ $order->userCreator->name }}</p>
                            <p>Description: <br>{{ $order->description }}</p>
                            <p>Price: {{ $order->price }}</p>
                            <p>Status:
                                @if ($order->order_status === 'pending') 
                                    <i class="fa-solid fa-hourglass-half text-yellow-500"></i> Pending
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
            
                            {{-- only cancel while not completed --}}
                            @unless ($order->order_status === 'finished')
                                <form action="/orders/{{$order->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 mt-1 rounded">
                                        <i class="fa-solid fa-trash"></i> Cancel
                                    </button>
                                </form>                
                            @endunless
                        </x-card-sec>
                    @endforeach
                @else
                    <p>No orders found</p>
                @endunless
            </x-card-sec>

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
                            <p>Commission to: {{ $order->userCreator->name }}</p>
                            <p>Description: <br>{{ $order->description }}</p>
                            <p>Price: {{ $order->price }}</p>
                            <p>Status:
                                @if ($order->order_status === 'pending') 
                                    <i class="fa-solid fa-hourglass-half text-yellow-500"></i> Pending
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
            
                            {{-- only cancel while not completed --}}
                            @unless ($order->order_status === 'finished')
                                <form action="/orders/{{$order->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 mt-1 rounded">
                                        <i class="fa-solid fa-trash"></i> Cancel
                                    </button>
                                </form>                
                            @endunless   
                        </x-card-sec>
                    @endforeach
                @else
                    <p>No orders found</p>
                @endunless
            </x-card-sec>

            <x-card-sec> {{-- DMs --}}
                <h2>
                    Contacts
                </h2>
                <div>
                    {{-- *TEST --}}
                    {{-- Click to add user to contacts --}}
                    <x-card-sec>
                        <h2>All Users (click to add to contacts)</h2>
                        @foreach ($tempContacts as $contact)
                            <div>
                                <strong>
                                    <a href="/users/account/chat/{{ $contact->id }}">{{ $contact->name }}</a>
                                </strong>
                            </div>
                        @endforeach
                    </x-card-sec>
                    <hr>
                    {{-- Contacts after conversation has been created --}}
                    {{-- Example user clicks to connect with creator --}}
                    <x-card-sec>
                        <h2>Contacts</h2>
                        @foreach ($contacts as $contact)
                            <div>
                                <strong>
                                    <a href="/users/account/chat/conversation/{{ $contact->id }}">{{ $contact->name }}</a>
                                </strong>
                            </div>
                        @endforeach
                    </x-card-sec>
                </div>
            </x-card-sec>
        </x-card>
        <div>
            @foreach ($user->orderClient as $order)
                <h2>
                    {{ $order }}
                    <strong>Title: {{ $order->title }}</strong>
                    <strong>Description: {{ $order->description }}</strong>
                </h2>
            @endforeach
        </div>
        <hr>
        {{-- *TEST --}}
        {{-- Click to add user to contacts --}}
        <h2>All Users (click to add to contacts)</h2>
        <div>
            @foreach ($tempContacts as $contact)
                <div>
                    <strong>
                        <a href="/users/account/chat/{{ $contact->id }}">{{ $contact->name }}</a>
                    </strong>
                </div>
            @endforeach
        </div>
        <hr>
        {{-- Contacts after conversation has been created --}}
        {{-- Example user clicks to connect with creator --}}
        <h2>Contacts</h2>
        @foreach ($contacts as $contact)
            <div>
                <strong>
                    <a href="/users/account/chat/conversation/{{ $contact->id }}">{{ $contact->name }}</a>
                </strong>
            </div>
        @endforeach
</x-layout>
