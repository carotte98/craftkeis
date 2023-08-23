{{-- <x-layout> --}}

<x-layout>
@if (count($services) == 0)
    <p>No services found</p>
@endif

@foreach ($services as $service)
    <x-service-card :service="$service" />
@endforeach
</x-layout>

<x-layout>
    {{$services->links()}}
</x-layout>

{{-- </x-layout> --}}