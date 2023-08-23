{{-- x-layout --}}
<div>
    <h2>
        Hello {{$user->name}}
    </h2>
</div>
<form class="inline" method="POST" action="/logout">
    @csrf
    <button>
        Logout
    </button>
</form>