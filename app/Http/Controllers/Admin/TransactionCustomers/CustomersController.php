<?php

namespace App\Http\Controllers\Admin\TransactionCustomers;

use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionCustomers\CustomersRequest;
use App\Repositories\Admin\TransactionCustomers\Eloquents\CustomerRepository;
use App\Repositories\Admin\TransactionCustomers\Eloquents\UserRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomersController extends Controller
{
    private $userRepository;
    private $customerRepository;
    public function __construct(UserRepository $userRepository, CustomerRepository $customerRepository)
    {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerRepository->all();
        $param = [
            'customers' => $customers,
        ];
        return view('admin.transaction-customers.customers.list', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userRepository->all();
        $param = [
            'users' => $users
        ];
        return view('admin.transaction-customers.customers.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomersRequest $request)
    {
        $this->customerRepository->store($request);
        return redirect()->route('customers.index')->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customerRepository->find($id);
        $param = [
            'customer' => $customer
        ];
        return view('admin.transaction-customers.customers.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = $this->userRepository->all();
        $customer = $this->customerRepository->find($id);
        $param = [
            'users' => $users,
            'customer' => $customer
        ];
        return view('admin.transaction-customers.customers.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomersRequest $request, $id)
    {
        $this->customerRepository->update($request, $id);
        return redirect()->route('customers.index')->with('success', 'Edit success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customerRepository->destroy($id);
        return redirect()->route('customers.index')->with('success', 'Delete success');
    }

    public function search(Request $request)
    {
        $customers = $this->customerRepository->search($request);
        $param = [
            'customers' => $customers
        ];
        return view('admin.transaction-customers.customers.list', $param);
    }

    public function export()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }
}
