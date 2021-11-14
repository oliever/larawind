<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Location;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$employees = null;//auth()->user()->employees()->get();

        return view('employees.index');
    }

    public function show(Employee $employee)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$roles = Role::pluck('title', 'id');

        //$user->load('roles');

        return view('employees.edit', compact('employee',));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        info($request->validated());
        $employee->update($request->validated());
info('update');
info($request);
    info($employee);

        return redirect()->route('employees.index');
    }

    public function create()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('employees.create');
    }

    public function destroy(Employee $employee)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->delete();

        return redirect()->route('employees.index');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        //DB::insert('insert into team_user (team_id, user_id, role) values (?, ?, ?)', [1, $user->id, 'editor']);
        //$user->roles()->sync($request->input('roles', []));

        return redirect()->route('employees.index');
    }

    public function selectList(Request $request){

        $locationLocked = Location::where('id', auth()->user()->location_locked)->first();
        info($locationLocked);
        $employees = Employee::get();
        if($locationLocked)
            $employees = $locationLocked->employees()->get();//Employee::where('location_id', $locationLocked->id)->get();

        return view('employees.select', compact('locationLocked', 'employees', 'request'));
    }

    public function select(Request $request){
        Cookie::queue('selected_employee', $request['employee_id'], time() + (10 * 365 * 24 * 60 * 60));
        if(\Illuminate\Support\Facades\Route::has($request['current_route']))
            return redirect()->route($request['current_route']);
        return redirect()->route('dashboard');
    }
}
