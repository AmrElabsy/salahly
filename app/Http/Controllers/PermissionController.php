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
            $permissions = Permission::all();
            
            return view('permissions.index', compact('permissions'));
        }
        
        public function create()
        {
            return view('permissions.create');
        }
        
        public function store(StorePermissionRequest $request)
        {
            try {
                $this->service->store($request->validated());
            } catch (\Throwable $e) {
            
            }
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
        }
        
        public function edit(Permission $permission)
        {
            return view('permissions.edit', compact('permission'));
        }
        
        public function update(UpdatePermissionRequest $request, Permission $permission)
        {
            try {
                $this->service->update($request->validated(), $permission);
            } catch (\Throwable $exception) {
            
            }
            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
        }
        
        public function destroy(Permission $permission)
        {
            try {
                $this->service->delete($permission);
            } catch (\Throwable $exception) {
            
            }
            return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
        }
    }