<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use App\Models\Location;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class EmployeeSelected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //always select

        info("currentRouteName: " . Route::currentRouteName());/*
        if(!auth()->user()->location_locked)
            return $next($request); */

        $lockedLocation = Location::where('id', auth()->user()->location_locked)->first();
        //info("User location: " . $lockedLocation->name);
        \Illuminate\Support\Facades\View::share('locationLocked', $lockedLocation);

        if(auth()->user()->shared){
            $redirectToEmployeeSelect = false;
            if($request->hasCookie('selected_employee')) {

                /* info("App\Http\Middleware\EmployeeSelected selected_employee: ");
                info(Employee::where('id', $request->cookie('selected_employee'))->first()); */
                $cookie_selected_employee = $request->cookie('selected_employee');

                $employee = Employee::where('id', $cookie_selected_employee)->first();
                /* 1. Check if employee exists */
                if(!$employee){
                    info(" employee not found: {$cookie_selected_employee}");
                    $redirectToEmployeeSelect = true;
                }
                else{
                    if($employee->status == 'inactive'){/* 2. Check if active */
                        info(" employee is inactive");
                        $redirectToEmployeeSelect = true;
                    }else if(auth()->user()->level != $employee->level){/* 3. check if same level */
                        info(" user level: " .auth()->user()->level . " != employee level: ".$employee->level);
                        $redirectToEmployeeSelect = true;//redirect all levels - managers users will default to manager employee
                    }

                    if(auth()->user()->location_locked){/* 4. check if same location */
                        if((auth()->user()->location_locked != $employee->location_id)){
                            info(" user locked location: " . auth()->user()->location_locked . " != employee location: " .  $employee->location_id);
                            $redirectToEmployeeSelect = true;
                        }
                    }
                }

                \Illuminate\Support\Facades\View::share('selectedEmployee', $employee);
                $request->merge(array("selectedEmployee" => $employee));
                //info("Selected Employee: " . $employee->name);
                //$request->attributes->add(['selected_employee' => Employee::where('id', $request->cookie('selected_employee'))->first()]);
                //return $next($request);
            }else{

                    $redirectToEmployeeSelect = true;
            }

            //always select
            //if(auth()->user()->level != "location_staff" || auth()->user()->level != "headoffice_staff")
               // $redirectToEmployeeSelect = true;

            if($redirectToEmployeeSelect && Route::currentRouteName()!='employees.select'){
                info("redirect to employee.select");
                return redirect()->route('employees.select', ['current_route' => Route::currentRouteName()]);
            }

        }

        return $next($request);
        /* $response = $next($request);
        return $response->withCookie(cookie()->forever('selected_employee', 'hello there')); */
    }
}
