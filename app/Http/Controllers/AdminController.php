<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AdminResource::collection(Admin::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        Admin::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'is_super' => $request->is_super,
        ]);

        return response()->noContent();
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return AdminResource::make($admin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $password = $admin->password;
        if ($request->has('password')) {
            $password = bcrypt($request->password);
        }

        $admin->update([
            'name' => $request->name,
            'password' => $password,
            'is_super' => $request->is_super,
        ]);

        return AdminResource::make($admin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return response()->noContent();
    }
}
