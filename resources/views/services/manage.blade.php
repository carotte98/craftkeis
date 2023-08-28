<x-layout>
    <x-card>
        <header>
            <a href="/services/create">Create new Service</a>
            <h1>
                Manage Services
            </h1>
        </header>
    
        <table>
            <tbody>
                @unless ($services->isEmpty())
                @foreach ($services as $service)
                <tr>
                    <td>
                        <a href="/services/{{$service->id}}">
                            {{$service->title}}
                        </a>
                    </td>
                    <td>
                        <a href="/services/{{$service->id}}/edit">
                            <i class="fa-solid fa-pencil"></i>Edit
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="/services/{{$service->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">
                                <i class="fa-solid fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>                        
                @endforeach
            @else
            <tr>
                <td>
                    <p>No products found</p>
                </td>
            </tr>
            @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>