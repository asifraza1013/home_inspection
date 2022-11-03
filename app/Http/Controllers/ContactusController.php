<?php

namespace App\Http\Controllers;

use App\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function storeContactMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $contact = new Contactus();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        toast('We revcieved your request. Soon we will get back to you. Thank you to contact us!','success');
        return back();
    }
}
