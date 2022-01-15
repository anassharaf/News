<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\HomeInterface;
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
}
