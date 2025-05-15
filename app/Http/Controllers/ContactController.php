<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // TODO: Add your email sending logic here
        // Example:
        // Mail::to('admin@example.com')->send(new ContactFormMail($validated));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
