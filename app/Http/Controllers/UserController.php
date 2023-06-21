<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
    use App\Models\Branch;
    use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
    use Spatie\Permission\Models\Role;
    
    class UserController extends Controller
{
    public function __construct(
        public UserService $service
    ) {}

    public function index()
    {
        $this->authorize("show user");
    
        $users = User::all();
        return view("users.index", compact("users"));
    }

    public function create()
    {
        $this->authorize("add user");
    
        $roles = Role::all();
        $branches = Branch::all();
    
        return view("users.create", compact("roles", "branches"));
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
        $this->authorize("edit user");
    
        $roles = Role::all();
        $branches = Branch::all();
    
        return view("users.edit", compact("user", "roles", "branches"));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->service->update($request->all(), $user);

        return redirect()->route("user.index")->withStatus(__("titles.user_updated"));
    }

    public function destroy(User $user)
    {
        $this->authorize("delete user");
    
        $user->delete();
        return redirect()->route("user.index")->withStatus(__("titles.user_deleted"));
    }
    public function deleted() {
        $users = User::onlyTrashed()->get();
        return view("users.deleted", compact("users"));
    }

    public function restore($user) {
        User::withTrashed()->find($user)->restore();
        return redirect()->back()->withStatus(__("titles.user_restored"));
    }

    public function forceDelete($user) {
        User::withTrashed()->find($user)->forceDelete();
        return redirect()->back()->withStatus(__("titles.user_deleted"));
    }
}
