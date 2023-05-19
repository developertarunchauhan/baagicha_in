<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }
    /**
     * Display a listing of the trashed resource.
     */
    public function trashed()
    {
        $roles = Role::onlyTrashed()->get();
        return view('admin.role.trash', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $validated = $request->validated();
        Role::create($validated);
        return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return $role;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $validated = $request->validated();
        $role->update($validated);
        return redirect(route('role.index'));
    }

    /**
     * Move the specified resource from storage to trash.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('role.index'));
    }

    /**
     * Permanently Remove the specified resource from storage.
     */
    public function forceDelete(Role $role)
    {
        $role->forceDelete();
        return redirect(route('role.trashed', 'trashed'));
    }


    /**
     * Restore the specified resource from storage.
     */
    public function restore(Role $role)
    {
        $role->restore();
        return redirect(route('role.trashed', 'trashed'));
    }
}
