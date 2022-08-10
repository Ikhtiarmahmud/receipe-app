<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    protected $customerService;

    /**
     * CustomerController constructor.
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerService->findAll();

        return view('customer.index', compact('customers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $page = "create";

        return view('customer.form', compact('page'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerRequest $request)
    {
        $this->customerService->saveCustomerInfo($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $customer = $this->customerService->findOne($id);
        $page = "edit";

        return view('customer.form', compact('customer', 'page'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
    */
    public function update(CustomerRequest $request, $id)
    {
        $this->customerService->updateCustomerInfo($request->all(), $id);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->customerService->findOne($id)->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}
