<?php
    
    namespace App\Services;
    
    use Illuminate\Database\Eloquent\Model;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    class RoleService implements IResourceService
    {
    
        public function store( $data ) {
            $role = new Role();
            $role->name = $data["name"];
            $role->guard_name = "web";
            $role->save();
            
            foreach ($data["permissions"] as $permissionId) {
                $permission = Permission::find($permissionId);
                $role->givePermissionTo($permission);
            }
            
            return $role;
        }
    
        public function update( $data, Model $resource ) {
            $resource->name = $data["name"];
            $resource->save();
    
            $permissions = Permission::whereIn('id', $data["permissions"])->get();
            $resource->syncPermissions($permissions);
            
            return $resource;
        }
    
        public function delete( Model $resource ) {
            // TODO: Implement delete() method.
        }
    }