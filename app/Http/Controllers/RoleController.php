<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Page;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(['role_or_permission:master|role view'],   ['only' => ['index', 'show']]);
        $this->middleware(['role_or_permission:master|role create'], ['only' => ['create', 'store']]);
        $this->middleware(['role_or_permission:master|role edit'],   ['only' => ['edit', 'update']]);
        $this->middleware(['role_or_permission:master|role delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::All();
        return view('backend.roles.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'                  => 'required|min:3|max:100',
            'permissions'           => 'required'
        ]);

        $role = Role::create(['name' => strtolower($validatedData['name'])]);

        if($role)
        {
            $role->givePermissionTo($validatedData['permissions']);
            return redirect()->route('roles.index')->with('successMessage', 'Role successfully created!');
        }
        return redirect()->route('roles.index')->with('errorMessage', 'An error has occurred please try again later!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spatie\Permission\Contracts\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spatie\Permission\Contracts\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $pages = Page::All();
        return view('backend.roles.edit', compact('pages','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spatie\Permission\Contracts\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name'                  => 'required|min:3|max:100|unique:roles,name,'.$role->id,
            'permissions'           => 'required'
        ]);

        $role->name = $validatedData['name'];
        if($role->save())
        {
            $role->syncPermissions($validatedData['permissions']);
            return redirect()->route('roles.index')->with('successMessage', 'Role successfully updated!');
        }
        return redirect()->route('roles.index')->with('errorMessage', 'An error has occurred please try again later!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spatie\Permission\Contracts\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
