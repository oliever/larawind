<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Location;
use Illuminate\Support\Facades\Cookie;

class EmployeesController extends Controller
{
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
