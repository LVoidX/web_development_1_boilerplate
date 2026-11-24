<?php

namespace App\Controllers;

use App\Services\IArticleService;
use App\Services\ArticleService;

class ArticleController
{
    private IArticleService $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index($vars = [])
    {
        $articles = $this->articleService->getAll();
        var_dump($articles);
    }
}
