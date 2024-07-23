<?php
namespace App\Livewire;

use App\Models\Chat;
use App\Models\LastChat;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;

#[Layout("layouts.admin")]
class AdminChat extends Component
{
    public $message;
    public $chats = []; // Inisialisasi dengan array kosong
    public $lastChats;
    public $selectedUserID;

    public function mount()
    {
        // Ambil lastChats pada mount
        $this->lastChats = LastChat::orderBy('created_at', 'desc')->get();
    }
    public function selectChat($lastUserID)
    {
        $targetID = $lastUserID;
        $this->selectedUserID = $lastUserID;
        // Ambil semua chat yang melibatkan targetID
        $this->chats = Chat::where(function($query) use ($targetID) {
            $query->where('senderID', $targetID)
                  ->orWhere('receiverID', $targetID);
        })->orderBy('created_at', 'asc')->get();
        $this->dispatch('message-sent');
    }

    public function submit()
    {
        Log::info('Submit function called');

        $adminID = '01ee9554-9e84-367d-96ec-bf2a25b4cb3e';
        $userID = $this->selectedUserID;

        // Cek apakah ada chat sebelumnya
        $existingChat = Chat::where(function ($query) use ($userID, $adminID) {
            $query->where('senderID', $userID)
                ->where('receiverID', $adminID);
        })->orWhere(function ($query) use ($userID, $adminID) {
            $query->where('senderID', $adminID)
                ->where('receiverID', $userID);
        })->latest('created_at')->first();

        
        // Buat chat baru
        $current_message = Chat::create([
            'senderID' => $adminID,
            'receiverID' => $userID,
            'message' => $this->message, 
            'isImage' => false,
        ]);

        // Cek apakah ada LastChat untuk user dan admin
        $lastChatEntry = LastChat::where('chatID', $existingChat->chatID)->first();

        if ($lastChatEntry) {
            // Update entri LastChat yang ada
            $lastChatEntry->update([
                'chatID' => $current_message->chatID, // Mengupdate chatID dengan ID chat yang baru dibuat
                'lastUserID' => $userID, // Set lastUserID dengan ID pengguna yang saat ini dipilih
                'lastMessage' => $this->message,
                'created_at' => now(), 
                'updated_at' => now(), 
            ]); 
        } 

        
        // Perbarui $chats dengan chat terbaru dari database
        $this->chats = Chat::where(function($query) use ($userID, $adminID) {
            $query->where('senderID', $userID)
            ->orWhere('receiverID', $userID);
        })->orderBy('created_at', 'asc')->get();
        
        // Refresh lastChats untuk diperbarui di tampilan
        $this->lastChats = LastChat::orderBy('created_at', 'desc')->get();
        
        // Kosongkan pesan setelah dikirim
        $this->message = '';
        $this->dispatch('message-sent');
    }

    public function render()
    {
        $targetID = $this->selectedUserID;
        $this->chats = Chat::where(function($query) use ($targetID) {
            $query->where('senderID', $targetID)
                  ->orWhere('receiverID', $targetID);
        })->orderBy('created_at', 'asc')->get();
        
        return view('livewire.admin-chat', [
            'userMsg' => $this->chats,
            'lastChats' => $this->lastChats
        ]);
    }
}
