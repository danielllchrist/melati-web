<div class="bawah">
    <div wire:poll.1000ms class="roomchat" id="roomchat-container">
    {{-- <div x-data="{ scrollToBottom() { this.$nextTick(() => { const container = document.getElementById('roomchat-container'); if (container) container.scrollTop = container.scrollHeight; }); } }" x-init="scrollToBottom()" wire:poll.1000ms class="roomchat" id="roomchat-container"> --}}

        <div class="top" id="roomchat" >
            @php
                $previousDate = null;
            @endphp
            @foreach ($userMsg as $msg)
                @php
                    $currentDate = \Carbon\Carbon::parse($msg->created_at)->isoFormat('dddd, D MMMM YYYY');
                @endphp

                @if ($currentDate != $previousDate)
                    <div class="date">
                        <h1>{{ $currentDate }}</h1>
                    </div>
                    @php
                        $previousDate = $currentDate;
                    @endphp
                @endif

                @if ($msg->senderID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e')
                    <div class="kiri">
                        <div class="left bubble">
                            <div class="msg-content">
                                <h9>{{ $msg->message }}</h9>
                                <p>{{ $msg->created_at->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="kanan">
                        <div class="right bubble">
                            <div class="msg-content">
                                <h9>{{ $msg->message }}</h9>
                                <p>{{ $msg->created_at->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="bottom">
            <form wire:submit.prevent="submit" id="chat-form">
                @csrf
                <div class="inputs">
                    <input wire:loading wire:model="message" id="message_input" type="text" name="message" placeholder="Ketik pesan disini..">
                    <button type="submit" id="message_send">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
