<x-layout>

    <x-card class="grid grid-cols-2 gap-x-3 w-2/3">
            @if (count($services) == 0)
                <p>No services found</p>
            @endif
        
            @foreach ($services as $service)
                <x-service-card :service="$service" />
            @endforeach

        
            
    </x-card>

    <div>
        {{$services->links()}}
    </div>

</x-layout>