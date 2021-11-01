<?php

namespace App\Http\Controllers\Admin\TransactionCustomers;

use App\Exports\TransactionOnesExport;
use App\Exports\TransactionsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionCustomers\TransactionsRequest;
use App\Repositories\Admin\TransactionCustomers\Eloquents\AccountRepository;
use App\Repositories\Admin\TransactionCustomers\Eloquents\TransactionRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransactionsController extends Controller
{
    private $transactionRepository;
    private $accountRepository;
    public function __construct(TransactionRepository $transactionRepository, AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->transactionRepository = $transactionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->transactionRepository->all();
        $param = [
            'transactions' => $transactions
        ];
        return view('admin.transaction-customers.transactions.list', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = $this->accountRepository->all();
        $param = [
            'accounts' => $accounts
        ];
        return view('admin.transaction-customers.transactions.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionsRequest $request)
    {
        $this->transactionRepository->store($request);
        return redirect()->route('transactions.index')->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transactions = $this->transactionRepository->searchTransactions($id);
        $account_main = $this->accountRepository->find($id);
        $param = [
            'transactions' => $transactions,
            'account_main' => $account_main
        ];
        return view('admin.transaction-customers.transactions.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = $this->transactionRepository->find($id);
        $accounts = $this->accountRepository->all();
        $param = [
            'transaction' => $transaction,
            'accounts' => $accounts,
        ];
        return view('admin.transaction-customers.transactions.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionsRequest $request, $id)
    {
        $this->transactionRepository->update($request, $id);
        return redirect()->route('transactions.index')->with('success', 'Edit success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->transactionRepository->destroy($id);
        return redirect()->route('transactions.index')->with('success', 'Delete success');
    }

    public function search(Request $request)
    {
        $transactions = $this->transactionRepository->search($request);
        $param = [
            'transactions' => $transactions
        ];
        return view('admin.transaction-customers.transactions.list', $param);
    }

    public function export()
    {
        return Excel::download(new TransactionsExport, 'transactions.xlsx');
    }

    public function exportOne($id)
    {
        return Excel::download(new TransactionOnesExport($id), 'transactionOnes.xlsx');
    }
}
