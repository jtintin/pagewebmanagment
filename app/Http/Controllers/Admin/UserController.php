<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use spatie\Permission\Traits\HasRoles;
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query all users
    //$users = User::with('roles','permissions')->paginate()->get();
    $users = User::with(['roles', 'permissions'])->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();   
        $permissions = Permission::all();   
        return view('admin.user.create', compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //save information send user
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'roles' => 'nullable|array',     
            'permissions' => 'nullable|array'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        //methods exlusive spatie package
        $user->syncRoles($request->roles??[]);
        $user->syncPermissions($request->permissions??[]);
    return redirect()->route('admin.user.index')->with('success','Usuario creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();   
        $permissions = Permission::all();   
        return view('admin.user.edit', compact('user','roles','permissions'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //save information send user
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'roles' => 'nullable|array',     
            'permissions' => 'nullable|array'
        ]);
        $user -> update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') 
            ? Hash::make($request->password) 
            : $user->password
        ]);
        //methods exlusive spatie package
        $user->syncRoles($request->roles??[]);
        $user->syncPermissions($request->permissions??[]);
    return redirect()->route('admin.user.index')->with('success','Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    return redirect()->route('admin.user.index')->with('success','Usuario eliminado con exito');
    }
}
