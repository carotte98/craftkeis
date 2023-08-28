<script>
    const apiKey = "25a2f71e1af3649df4c7055758bf64fb6a52f7b7";
    const apiUrl = `https://emoji-api.com/emojis?access_key=${apiKey}`;

    const scrollThreshold = 80; // Adjust this value for scroll threshold

    let pollingTimeoutId = null;
    // GET EMOJIS
    function getEmojis() {
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const emojiArray = []

                for (let i = 0; i < 100; i++) {
                    emojiArray.push(data[i].character);
                }
                // For testing
                console.log(emojiArray); // Display the fetched data in the console
                // You can process and use the data as needed

                // Populate the emoji-icons div with spans containing emojis
                emojiArray.forEach(emoji => {
                    //console.log(emoji);
                    const emojiContainer = document.querySelector('#emoji-container')
                    const emojiSpan = document.createElement('span');
                    emojiSpan.classList.add('emoji');
                    emojiSpan.textContent = emoji;
                    emojiContainer.appendChild(emojiSpan);
                });
                const emojiList = document.querySelectorAll('.emoji');
                const messageTextarea = document.getElementById('new_message');
                console.log(emojiList);

                emojiList.forEach(emoji => {
                    emoji.addEventListener('click', function() {
                        const emojiCode = this.textContent;
                        const cursorPosition = messageTextarea.selectionStart;
                        const currentText = messageTextarea.value;

                        const newText = currentText.substring(0, cursorPosition) + emojiCode +
                            currentText.substring(cursorPosition);
                        messageTextarea.value = newText;

                        // Optionally, focus on the textarea after inserting the emoji
                        messageTextarea.focus();
                    });
                });
            });
    };

    // STOP POLLING
    function stopPolling() {
        clearTimeout(pollingTimeoutId);
    }

    // START POLLING
    function pollConversation(conversationId) {
        fetch(`/users/account/chat/conversation/poll/${conversationId}`)
            .then(response => response.json())
            .then(data => {

                // UPDATE MESSAGE 
                // clone last card, remove clear, html
                const messageList = document.querySelector('#message-window');
                const innerMessageCard = document.querySelector('#inner-message-card')

                // Clone the message card template
                const messageCardToBeCloned = document.querySelector('#outer-message-card');

                // Clear existing messages
                messageList.innerHTML = '';

                // Clone for each message redundant later
                data.messages.forEach(message => {
                    //Last message card gets cloned
                    const messageCard = messageCardToBeCloned.cloneNode(true);
                    const messageCardFirstChild = messageCard.firstElementChild; // Get the first child

                    messageCardFirstChild.className = ''; // This removes all classes

                    console.log(messageCard.firstElementChild.classList);
                    if ({{ auth()->user()->id }} == message.user_id) {
                        messageCardFirstChild.classList.add('inner-message-card', 'user');
                    } else {
                        messageCardFirstChild.classList.add('inner-message-card');
                    }
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

                // Check if the initial fetch is done
                if (!initialFetchDone) {
                    // Scroll to the bottom of the message list initially
                    const messageList = document.querySelector('#message-window');
                    messageList.scrollTop = messageList.scrollHeight;

                    // Set the flag to true after the initial fetch
                    initialFetchDone = true;
                }

                // Restart polling after a delay
                pollingTimeoutId = setTimeout(() => {
                    const messageList = document.querySelector('#message-window');
                    const isNearBottom = messageList.scrollTop + messageList.clientHeight +
                        scrollThreshold >= messageList.scrollHeight;

                    // Scroll to the bottom of the message list if near the bottom
                    if (isNearBottom) {
                        messageList.scrollTop = messageList.scrollHeight;
                    }
                    pollConversation(conversationId);
                }, 1500); // Poll after 1 second
            })
            .catch(error => {
                console.error('Polling error:', error);
                // Handle errors and restart polling
                setTimeout(() => {
                    // conversationId = getConversationId();
                    pollConversation(conversationId);
                }, 1500); // Retry after 1 second
            });
    }

    // SEND FROM TO SERVER
    function sendDataToServer(formData) {
        fetch('/users/account/chat/conversation', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response:', data);

                // Clear the message textarea
                const messageTextarea = document.querySelector('#new_message');
                messageTextarea.value = '';

                // Optionally, update the UI or perform other actions based on the response
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // START WHEN DOM IS READY
    document.addEventListener('DOMContentLoaded', () => {

        //Fetch Emojis, insert into HTML, add EventListener
        getEmojis();

        // Event Listener for emoji button to toggle class show
        const emojiContainer = document.querySelector('#emoji-container');
        const emojiButton = document.querySelector('#show-emoji');
        emojiButton.addEventListener('click', () => {
            emojiContainer.classList.toggle('show');
        });

        //EventListener for when click on contact to change chat window
        const contacts = document.querySelectorAll("#contact");

        // If previous session variable exists then start conversation
        const lastConversation = {{ session('last_conversation') }};
        console.log(lastConversation)
        if (lastConversation != 0) {
            //Add conversationID to the form
            const conversationIdInput = document.querySelector('#form-conversation_id');
            const newConversationIdValue = lastConversation;
            conversationIdInput.value = newConversationIdValue;
            // Set the flag to false before the initial fetch
            initialFetchDone = false;
            // Start new Conversation Polling
            pollConversation(newConversationIdValue);
        }

        //Evenlistener for message-form submit
        const form = document.querySelector('#message-form');
        const sendButton = document.querySelector('#send-button');
        sendButton.addEventListener('click', () => {
            // Prevent the default form submission
            event.preventDefault(); 
            const formData = new FormData(form);
            sendDataToServer(formData);
        });

        //EventListener for each contact
        contacts.forEach(contact => {
            contact.addEventListener('click', () => {

                stopPolling();

                // Set the flag to false before the initial fetch
                initialFetchDone = false;

                //Get the value(conversationID) of the clicked contact
                const conversationId = parseInt(contact.getAttribute('value'));

                //Add conversationID to the form
                const conversationIdInput = document.querySelector('#form-conversation_id');
                const newConversationIdValue = conversationId;
                conversationIdInput.value = newConversationIdValue;

                // Start new Conversation Polling
                pollConversation(conversationId);

            });
        });
    });
</script>
<style>
    .window {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .message-list {
        width: 360px;
        height: 360px;
        overflow-y: auto;
        border: 5px solid white;
        display: flex;
        flex-direction: column;
    }

    .outer-message-card {
        /* border: 1px solid black; */
        width: 100%;
    }

    /* .inner-message-card needs to come before .user */
    .inner-message-card {
        max-width: 50%;
        border: 1px solid black;
        height: fit-content;
        background-color: #f5f5f5;
    }

    .user {
        margin-left: auto;
        background-color: lightblue;
    }

    .display-none {
        display: none;
    }

    /* ############################################### */


    .emoji-icons {
        width: 360px;
        height: 0px;
        overflow: auto;
        transition: height .1s ease-in-out;

    }

    .show {
        height: 60px;
    }

    #new_message {
        resize: none;
        width: 300px;
    }

    .text-area-container {
        width: fit-content;
        display: flex;
        justify-content: space-between;
        width: 360px;
    }

    .text-buttons {
        display: flex;
        justify-content: flex-end;
    }

    #show-emoji {
        float: left;
    }

    .message-content {
        overflow-wrap: break-word;
    }
</style>
<div>
    {{-- Chat window --}}
    <div class="window">
        <div class="message-list" id="message-window">
            {{-- Display all messages using message-card and javascript --}}
            <div class="outer-message-card" id="outer-message-card">
                <x-message-card />
            </div>
        </div>
        <form method="POST" id="message-form">
            @csrf
            <input type="hidden" name="conversation_id" id="form-conversation_id" value="">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <!-- Textarea with emoji insertion -->
            <div class="emoji-icons" id="emoji-container">
                <!-- Function will add more emoji icons/buttons here -->
            </div>
            <div class="text-area-container">
                <textarea name="message_content" id="new_message" placeholder="Type your message..."></textarea>
                <button id="show-emoji" type="button"> &#x1F600;</button>
                <div class="text-buttons">
                    <button id="send-button" type="submit">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
