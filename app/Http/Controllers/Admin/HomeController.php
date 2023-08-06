<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $users = User::whereHas('roles', function ($q) {
            $q->where('title', 'Counsellor');
        })->get();
        $messages = Message::where('receiver_id', auth()->user()->id)->get();
        return view('home', compact('users','messages'));
    }

    public function userMessages($id)
    {
        $users = User::whereHas('roles', function ($q) {
            $q->where('title', 'Counsellor');
        })->get();

        $messages = Message::where('sender_id', auth()->user()->id)
            ->orWhere('receiver_id', auth()->user()->id)
            ->get();

        $counsellor = User::find($id);

        return view('messages', compact('messages', 'users', 'counsellor'));
    }

    public function storeMessage(Request $request)
    {
        Message::create([
            'message' => $request->message,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $request->receiver_id,
        ]);

        return redirect()->back();
    }
}
