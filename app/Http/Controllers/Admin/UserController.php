<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\AssignRolesToUserRequest;
use App\Http\Requests\Users\GivePermissionToUserRequest;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles.permissions','permissions')->paginate(10);
//        dd($users);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
        User::create($request->validated(),[
            'password'=>Hash::make($request->input('password'))
        ]);
        return redirect()->route('admin.users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('admin.users.show',compact('user'));
    }

    public function addRoles(User $user,AssignRolesToUserRequest $request)
    {
        //dd($request->validated());

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->back()->with('success','User roles added successfully');
    }

    public function givePermissions(User $user,GivePermissionToUserRequest $request)
    {
        DB::table('model_has_permissions')->where('model_id',$user->id)->delete();
        $user->givePermissionTo($request->input('permissions'));
        return redirect()->back()->with('success','User permissions added successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user):View
    {
        //
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $authUser = auth()->user();
        $authUser->update($request->safe()->only(['name','email']));

        if($request->filled('current_password','password')){
            $validated = $request->safe()->only(['current_password','password','password_confirmation']);
            $validated['password'] = Hash::make($validated['password']);
            $authUser->update($validated);
        }
       /* $validatedData = $request->validated();


        if ($request->has('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        $user->update($validatedData);*/
        return redirect()->route('admin.users.index')->with('success','User created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','User created successfully');
    }
}
