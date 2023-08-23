<x-layout>
<a href="/"><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div>
    <x-card>
        <div>
            <div>{{ $service->status }}</div>
            <h3>{{$service->title}}</h3>
            <div>by {{ $service->user_id }}</div>
            <div>{{ $service->description }}</div>
            <div>{{ $service->time }}</div>
            <div>{{ $service->price }}</div>
            <x-service-category :category="$service->category_id" />
        </div>
    </x-card>
</div>
</x-layout>