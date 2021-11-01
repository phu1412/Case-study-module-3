<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Employees\EmployeesInfoRequest;
use App\Repositories\Admin\Employees\Eloquents\EmployeesInfoRepository;
use App\Repositories\Admin\Employees\Eloquents\PositionRepository;
use Illuminate\Http\Request;

class EmployeesInfoController extends Controller
{
    private $employeesInfoRepository;
    private $positionRepository;
    public function __construct(EmployeesInfoRepository $employeesInfoRepository, PositionRepository $positionRepository)
    {
        $this->employeesInfoRepository = $employeesInfoRepository;
        $this->positionRepository = $positionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeInfos = $this->employeesInfoRepository->All();
        $param = [
            'employeeInfos' => $employeeInfos,
        ];
        return view('admin.employees.employees-info.list', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = $this->positionRepository->All();
        $param = [
            'positions' => $positions
        ];
        return view('admin.employees.employees-info.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesInfoRequest $request)
    {
        $this->employeesInfoRepository->store($request);
        return redirect()->route('employees_info.index')->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeInfo = $this->employeesInfoRepository->find($id);
        $param = [
            'employeeInfo' => $employeeInfo
        ];
        return view('admin.employees.employees-info.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $employeeInfo = $this->employeesInfoRepository->find($id);
        $positions = $this->positionRepository->All();
        $param = [
            'employeeInfo' => $employeeInfo,
            'positions' => $positions
        ];
        return view('admin.employees.employees-info.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesInfoRequest $request, $id)
    {
        $this->employeesInfoRepository->update($request, $id);
        return redirect()->route('employees_info.index')->with('success', 'Edit success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeesInfoRepository->destroy($id);
        return redirect()->route('employees.index')->with('success', 'Delete success');
    }
}
