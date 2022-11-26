<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Recipient;
use App\Notifications\ContactMessage;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

   public function send(ContactRequest $message, Recipient $recipient)
   {
       $recipient->notify(new ContactMessage($message));

       return redirect()->back()->withSuccess('Merci pour votre message! Nous vous contacterons dès que possible');
   }
}
