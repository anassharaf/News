<?php

namespace App\Http\Interfaces\EndUser;

interface HomeInterface
{
    public function index();

    public function showArticle($categoryName,$articleId);

    public function contactPage();

    public function storeContact($request);
}
