<script>
    const scrollThreshold = 75; // Adjust this value for scroll threshold

    function pollConversation(conversationId) {
        fetch(`/users/account/chat/conversation/poll/${conversationId}`)
            .then(response => response.json())
            .then(data => {

                // console.log(data);
                const messageList = document.querySelector('#message-window');

                // Clone the message card template
                const messageCardToBeCloned = document.querySelector('.message-card');

                // Clear existing messages
                messageList.innerHTML = ''; 

                // Clone for each message
                data.messages.forEach(message => {
                    const messageCard = messageCardToBeCloned.cloneNode(true);

                    // Clean the date
                    const time = message.created_at.replace('T', ' ').slice(0, -8);

                    // Populate the cloned message card with data
                    messageCard.querySelector('.message-sender span').textContent = message
                        .user_name;
                    messageCard.querySelector('.message-content p').textContent = message
                        .message_content;
                    messageCard.querySelector('.message-timestamp').textContent = time;

                    // Append the cloned message card to the message list
                    messageList.appendChild(messageCard);
                });

                // Restart polling after a delay
                setTimeout(() => {
                    const messageList = document.querySelector('#message-window');
                    const isNearBottom = messageList.scrollTop + messageList.clientHeight +
                        scrollThreshold >= messageList.scrollHeight;

                    // Scroll to the bottom of the message list if near the bottom
                    if (isNearBottom) {
                        messageList.scrollTop = messageList.scrollHeight;
                    }
                    pollConversation(conversationId);
                }, 1000); // Poll after 1 second
            })
            .catch(error => {
                console.error('Polling error:', error);
                // Handle errors and restart polling
                setTimeout(() => {
                    pollConversation(conversationId);
                }, 1000); // Retry after 1 second
            });
    }

    // Start polling when the DOM is ready
    document.addEventListener('DOMContentLoaded', () => {
        const emojiList = document.querySelectorAll('.emoji');
        const messageTextarea = document.getElementById('new_message');
        
        emojiList.forEach(emoji => {
            emoji.addEventListener('click', function() {
                const emojiCode = this.textContent;
                const cursorPosition = messageTextarea.selectionStart;
                const currentText = messageTextarea.value;
                
                const newText = currentText.substring(0, cursorPosition) + emojiCode + currentText.substring(cursorPosition);
                messageTextarea.value = newText;
                
                // Optionally, focus on the textarea after inserting the emoji
                messageTextarea.focus();
            });
        });
        
        // Pass the conversation ID from the view
        const conversationId = {{ $conversationId }};
        // Scroll to the bottom of the message list initially
        const messageList = document.querySelector('#message-window');
        messageList.scrollTop = messageList.scrollHeight;
        // Call the polling
        // pollConversation(conversationId);

        
    });
</script>
<style>
    .message-list {
        width: 360px;
        height: 360px;
        overflow: auto;
    }

    .center {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
</style>
<x-layout>
    <div class="center">
        <h2>Chat Window with {{ $contact->name }} &#x1F600;</h2>

        <div class="message-list" id="message-window">
            {{-- Display all messages using message-card --}}
            @foreach ($messages as $message)
                <x-message-card :message="$message" />
            @endforeach
        </div>

        <form action="/users/account/chat/conversation" method="POST">
            @csrf
            <input type="hidden" name="conversation_id" value="{{ $conversationId }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            
            <!-- Textarea with emoji insertion -->
            <div class="textarea-container">
                <textarea name="message_content" id="new_message" placeholder="Type your message..."></textarea>
                <div class="emoji-icons">
                    <span class="emoji" data-emoji="\ud83d\ude00">&#x1F600;</span>
                    <span class="emoji" data-emoji="\ud83d\udc4d">&#x1F44D;</span>
                    <!-- Add more emoji icons/buttons here -->
                </div>
            </div>
            
            <button type="submit">Send</button>
        </form>
    </div>
</x-layout>
