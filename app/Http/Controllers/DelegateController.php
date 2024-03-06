<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDelegateRequest;
use App\Http\Requests\UpdateDelegateRequest;
use App\Http\Resources\DelegateResource;
use App\Models\Delegate;

class DelegateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DelegateResource::collection(Delegate::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDelegateRequest $request)
    {
        $delegate = Delegate::create($request->validated());

        return response()->noContent();
    }

    /**
     * Display the specified resource.
     */
    public function show(Delegate $delegate)
    {
        return DelegateResource::make($delegate);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDelegateRequest $request, Delegate $delegate)
    {
        $delegate->update($request->validated());

        return DelegateResource::make($delegate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delegate $delegate)
    {
        $delegate->delete();

        return response()->noContent();
    }
}
