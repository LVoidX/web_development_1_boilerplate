<?php

namespace App\Services;

use App\Models\Article;

class ArticleService implements IArticleService
{
	public function getAll(): array
	{
		return [];
	}

	public function get(int $id): ?Article
	{
		return null;
	}

	public function create(Article $article): void
	{
	}

	public function update(Article $article): void
	{
	}

	public function delete(int $id): void
	{
	}
}
