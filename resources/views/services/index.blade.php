{{-- <x-layout> --}}

<div>
@if (count($services) == 0)
    <p>No services found</p>
@endif

@foreach ($services as $service)
    <x-service-card :service="$service" />
@endforeach
</div>

<div>
    {{$services->links()}}
</div>

{{-- </x-layout> --}}