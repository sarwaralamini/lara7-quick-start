<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
Use App\Page;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;


class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:developer']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::All();

        return view('backend.permissions.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permissions.create');
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
            'title'          => 'required'
        ]);

        $validatedData['title'] = strtolower($validatedData['title']);

        if(Page::create($validatedData))
        {
            $view    = Permission::create(['name' => $validatedData['title']." view"]);
            $add     = Permission::create(['name' => $validatedData['title']." add"]);
            $edit    = Permission::create(['name' => $validatedData['title']." edit"]);
            $delete  = Permission::create(['name' => $validatedData['title']." delete"]);

            return redirect()->route('permissions.index')->with('successMessage', 'Permissions successfully created!');
        }

        return redirect()->route('permissions.index')->with('errorMessage', 'An error has occurred please try again later!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
