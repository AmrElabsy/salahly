<?php
    
    namespace App\Http\Controllers;
    
    use App\Services\RoleService;
    use Spatie\Permission\Models\Role;
    use App\Http\Requests\StoreRoleRequest;
    use App\Http\Requests\UpdateRoleRequest;
    
    class RoleController extends Controller
    {
        public function __construct(
            public RoleService $service
        )
        {}
        
        public function index()
        {
            $roles = Role::all();
            
            return view('roles.index', compact('roles'));
        }
        
        public function create()
        {
            return view('roles.create');
        }
        
        public function store(StoreRoleRequest $request)
        {
            try {
                $this->service->store($request->validated());
            } catch (\Throwable $e) {
            
            }
            return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        }
        
        public function edit(Role $role)
        {
            return view('roles.edit', compact('role'));
        }
        
        public function update(UpdateRoleRequest $request, Role $role)
        {
            try {
                $this->service->update($request->validated(), $role);
            } catch (\Throwable $exception) {
            
            }
            return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
        }
        
        public function destroy(Role $role)
        {
            try {
                $this->service->delete($role);
            } catch (\Throwable $exception) {
            
            }
            return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
        }
    }
