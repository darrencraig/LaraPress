<?php

namespace App\Http\Controllers;

use App\News\Repositories\NewsRepository;

class NewsController extends Controller
{
    /**
     * @var NewsRepository
     */
    private $newsRepository;

    /**
     * NewsController constructor.
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function index()
    {
        $articlesQuery = $this->newsRepository->all();

        return view('news.index')->with('articles', $articlesQuery->posts);
    }
}