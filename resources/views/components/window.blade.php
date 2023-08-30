<script>
    const apiKey = "25a2f71e1af3649df4c7055758bf64fb6a52f7b7";
    const apiUrl = `https://emoji-api.com/emojis?access_key=${apiKey}`;

    const scrollThreshold = 20; // Adjust this value for scroll threshold
    const messageList = document.querySelector('#message-window');

    let pollingTimeoutId = null;
    let userScrolledUp = false;
    let initialFetch = true;

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
                // console.log(emojiArray); // Display the fetched data in the console

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

    // Function to check if the user has scrolled to the bottom
    // function isScrolledToBottom() {
    //     const messageList = document.querySelector('#message-window');
    //     console.log(messageList.scrollHeight - messageList.clientHeight <= messageList.scrollTop + 1);
    //     console.log(`scrollTop: ${messageList.scrollTop}`);
    //     console.log(`scrollHeight: ${messageList.scrollHeight}`);
    //     console.log(`clientHeight: ${messageList.clientHeight}`);
    //     console.log(messageList.scrollTop + messageList.clientHeight);
    //     console.log(messageList.scrollHeight);
    //     console.log(messageList.scrollTop + messageList.clientHeight <= messageList.scrollHeight + scrollThreshold );
    //     return messageList.scrollTop + messageList.clientHeight <= messageList.scrollHeight + scrollThreshold ;
    // }

    // START POLLING
    function pollConversation(conversationId) {
        fetch(`/users/account/chat/conversation/poll/${conversationId}`)
            .then(response => response.json())
            .then(data => {
                // Record the current scroll position
                const messageList = document.querySelector('#message-window');
                // const scrollPosition = messageList.scrollTop;
                // console.log(scrollPosition);
                // console.log(data);
                // UPDATE MESSAGE 
                // clone last card, remove clear, html
                const innerMessageCard = document.querySelector('#inner-message-card')

                // Clone the message card template
                const messageCardToBeCloned = document.querySelector('#outer-message-card');

                // Remove previous clones with the class name "got-created"
                const elementsToRemove = document.querySelectorAll('.got-cloned');

                // Loop through the NodeList and remove each previous clone
                elementsToRemove.forEach(element => {
                    element.remove();
                });

                // Clone for each message 
                data.messages.forEach(message => {

                    //Last message card gets cloned
                    const messageCard = messageCardToBeCloned.cloneNode(true);
                    const messageCardLastChild = messageCard.lastElementChild; // Get the last child

                    messageCardLastChild.className = ''; // This removes all classes

                    // console.log(messageCard.firstElementChild.classList);
                    if ({{ auth()->user()->id }} == message.user_id) {
                        messageCardLastChild.classList.add('got-cloned', 'inner-message-card', 'user');
                    } else {
                        messageCardLastChild.classList.add('got-cloned', 'inner-message-card');
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
                // if (isScrolledToBottom()) {
                //         const messageList = document.querySelector('#message-window');
                        // messageList.scrollTop = messageList.scrollHeight - messageList.clientHeight;
                        // console.log(`Result ${messageList.scrollTop}`);
                messageList.scrollTop = messageList.scrollHeight;
                // }
                // messageList.scrollTop = messageList.scrollHeight;
                // // Check if the initial fetch is done
                // if (initialFetch) {
                    // Scroll to the bottom of the message window
                    // messageList.scrollTop = messageList.scrollHeight;
                //     initialFetch = false;
                // } 
                // else if (isScrolledToBottom()) {
                //     // Set the recorded scroll position
                //     messageList.scrollTop = scrollPosition;
                // }
                // messageList.scrollTop = messageList.scrollHeight;
                //     // Scroll to the bottom of the message list initially
                //     // const messageList = document.querySelector('#message-window');
                //     messageList.scrollTop = messageList.scrollHeight;
                //     // Set the flag to true after the initial fetch
                //     initialFetch = false;
                // } else {
                //     // Record the current scroll position
                //     const messageList = document.querySelector('#message-window');
                //     const scrollPosition = messageList.scrollTop;
                //     // Load the new conversation and update the message list

                //     // Set the recorded scroll position
                //     messageList.scrollTop = scrollPosition;

                // }

                //If user did not scroll then go to bottom
                // if (userScrolledUp) {
                // messageList.scrollTop = messageList.scrollHeight;
                // }

                // Restart polling after a delay
                pollingTimeoutId = setTimeout(() => {
                    // const messageList = document.querySelector('#message-window');
                    // const isNearBottom = messageList.scrollTop + messageList.clientHeight +
                    //     scrollThreshold >= messageList.scrollHeight;

                    // Scroll to the bottom of the message list if near the bottom
                    // if (isScrolledToBottom()) {
                        // const messageList = document.querySelector('#message-window');
                        // messageList.scrollTop = messageList.scrollHeight - messageList.clientHeight;
                        // console.log(`Result ${messageList.scrollTop}`);
                        // messageList.scrollTop = messageList.scrollHeight;
                    // }
                    pollConversation(conversationId);
                }, 2000); // Poll after 1 second
            })
            .catch(error => {
                console.error('Polling error:', error);
                // Handle errors and restart polling
                setTimeout(() => {
                    // conversationId = getConversationId();
                    pollConversation(conversationId);
                }, 2000); // Retry after 1 second
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
        // console.log(lastConversation)
        if (lastConversation != 0) {
            //Add conversationID to the form
            const conversationIdInput = document.querySelector('#form-conversation_id');
            const newConversationIdValue = lastConversation;
            conversationIdInput.value = newConversationIdValue;
            // Set the flag to false before the initial fetch
            initialFetch = true;
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

        //EventListener if user scrolls up
        // const messageList = document.querySelector('#message-window');
        // messageList.addEventListener('scroll', () => {
        //     console.log(`scrollTop: ${messageList.scrollTop}`);
        // console.log(`scrollHeight: ${messageList.scrollHeight}`);
        // console.log(`clientHeight: ${messageList.clientHeight}`);
        //     // If the user has scrolled to the bottom, update a flag
        //     if (isScrolledToBottom()) {
        //         userScrolledToBottom = true;
        //     } else {
        //         userScrolledToBottom = false;
        //     }
        // });



        //EventListener for each contact
        contacts.forEach(contact => {
            contact.addEventListener('click', () => {

                stopPolling();

                // Set the flag to false before the initial fetch
                initialFetch = true;

                //Get the value(conversationID) of the clicked contact
                const conversationId = parseInt(contact.getAttribute('value'));

                //Add conversationID to the form
                const conversationIdInput = document.querySelector('#form-conversation_id');
                const newConversationIdValue = conversationId;
                conversationIdInput.value = newConversationIdValue;

                //Remove the class active for each contact
                //Get all contact elements
                const contactElements = document.querySelectorAll('#contact');

                // Remove all classes from all contact elements
                contactElements.forEach(contact => {
                    contact.classList.remove(
                        'active-contact'); // Set the class to just 'contact'
                });
                //Set classes to highlight selected contact
                contact.classList.add('active-contact')

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
        margin-left: 4;
    }

    .message-list {
        width: 360px;
        height: 360px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        padding: 6px;
        box-shadow: 0px 2px 20px 2px rgba(0, 0, 0, 0.35);
        border-radius: 15px 15px 0px 0px;
    }

    .outer-message-card {
        /* border: 1px solid black; */
        width: 100%;
        margin: 0px 0px;
    }

    /* .inner-message-card needs to come before .user */
    .inner-message-card {
        max-width: 50%;
        border: 1px solid #949494;
        height: fit-content;
        background-color: #C3C3C3;
        padding: 3px;
        border-radius: 15px;
        margin: 3px 0px;
    }

    .user {
        margin-left: auto;
        background-color: #F4A051;
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
        border: #C3C3C3 solid 2px;
        background: #C3C3C3;
        box-shadow: 0px 2px 20px 2px rgba(0, 0, 0, 0.35);
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
        border-radius: 0px 0px 5px 5px;
        border: #C3C3C3 solid 2px;
        background: #C3C3C3;
        box-shadow: 0px 2px 20px 2px rgba(0, 0, 0, 0.35);

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

    .emoji:hover {
        cursor: pointer;
    }
</style>
{{-- Chat window --}}
<div class="window ml-4">
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
                <button id="send-button" class="text-black" type="submit">Send</button>
            </div>
        </div>
    </form>
</div>
