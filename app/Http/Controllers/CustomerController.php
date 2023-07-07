<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::all();
        return view('customers.index')->with('customers',$customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check()) {
            return view('customers.create');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        if (auth()->check()) {
            Customer::create($request->validated());
            return back()->with('success','Customer Added Succesfully');
        } else {
            return redirect()->route('login');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show')->with('customer',$customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
{
    if (auth()->check()) {
        return view('customers.edit')->with('customer', $customer);
    } else {
        return redirect()->route('login');
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        
        $customer->update($request->validated());
        return back()->with('success','Customer Edited Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->with('success','Customer Deleted Succesfully');
    }

    public function __construct()
{
    $this->middleware('auth')->except('index', 'show');
}
}
