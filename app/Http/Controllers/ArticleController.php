<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    protected $articleService;

    /**
     *
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articleService->findAll();

        return view('article.index', compact('articles'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $page = "create";

        return view('article.form', compact('page'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $this->articleService->saveArticleInfo($request->all());

        return redirect()->route('articles.index')->with('success', 'Article Created Successfully !');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $article = $this->articleService->findOne($id);
        $page = "edit";

        return view('article.form', compact('article', 'page'));
    }

    /**
     * @param ArticleRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ArticleRequest $request, $id): RedirectResponse
    {
        $this->articleService->updateArticleInfo($request->all(), $id);

        return redirect()->route('articles.index')->with('success', 'Article Updated Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->articleService->findOne($id)->delete();

        return redirect()->route('articles.index')->with('success', 'Article Deleted Successfully');
    }
}
