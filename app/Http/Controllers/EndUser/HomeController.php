<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Requests\Contacts\AddContactRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $homeInterface;
    public function __construct(HomeInterface $homeInterface)
    {
        $this->homeInterface = $homeInterface;
    }

    public function index()
    {
        return $this->homeInterface->index();
    }

    public function showArticle($categoryName,$articleId)
    {
        return $this->homeInterface->showArticle($categoryName,$articleId);
    }

    public function contactPage()
    {
        return $this->homeInterface->contactPage();
    }

    public function storeContact(AddContactRequest $request)
    {
        return $this->homeInterface->storeContact($request);
    }
}
