<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminContactInterface;
use App\Http\Requests\Contacts\DeleteContactRequest;
use App\Http\Requests\Contacts\UpdateContactRequest;
use App\Mail\ContactAnswerEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminContactController extends Controller
{
    public $adminContactInterface;

    public function __construct(AdminContactInterface $adminContactInterface)
    {
        $this->adminContactInterface = $adminContactInterface;
    }

    public function index()
    {
        return $this->adminContactInterface->index();
    }

    public function show($contactId)
    {
        return $this->adminContactInterface->show($contactId);
    }

    public function update(UpdateContactRequest $request)
    {
        return $this->adminContactInterface->update($request);
    }

    public function delete(DeleteContactRequest $request)
    {
        return $this->adminContactInterface->delete($request);
    }


}
