<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['users'] = User::select('id', 'name', 'email', 'role')->orderByDesc('id')->paginate(10);
        // $this->data['users']=User::paginate(10);
        return view('dashboard.user.index', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $userData= $request->only(['name','email','password']);

        $response = User::create($userData);

        if($response->id){
            return redirect()->route('admin.user.index');
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
       return view('dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($user->update($request->only(['name','email'])))
        {
        return redirect()->to(route('admin.user.index'));
        } else {
            return redirect()->back();
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->delete()) {
            return redirect()->to(route('admin.user.index'));
        } else {
            return redirect()->back();
        }
    }
}
