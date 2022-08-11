<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     *
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->findAll();

        return view('category.index', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $page = "create";

        return view('category.form', compact('page'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryService->saveCategoryInfo($request->all());

        return redirect()->route('categories.index')->with('success', 'Category Created Successfully !');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->categoryService->findOne($id);
        $page = "edit";

        return view('category.form', compact('category', 'page'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
    */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryService->updateCategoryInfo($request->all(), $id);

        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->categoryService->findOne($id)->delete();

        return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully');
    }
}
