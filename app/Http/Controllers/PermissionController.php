<?php
    
    namespace App\Http\Controllers;
    
    use App\Services\PermissionService;
    use Spatie\Permission\Models\Permission;
    use App\Http\Requests\StorePermissionRequest;
    use App\Http\Requests\UpdatePermissionRequest;
    
    class PermissionController extends Controller
    {
        public function __construct(
            public PermissionService $service
        )
        {}
        
        public function index()
        {
            $this->authorize("show permission");
    
            $permissions = Permission::all();
            
            return view('permissions.index', compact('permissions'));
        }
        
        public function create()
        {
            $this->authorize("add permission");
    
            return view('permissions.create');
        }
        
        public function store(StorePermissionRequest $request)
        {
            try {
                $this->service->store($request->all());
                return redirect()->route('permission.index')->with('success', 'Permission created successfully.');
            } catch (\Throwable $e) {
                return redirect()->back();
            }
        }
        
        public function edit(Permission $permission)
        {
            $this->authorize("edit permission");
    
            return view('permissions.edit', compact('permission'));
        }
        
        public function update(UpdatePermissionRequest $request, Permission $permission)
        {
            try {
                $this->service->update($request->all(), $permission);
                return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
            } catch (\Throwable $exception) {
                return redirect()->back();
            }
        }
        
        public function destroy(Permission $permission)
        {
            $this->authorize("delete permission");
    
            try {
                $this->service->delete($permission);
                return redirect()->route('permission.index')->with('success', 'Permission deleted successfully.');
            } catch (\Throwable $exception) {
                return redirect()->back();
            }
        }
    }