<div wire:poll.1000ms class="bawah">
    <div class="roomchat" id="roomchat">
        <div  class="left-container">
            <div class="list_customer">
                @foreach ($lastChats as $lastChat)
                    <button class="nostyle" id="cust" wire:click="selectChat('{{ $lastChat->lastUserID }}')">
                        <div class="customer">
                            <img class="pp" src={{$lastChat->user->profilePicturePath}}>
                            <div class="text">
                                <h1>{{ $lastChat->user->name }}</h1>
                                <p>{{ $lastChat->lastMessage }}</p>
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>

        <div class="right-container">
            @if (empty($chats))
                <div id="no-chat" class="no-chat">
                    <h1>Pilih pengguna untuk melihat pesan</h1>
                </div>
            @else
                <div class="top" id="roomchat4">
                    @php
                        $previousDate = null;
                    @endphp
                    @foreach ($chats as $msg)
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

                        @if ($msg->senderID != '01ee9554-9e84-367d-96ec-bf2a25b4cb3e')
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
            @endif
            <div id="bottom-div" class="bottom">
                <form id="message_form" wire:submit='submit'>
                    <div class="inputs">
                        <input wire:model="message" id="message_input" type="text" name="message"
                            placeholder="Ketik pesan disini..">
                        <button type="submit" id="message_send">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @script --}}
{{-- @endscript --}}


