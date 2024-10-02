<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function create()
    {
    return view('message.create');
    }
    public function store(Request $request)
    {
        Message::create([
            'content' => $request->content,
            'user_id' => Auth::id(), 
        ]);
        return redirect()->route('home');
    }
    
    public function edit(Message $message)
    {
        return view('message.edit' , compact('message'));
    }
    public function update(Request $request , Message $message)
    {
        $message -> update ([
            'content'=>$request->content,
        ]);
        return redirect()->route('home');
    }
    public function destroy(Message $message)
    { 
        $message ->delete();
        return redirect()->route('home');
    }
}
