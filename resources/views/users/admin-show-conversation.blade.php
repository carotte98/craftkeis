<style>
    .container {
        width: 50%;
        height: 500px;
        overflow: auto;
        margin: auto;
    }

    .outer-container {
        display: flex;
        justify-content: center;
        align-content: center;
        min-height: 100vh;
    }
</style>
<div class="outer-container">
    <div class="container">
        <div class="message-list">
            <div class="outer-message-card">
                @foreach ($messages as $message)
                    <hr>
                    <div class="inner-message-card display-none">
                        <div class="message-sender">
                            <span class="customLogo text-sm text-black">{{ $message->users->name }}</span>
                        </div>
                        <div class="message-content my-2">
                            <p>{{ $message->message_content }}</p>
                            <span class="message-timestamp text-xs"></span>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
