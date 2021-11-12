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
        //info(Route::currentRouteName());

        \Illuminate\Support\Facades\View::share('locationLocked', Location::where('id', auth()->user()->location_locked)->first());
        if(auth()->user()->shared){
            if($request->hasCookie('selected_employee')) {
                /* info("App\Http\Middleware\EmployeeSelected selected_employee: ");
                info(Employee::where('id', $request->cookie('selected_employee'))->first()); */
                $employee = Employee::where('id', $request->cookie('selected_employee'))->first();
                \Illuminate\Support\Facades\View::share('selectedEmployee', $employee);

                //$request->attributes->add(['selected_employee' => Employee::where('id', $request->cookie('selected_employee'))->first()]);
                return $next($request);
            }else{
                if(Route::currentRouteName()!='employee.select')
                    return redirect()->route('employee.select', ['current_route' => Route::currentRouteName()]);
            }
        }

        return $next($request);
        /* $response = $next($request);
        return $response->withCookie(cookie()->forever('selected_employee', 'hello there')); */
    }
}
