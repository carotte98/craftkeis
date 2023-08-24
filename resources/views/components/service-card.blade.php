@props(['service'])

<x-card>
    <div>
        <div>
            <div>{{ $service->status }}</div>
            <h3>
                <a href="/services/{{ $service->id }}">{{ $service->title }}</a>
            </h3>
            <div>by {{ $service->users->name }}</div>
            <div>{{ $service->description }}</div>
            <div>{{ $service->time }}</div>
            <div>{{ $service->price }} €</div>
            <a href="?category_id={{$service->category_id}}">{{$service->categories->name}}</a>
        </div>
    </div>
</x-card>
