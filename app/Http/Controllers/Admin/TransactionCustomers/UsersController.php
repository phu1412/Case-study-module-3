<?php

namespace App\Http\Controllers\Admin\TransactionCustomers;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionCustomers\UsersRequest;
use App\Repositories\Admin\TransactionCustomers\Eloquents\UserRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->all();
        $param = [
            'users' => $users
        ];
        return view('admin.transaction-customers.users.list', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transaction-customers.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $this->userRepository->store($request);
        return redirect()->route('users.index')->with('success', 'Create success');
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
        $user = $this->userRepository->find($id);
        $param = [
            'user' => $user
        ];
        return view('admin.transaction-customers.users.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {

        $this->userRepository->update($request, $id);
        return redirect()->route('users.index')->with('success', 'Edit success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->destroy($id);
        return redirect()->route('users.index')->with('success', 'Delete success');
    }

    public function search(Request $request)
    {
        $users = $this->userRepository->search($request);
        $param = [
            'users' => $users
        ];
        return view('admin.transaction-customers.users.list', $param);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
