<div>
    <form action="/users/account/chat/{{ $contactId }}" method="POST">
        @csrf
        <input type="Submit" value="Connect">
    </form>
</div>
