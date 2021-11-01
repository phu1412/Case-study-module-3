<?php

namespace App\Http\Controllers\Client\Tranfers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Tranfers\TranferRequest;
use App\Repositories\Admin\TransactionCustomers\Eloquents\AccountRepository;
use App\Repositories\Admin\TransactionCustomers\Eloquents\TransactionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranfersController extends Controller
{

    private $accountRepository;
    private $transactionRepository;
    public function __construct(AccountRepository $accountRepository, TransactionRepository $transactionRepository)
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Auth::user()->customer->account;
        $param = [
            'accounts' => $accounts,
        ];
        return view('client.tranfers.tranfer-accounts.create', $param);
    }
    public function storeCheck(TranferRequest $request)
    {
        $check = $request->except('_token');
        $from_account = $this->accountRepository->find($check['from_account']);
        if (($from_account->amounts - 50000) < $check['amounts']) {
            return redirect()->route('tranferAccounts.create')->with('danger', 'Số tiền không hợp lệ');
        }
        $to_account = $this->accountRepository->searchCode($check['to_account']);

        return view('client.tranfers.tranfer-accounts.check', compact(['check', 'from_account', 'to_account']));
    }

    public function check(Request $request)
    {
        $success = $this->transactionRepository->store($request);

        return redirect()->route('client.dashboard')->with('successTranfer', compact('success'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
