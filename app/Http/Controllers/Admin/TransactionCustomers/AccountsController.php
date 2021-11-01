<?php

namespace App\Http\Controllers\Admin\TransactionCustomers;

use App\Exports\AccountsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionCustomers\AccountsRequest;
use App\Repositories\Admin\TransactionCustomers\Eloquents\AccountRepository;
use App\Repositories\Admin\TransactionCustomers\Eloquents\CardRepository;
use App\Repositories\Admin\TransactionCustomers\Eloquents\CustomerRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AccountsController extends Controller
{
    private $accountRepository;
    private $customerRepository;
    private $cardRepository;
    public function __construct(AccountRepository $accountRepository, CustomerRepository $customerRepository, CardRepository $cardRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->customerRepository = $customerRepository;
        $this->cardRepository = $cardRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = $this->accountRepository->all();
        $param = [
            'accounts' => $accounts
        ];
        return view('admin.transaction-customers.accounts.list', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = $this->customerRepository->all();
        $cards = $this->cardRepository->all();
        $param = [
            'customers' => $customers,
            'cards' => $cards
        ];
        return view('admin.transaction-customers.accounts.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountsRequest $request)
    {
        $this->accountRepository->store($request);
        return redirect()->route('accounts.index')->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = $this->accountRepository->find($id);
        $param = [
            'account' => $account
        ];
        return view('admin.transaction-customers.accounts.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = $this->accountRepository->find($id);
        $customers = $this->customerRepository->all();
        $cards = $this->cardRepository->all();
        $param = [
            'account' => $account,
            'customers' => $customers,
            'cards' => $cards,
        ];
        return view('admin.transaction-customers.accounts.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountsRequest $request, $id)
    {
        $this->accountRepository->update($request, $id);

        return redirect()->route('accounts.index')->with('success', 'Edit success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->accountRepository->destroy($id);
        return redirect()->route('accounts.index')->with('success', 'Delete success');
    }

    public function search(Request $request)
    {
        $accounts = $this->accountRepository->search($request);
        $param = [
            'accounts' => $accounts
        ];
        return view('admin.transaction-customers.accounts.list', $param);
    }

    public function export()
    {
        return Excel::download(new AccountsExport, 'accounts.xlsx');
    }

    
}
