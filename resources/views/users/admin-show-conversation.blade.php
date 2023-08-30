<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    accent: "#F4A051",
                    onhover: "#f07c0f",
                    // onhover: "#E5A66C",
                    background: "#D9D9D9",
                    buttons: "#C3C3C3",
                    disabled: "#4f4f4f",
                    bgsec: "#949494",
                    open: "#B1E320",
                    closed: "#E34320"
                },
                borderRadius: {
                    'lg': '10px',
                },
            },
        },
    };
</script>
<style>
    body{
        background-color: #E7D0BB;
    }

    .container {
        background-color: #C3C3C3;
        box-shadow: 0px 2px 20px 2px rgba(0, 0, 0, 0.35);
        width: 50%;
        height: 500px;
        overflow: auto;
        margin: auto;
        padding: 15px;
        border-radius: 15px
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
                    <hr class="border-accent mx-auto my-2">
                    <div class="inner-message-card display-none">
                        <div class="message-sender">
                            <span class="customLogo text-sm text-black">{{ $message->users->name }}</span>
                        </div>
                        <div class="message-content my-2 text-lg text-black">
                            <p>{{ $message->message_content }}</p>
                            <span class="message-timestamp text-xs"></span>
                        </div>
                    </div>
                    <hr class="border-accent mx-auto my-2">
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center">
    <a href="{{ url()->previous() }}" class="py-2 px-4 mx-2 mb-8 text-center text-lg text-black rounded-lg bg-buttons hover:bg-onhover">Back</a>
</div>