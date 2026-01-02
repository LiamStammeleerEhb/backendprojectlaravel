<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Your message has been sent.');
    }
}
