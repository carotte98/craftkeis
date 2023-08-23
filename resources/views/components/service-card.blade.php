@props(['service'])

<x-card>
    <div>
        <div>
            <div>{{ $service->status }}</div>
            <h3>
                <a href="/services/{{ $service->id }}">{{ $service->title }}</a>
            </h3>
            <div>by {{ $service->user_id }}</div>
            <div>{{ $service->description }}</div>
            <div>{{ $service->time }}</div>
            <div>{{ $service->price }}</div>
            <x-service-category :category="$service->category_id" />
        </div>
    </div>
</x-card>
