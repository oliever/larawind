<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\EmployeeLevels;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with('roles')->where('current_team_id',auth()->user()->currentTeam->id)->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        DB::insert('insert into team_user (team_id, user_id, role) values (?, ?, ?)', [auth()->user()->currentTeam->id, $user->id, 'editor']);
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        abort_if(auth()->user()->level != 'super_admin', Response::HTTP_FORBIDDEN, '403 Forbidden');
        

        if(empty($request['password'])){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'name' => 'required|min:3',
            ]);
    
            if ($validator->fails()) {
                return redirect('users/' . $user->id .'/edit')
                            ->withErrors($validator)
                            ->withInput();
            }
        }else{
            info('with pw');
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'name' => 'required|min:3',
                'password' => 'required|confirmed|min:6',
            ]);
    
            if ($validator->fails()) {
                return redirect('users/' . $user->id .'/edit')
                            ->withErrors($validator)
                            ->withInput();
            }
        }
        $user->email = $request['email'];
        $user->name = $request['name'];
        if(!empty($request['password'])){
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        session()->flash('success', ['title'=> $user->name . ' updated! ' , 'subtitle'=>'ID: '. $user->email]);

        return redirect()->route('users.index');
    }

    /* public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        info($request['password']);
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    } */

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return redirect()->route('users.index');
    }

    public function resetPassword(Request $request, $level){
        abort_if(auth()->user()->level != 'super_admin', Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($request['_method'] == 'put'){
            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed|min:6',
            ]);
            if ($validator->fails()) {
                return redirect('/users/reset-password/' . $level)
                            ->withErrors($validator)
                            ->withInput();
            }
            User::where(['current_team_id' => auth()->user()->currentTeam->id, 'level'=>$level])->update(['password' => bcrypt($request['password'])]);
            session()->flash('success', ['title'=> 'Password of all ' . $level . ' updated! ' , 'subtitle'=>'']);

            return redirect()->route('users.index');
        }
        return view('users.reset-password', compact('level'));
    }
}
