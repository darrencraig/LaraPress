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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = $this->newsRepository->all();

        return view('news.index', compact("articles"));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $article = $this->newsRepository->findBySlug($slug);

        if(!$article) abort(404);

        return view('news.show', compact("article"));
    }
}