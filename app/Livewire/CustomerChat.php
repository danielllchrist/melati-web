<?php

namespace App\Livewire;

use App\Models\Chat;
use App\Models\LastChat;
use App\Models\RoomChat;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout("layouts.customer")]
class CustomerChat extends Component
{
    public $message='';

    public function submit(){
        $adminID = '01ee9554-9e84-367d-96ec-bf2a25b4cb3e';
        $userID = Auth::id();

        // Cek apakah ada chat sebelumnya
        $existingChat = Chat::where(function ($query) use ($userID, $adminID) {
            $query->where('senderID', $userID)
                ->where('receiverID', $adminID);
        })->orWhere(function ($query) use ($userID, $adminID) {
            $query->where('senderID', $adminID)
                ->where('receiverID', $userID);
        })->latest('created_at')->first();

        if (trim($this->message) === '') {
            // session()->flash('error', 'Pesan tidak boleh kosong.');
            return;
        }
        // Buat chat baru
        $current_message = Chat::create([
            'senderID' => $userID,
            'receiverID' => $adminID,
            'message' => $this->message, 
            'isImage' => false,
        ]);

        if (!$existingChat) {
            $existingChat=$current_message;
        }
        
        // Cek apakah ada LastChat untuk user dan admin
        // $lastChatEntry = LastChat::where('chatID', $existingChat ? $existingChat->chatID : $current_message->chatID)
        // ->where('lastUserID', $userID)
        // ->first();
        
        $lastChatEntry = LastChat::where('chatID', $existingChat->chatID)->first();
        // dd($existingChat->chatID);

        if ($lastChatEntry) {
            // Update entri LastChat yang ada
            $lastChatEntry->update([
                'chatID' => $current_message->chatID, // Mengupdate chatID dengan ID chat yang baru dibuat
                'lastUserID' => $userID, // Set lastUserID dengan ID pengguna yang saat ini login
                'lastMessage' => $this->message,
                'created_at' => now(), // Mengupdate waktu dibuat
                'updated_at' => now(), // Mengupdate waktu diperbarui
            ]);
        } else {
            // Buat entri LastChat baru
            LastChat::create([
                'chatID' => $current_message->chatID, // Set chatID dengan ID chat yang baru dibuat
                'lastUserID' => $userID, // Set lastUserID dengan ID pengguna yang saat ini login
                'lastMessage' => $this->message,
                'created_at' => now(), // Set waktu dibuat
                'updated_at' => now(), // Set waktu diperbarui
            ]);
        }

        // Kosongkan pesan setelah dikirim
        $this->message = '';
        $this->dispatch('message-sent');
        // $this->emit('formSubmitted'); // Emit event setelah submit berhasil
    }

    public function render()
    {
        $adminID = '01ee9554-9e84-367d-96ec-bf2a25b4cb3e';
        $userID = Auth::id();

        // Ambil semua chat yang melibatkan userID atau adminID sebagai sender atau receiver
        $userMsg = Chat::where(function ($query) use ($userID, $adminID) {
            $query->where('senderID', $userID)
                  ->orWhere('receiverID', $userID);
        })->orderBy('created_at', 'asc')->get();

        return view('livewire.customer-chat', ['userMsg' => $userMsg]);
    }
}
