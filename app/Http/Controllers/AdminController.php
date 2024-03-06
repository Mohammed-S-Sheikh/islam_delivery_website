<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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
        $request->merge([
            'password' => Hash::make($request->password),
        ]);

        Admin::create($request->validated());

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
        if ($request->has('password')) {
            $request->merge([
                'password' => Hash::make($request->password),
            ]);
        }

        $admin->update($request->validated());

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
