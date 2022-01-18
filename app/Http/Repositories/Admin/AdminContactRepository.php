<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminContactInterface;
use App\Mail\ContactAnswerEmail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AdminContactRepository implements AdminContactInterface
{

    public function index()
    {
        $contacts = Contact::orderBy('status')->get();
        return view('Admin.Contacts.index',compact('contacts'));
    }

    public function show($contactId)
    {
        $contact = Contact::find($contactId);
        return view('Admin.Contacts.show',compact('contact'));
    }

    public function update($request)
    {
        $contact = Contact::find($request->id);
        $contact->update([
            'answer'      => $request->answer,
            'answered_by' => auth()->id(),
            'status'      => 1
        ]);

        $this->email($contact);
        return redirect(route('admin.contacts.all'));
    }

    public function delete($request)
    {
        Contact::find($request->id)->delete();
        Alert::success('Success','Contact Deleted Successfully');
        return redirect()->back();
    }

    public function email($contact)
    {
        Mail::to($contact->email)->send(new ContactAnswerEmail($contact));
        if (Mail::failures()) {
            return Alert::error('Error','Email Not Sent');
        }else{
            return Alert::success('Success','Answer Sent Successfully');

        }
    }
}
