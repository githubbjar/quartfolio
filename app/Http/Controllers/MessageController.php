<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messagesIndex()
    {
        $messages = Message::latest()->get();

        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
            'phone' => 'nullable|string|max:50',
            'is_read' => 'boolean',
        ]);

        $validated['is_read'] = $request->boolean('is_read');

        Message::create($validated);

        return redirect()
            ->route('home')
            ->with('success', 'Message sent successfully. I\'ll be in touch soon!');
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()
            ->back()
            ->with('success', 'Message deleted.');
    }

    public function toggleRead(Message $message)
    {
        $message->update([
            'is_read' => ! $message->is_read,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Message status updated.');
    }
}
