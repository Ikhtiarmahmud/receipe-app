<?php

namespace App\Http\Controllers;

use App\Models\Receipe;
use Illuminate\Http\Request;
use App\Services\ReceipeService;
use App\Services\ReceipeStepService;
use App\Http\Requests\ReceipeRequest;
use App\Services\ReceipeIngridientService;

class ReceipeController extends Controller
{
    /**
     * @var ReceipeService
     */
    private $receipeService;

    public function __construct(
        ReceipeService $receipeService
    ) {
        $this->receipeService = $receipeService;
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

        return view('receipe.form', compact('page'));
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
        $page = "edit";

        return view('receipe.form', compact('receipe', 'page'));
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

        return redirect()->route('receipe.index')->with('success', 'Receipe Updated Successfully !');
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
