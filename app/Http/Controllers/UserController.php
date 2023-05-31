<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Display a listing of the trashed resource.
     */
    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.user.trash', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //return $request->method();
        $data = $request->validated();
        //$data['email_verified_at'] = now();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect(route('user.index'))->with('_store', 'User Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        return $data['password'];
        $user->update($data);
        return redirect(route('user.index'))->with('_update', 'User information updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('user.index'))->with('_destroy', 'User moved to trash bin');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(User $user)
    {
        $user->restore();
        return redirect(route('user.trashed', 'trashed'))->with('_restore', 'User restored successfully');
    }

    /**
     * Permanently Delete the specified resource from storage.
     */
    public function forceDelete(User $user)
    {
        $user->forceDelete();
        return redirect(route('user.trashed', 'trashed'))->with('_forceDelete', 'User Deleted Permanently');
    }
}
