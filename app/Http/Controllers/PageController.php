<?php

namespace App\Http\Controllers;

use App\Pages\Repositories\PageRepository;

class PageController extends Controller
{
    /**
     * @var PageRepository
     */
    private $pageRepository;

    /**
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug = 'home')
    {
        $page = $this->pageRepository->findBySlug($slug);

        if(!$page) abort(404);

        return view('pages.show', compact("page"));
    }
}