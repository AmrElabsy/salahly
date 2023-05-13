<?php
    
    namespace App\Http\Controllers;
    
    use App\Services\RoleService;
    use Spatie\Permission\Models\Permission;
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
            $permissions = Permission::all();
            return view('roles.create', compact("permissions"));
        }
        
        public function store(StoreRoleRequest $request)
        {
            try {
                $this->service->store($request->all());
            } catch (\Throwable $e) {
            
            }
            return redirect()->route('role.index')->withStatus(__("role_added"));
        }
        
        public function edit(Role $role)
        {
            return view('roles.edit', compact('role'));
        }
        
        public function update(UpdateRoleRequest $request, Role $role)
        {
            try {
                $this->service->update($request->all(), $role);
            } catch (\Throwable $exception) {
            
            }
            return redirect()->route('roles.index')->withStatus(__( 'role_updated'));
        }
        
        public function destroy(Role $role)
        {
            $role->delete();
            return redirect()->route('roles.index')->withStatus(__('role_deleted'));
        }
    }
