<?php

namespace App\Http\Controllers;

use App\Models\Logout;
use App\Http\Requests\StoreLogoutRequest;
use App\Http\Requests\UpdateLogoutRequest;

class LogoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logout.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLogoutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Logout $logout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logout $logout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogoutRequest $request, Logout $logout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logout $logout)
    {
        //
    }
}
