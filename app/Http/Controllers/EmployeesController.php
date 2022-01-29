<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Location;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmployeesController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$employees = null;//auth()->user()->employees()->get();
        $locations = Location::with('employees')->where('team_id',auth()->user()->currentTeam->id)->get();

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
        $employee->update($request->validated());

        return redirect()->route('employees.index');
    }

    public function create(Location $location = null)
    {

        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(auth()->user()->level == "headoffice_staff" || auth()->user()->level == "location_staff")
            abort('403');
        $stores = Location::where('team_id',auth()->user()->currentTeam->id)->whereNotNull('area_id')->get();
        return view('employees.create', compact('stores','location'));
    }

    public function destroy(Employee $employee)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->delete();

        return redirect()->route('employees.index');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create(array_merge($request->validated(),['team_id' => auth()->user()->currentTeam->id]));
        //DB::insert('insert into team_user (team_id, user_id, role) values (?, ?, ?)', [1, $user->id, 'editor']);
        //$user->roles()->sync($request->input('roles', []));

        return redirect()->route('employees.index');
    }

    public function selectList(Request $request){

        $locationLocked = Location::where('id', auth()->user()->location_locked)->first();
        if(auth()->user()->level == "location_manager"){

            $managers = [];
            if(auth()->user()->level == "location_manager")
                $managers = Employee::where(['location_id'=>auth()->user()->location_locked, 'level'=>'location_manager'])->get();
            if(auth()->user()->level == "headoffice_admin")
                $managers = Employee::where(['location_id'=>auth()->user()->location_locked, 'level'=>'headoffice_admin'])->get();
            if(count($managers)>0){
                info('selected manager: ' . $managers[0]->name);
                Cookie::queue('selected_employee', $managers[0]->id, time() + (10 * 365 * 24 * 60 * 60));
                if(\Illuminate\Support\Facades\Route::has($request['current_route']))
                    return redirect()->route($request['current_route']);
                return redirect()->route('dashboard');
            }
            else{
                Session::flush();
                $request->session()->flash('message', 'No manager found!');
                return redirect()->route('login');
            }
        }

        info(auth()->user()->level);
        if(auth()->user()->level == "super_admin"){
            $superAdmin = Employee::where(['id'=>1])->first();
            info($superAdmin);
            Cookie::queue('selected_employee', $superAdmin->id, time() + (10 * 365 * 24 * 60 * 60));
            if(\Illuminate\Support\Facades\Route::has($request['current_route']))
                    return redirect()->route($request['current_route']);
                return redirect()->route('dashboard');
        }

        $employees = [];
        if($locationLocked)
            $employees = $locationLocked->employees()->where('level',auth()->user()->level)->get();

        return view('employees.select', compact('locationLocked', 'employees', 'request'));
    }

    public function select(Request $request){
        Cookie::queue('selected_employee', $request['employee_id'], time() + (10 * 365 * 24 * 60 * 60));
        if(\Illuminate\Support\Facades\Route::has($request['current_route']))
            return redirect()->route($request['current_route']);
        return redirect()->route('dashboard');
    }
}
