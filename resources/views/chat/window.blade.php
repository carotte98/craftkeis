<x-layout>
    <h2>Chat Window with {{$contact->name}}</h2>
    
    <div class="message-list">
        {{-- Display all messages using message-card --}}
        @foreach ($messages as $message)
            <x-message-card :message="$message" />
        @endforeach
    </div>
    
    <form action="/users/account/chat/conversation" method="POST">
        @csrf
        <input type="hidden" name="conversation_id" value="{{$conversationId}}">
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <textarea name="message_content" id="new_message" placeholder="Type your message..."></textarea>
        <button type="submit">Send</button>
    </form>
</x-layout>

