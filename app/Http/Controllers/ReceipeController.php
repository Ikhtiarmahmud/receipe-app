<?php

namespace App\Http\Controllers;

use App\Models\Receipe;
use Illuminate\Http\Request;
use App\Services\ReceipeService;
use App\Services\CategoryService;
use App\Services\ReceipeStepService;
use App\Http\Requests\ReceipeRequest;
use App\Services\ReceipeIngridientService;

class ReceipeController extends Controller
{
    /**
     * @var ReceipeService
     */
    private $receipeService;

    /**
     * @var ReceipeIngridientService
     */
    private $receipeIngridientService;

    /**
     * @var ReceipeStepService
     */
    private $receipeStepService;

    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(
        ReceipeService $receipeService,
        ReceipeIngridientService $receipeIngridientService,
        ReceipeStepService $receipeStepService,
        CategoryService $categoryService
    ) {
        $this->receipeService = $receipeService;
        $this->receipeIngridientService = $receipeIngridientService;
        $this->receipeStepService = $receipeStepService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipes = $this->receipeService->findAll();

        return view('receipe.index', compact('receipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = "create";
        $categories = $this->categoryService->findSelected(['id', 'title'])->pluck('title', 'id');

        return view('receipe.form', compact('page', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceipeRequest $request)
    {
        $this->receipeService->saveReceipeInfo($request->all());

        return redirect()->route('receipes.index')->with('success', 'Receipe Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function show(Receipe $receipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipe = $this->receipeService->findOne($id);
        $ingredients = $this->receipeIngridientService->findBy(['receipe_id' => $id]);
        $steps = $this->receipeStepService->findBy(['receipe_id' => $id]);
        $categories = $this->categoryService->findSelected(['id', 'title'])->pluck('title', 'id');
        $page = "edit";

        return view('receipe.form', compact('receipe', 'ingredients', 'steps', 'page', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->receipeService->updateReceipeInfo($request->all(), $id);

        return redirect()->route('receipes.index')->with('success', 'Receipe Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->receipeService->findOne($id)->delete();

        return redirect()->route('receipes.index')->with('success', 'Receipe Deleted Successfully !');
    }
}
