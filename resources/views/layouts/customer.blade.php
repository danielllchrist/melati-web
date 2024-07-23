<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Chat</title>
    @vite('resources/css/customer/chat.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.customer.headercustomer')
    <div class="atas">
        <img class="back_icon" src="{{ asset('assets/back.svg') }}">
        <h1>Live Chat</h1>
    </div>

    {{ $slot }}

    @include('components.customer.footercustomer')

    @livewireScripts
    <script>
        function scrollChatToBottom() {
            var objDiv = document.getElementById("roomchat");
            if (objDiv) {
                setTimeout(() => {
                    objDiv.scrollTop = objDiv.scrollHeight;
                    console.log("Scrolled to bottom");
                }, 100);
                console.log("Scrolled to bottom");
            } else {
                console.log("Element with ID 'roomchat' not found");
            }
        }

        window.onload = function() {
            console.log("Window loaded");
            if (typeof Livewire !== 'undefined') {
                console.log("Livewire is available");
                scrollChatToBottom(); // Scroll to bottom when the window is fully loaded
                Livewire.hook('message.processed', (message, component) => {
                    console.log("Message processed");
                    scrollChatToBottom(); // Scroll to bottom after a message is processed
                });
            } else {
                console.log("Livewire is not available");
            }
        };

        window.addEventListener('message-sent', function() {
            scrollChatToBottom();
        });
    </script>



</body>

</html>
