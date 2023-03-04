<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(
        public UserService $service
    ) {}
    
    public function index()
    {
        $users = User::all();
        return view("users.index", compact("users"));
    }
    
    public function create()
    {
        return view("users.create");
    }
    
    public function store(StoreUserRequest $request)
    {
        $this->service->store($request->all(), true);
        
        return redirect()->route("user.index")->withStatus(__("titles.user_added"));
    }
    
    public function show(User $user)
    {
        //
    }
    
    public function edit(User $user)
    {
        return view("users.edit", compact("user"));
    }
    
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->service->update($request->all(), $user);
    
        return redirect()->route("user.index")->withStatus(__("titles.user_updated"));
    
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("user.index")->withStatus(__("titles.user_deleted"));
    }
    
}
