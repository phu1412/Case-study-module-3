<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Employees\AccountRequest;
use App\Repositories\Admin\Employees\Eloquents\AccountRepository;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    private $accountRepository;
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
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
        return view('admin.employees.accounts.list', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $this->accountRepository->store($request);
        return redirect()->route('employeesAccounts.index')->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $param = [
            'account' => $account,
        ];
        return view('admin.employees.accounts.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, $id)
    {
        $this->accountRepository->update($request, $id);

        return redirect()->route('employeesAccounts.index')->with('success', 'Edit success');
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
        return redirect()->route('employeesAccounts.index')->with('success', 'Delete success');
    }

    public function search(Request $request)
    {
        $accounts = $this->accountRepository->search($request);
        $param = [
            'accounts' => $accounts
        ];
        return view('admin.employees.accounts.list', $param);
    }
}
