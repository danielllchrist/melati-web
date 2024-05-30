<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    @vite('resources/css/customer/chat.css')
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.customer.headercustomer')
    <div class="atas">
        <img class="back_icon" src="{{asset('assets/back.svg')}}">
        <h1>Live Chat</h1>
    </div>
    <div class="bawah">
        <div class="roomchat">
            <div class="date">
                <h1>Senin, 27 Mei 2024</h1>
            </div>

            <div class="bubble-kiri">

            </div>

            <div class="bubble-kanan">

            </div>

            <form id="message_form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="inputs">
                    <input id="message_input" type="text" name="message" placeholder="Ketik pesan disini..">
                    <div class="wrap9">
                        <input id="file_input" type="file" name="photo" accept=".png, .jpg, .jpeg" onchange="loadFile(event)">            
                        <img id="icon-input-file" src="{{asset('assets/uploadPict.svg')}}">
                    </div>
                    <!-- <div id="msg_wrap">
                        <img id="file_result">
                        <img class="cross" src="{{ asset('assets/silang.svg') }}" onclick="exit('msg_wrap')">
                    </div> -->
                    <button type="submit" id="message_send">Kirim</button>

                </div>
            </form>

        </div>
    </div>

    @include('components.customer.footercustomer')
</body>
</html>
