<?php

namespace App\Http\Controllers\Client\AccountInfo;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\TransactionCustomers\Eloquents\AccountRepository;
use Illuminate\Http\Request;

class AccountInfoController extends Controller
{
    private $accountRepository;
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }
    public function show($id)
    {
        $account = $this->accountRepository->find($id);
        $param = [
            'account' => $account,
        ];
        return view('client.account-info.show', $param);
    }
}
