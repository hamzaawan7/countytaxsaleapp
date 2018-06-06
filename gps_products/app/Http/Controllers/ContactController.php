<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function ContactMessagesPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $name = $request->name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $messages = $request->description;
        $adminmail = "support@CountyTaxSaleApp.org";

        Mail::send('emails.email-form', ['name' => $name, 'messages' => $messages, 'email' => $email, 'phone_number' => $phone_number], function ($message) use ($phone_number, $email, $name, $messages, $adminmail) {

            $message->to($adminmail, 'County Tax Sales App')->subject($name);

        });

        return redirect()->back()->with("success", "Message Successfully Send !");

    }

    //admin show message
    public function ContactMessagesView()
    {
        $contacts = Contact::orderBy('id', 'DESC')->get();
        return view('admins.contacts', compact('contacts'));
    }

    public function ContactMessagesDelete($id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->back()->with("success", "Message Successfully Removed !");
    }

    public function ContactMessagesReply($id)
    {
        $contact = Contact::find($id);
        return view('admins.contact-reply', compact('contact'));
    }

    public function ContactMessagesSendEmail(Request $request)
    {
        $contact = Contact::find($request->id);
        $this->validate($request, [
            'text' => 'required',
        ]);

        $data['from'] = "support@CountyTaxSaleApp.org";
        $data['to'] = $contact->email;
        $data['subject'] = "Query Reply";
        $data['content'] = $request->text;

        Mail::send([], [], function($message) use ($data) {
            $message->from($data['from']);
            $message->to($data['to']);
            $message->subject($data['subject']);
            $message->setBody($data['content'], 'text/html');
        });
        /*Mail::raw($msg, function ($message) use ($email) {
            $message->to($email)->subject('Query Reply!');
        });*/

        return redirect()->back()->with("success", "Message Successfully Send !");

    }

}
