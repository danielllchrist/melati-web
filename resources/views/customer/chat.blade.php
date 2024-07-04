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
        <img class="back_icon" src="{{asset('assets/back.svg')}}">
        <h1>Live Chat</h1>
    </div>
    <div class="bawah">
        <div class="roomchat">
            <div class="top">
                <div class="date">
                    <h1>Senin, 27 Mei 2024</h1>
                </div>

                @for ($i = 0; $i < 10; $i++)
                <div class="kiri">
                    <div class="left bubble">
                        <div class="msg-content">
                            <h9>halo ada yang bisa saya bantu?
                            </h9>
                            <p>10.00</p>
                        </div>
                    </div>
                </div>
                <div class="kanan">
                    <div class="right bubble">
                        <div class="msg-content">
                            <h9>halo saya ingin cari produk ini aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                            </h9>
                            <p>10.00</p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="bottom">
                <form id="message_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="inputs">
                        <input id="message_input" type="text" name="message" placeholder="Ketik pesan disini..">
                        <div class="wrap9">
                            <input id="file_input" type="file" name="photo" accept=".png, .jpg, .jpeg" onchange="loadFile(event)">
                            <img id="icon-input-file" src="{{asset('assets/uploadPict.svg')}}">

                        </div>

                        <button type="submit" id="message_send">Kirim</button>

                    </div>
                </form>
            </div>

        </div>
    </div>

    @include('components.customer.footercustomer')
</body>
</html>
