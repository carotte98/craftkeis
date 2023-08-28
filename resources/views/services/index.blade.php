<x-layout>

    <x-card class="w-2/3">
            <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                @if (count($services) == 0)
                <p>No services found</p>
                @endif
            
                @foreach ($services as $service)
                    <x-service-card :service="$service" />
                @endforeach
            </div>

            <div class="flex justify-between mt-3">
                {{$services->links()}}
            </div>
        
        
            
    </x-card>

    
</x-layout>