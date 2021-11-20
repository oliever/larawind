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
        info("currentRouteName: " . Route::currentRouteName());
        if(!auth()->user()->location_locked)
            return $next($request);

        $lockedLocation = Location::where('id', auth()->user()->location_locked)->first();
        info("User location: " . $lockedLocation->name);
        \Illuminate\Support\Facades\View::share('locationLocked', $lockedLocation);
        $redirectToEmployeeSelect = false;
        if(auth()->user()->shared){
            if($request->hasCookie('selected_employee')) {
                /* info("App\Http\Middleware\EmployeeSelected selected_employee: ");
                info(Employee::where('id', $request->cookie('selected_employee'))->first()); */
                $cookie_selected_employee = $request->cookie('selected_employee');
                info(@"cookie_selected_employee: '{$cookie_selected_employee}'" );

                $employee = Employee::where('id', $cookie_selected_employee)->first();
                if(!$cookie_selected_employee){
                    if(Route::currentRouteName()!='employees.select')
                        return redirect()->route('employees.select', ['current_route' => Route::currentRouteName()]);
                }else if(!$employee){
                    info('employee deleted: ' . $cookie_selected_employee);
                    if(Route::currentRouteName()!='employees.select')
                        return redirect()->route('employees.select', ['current_route' => Route::currentRouteName()]);
                }




                \Illuminate\Support\Facades\View::share('selectedEmployee', $employee);
                $request->merge(array("selectedEmployee" => $employee));
                //info("Selected Employee: " . $employee->name);
                //$request->attributes->add(['selected_employee' => Employee::where('id', $request->cookie('selected_employee'))->first()]);
                return $next($request);
            }else{
                if(Route::currentRouteName()!='employees.select')
                    return redirect()->route('employees.select', ['current_route' => Route::currentRouteName()]);
            }
        }

        return $next($request);
        /* $response = $next($request);
        return $response->withCookie(cookie()->forever('selected_employee', 'hello there')); */
    }
}
