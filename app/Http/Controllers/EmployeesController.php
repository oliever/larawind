<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Cookie;

class EmployeesController extends Controller
{
    public function selectList(Request $request){
        info($request);
        if ($request->isMethod('post')){
            info($request);
            //Cookie::queue('selected_employee', $value, $minutes);
            /* $response = $next($request);
            return $response->withCookie(cookie()->forever('selected_employee', 'hello there')); */
        }
        $employees = Employee::get();
        return view('employees.select', compact('employees', 'request'));
    }

    public function select(Request $request){
        Cookie::queue('selected_employee', $request['employee_id'], time() + (10 * 365 * 24 * 60 * 60));
        return redirect()->route($request['current_route']);
    }
}
