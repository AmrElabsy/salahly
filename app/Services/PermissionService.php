<?php
    
    namespace App\Services;
    
    use Illuminate\Database\Eloquent\Model;
    use Spatie\Permission\Models\Permission;

    class PermissionService implements IResourceService
    {
        public function store( $data ) {
            foreach ($data["names"] as $name) {
                if (str_word_count($name) == 1) {
                    $permissions = [
                        "add " . $name,
                        "edit " . $name,
                        "delete " . $name,
                        "show " . $name
                    ];
            
                    foreach ($permissions as $n) {
                        $permission = new Permission();
                        $permission->name = $n;
                        $permission->guard_name  = "web";
                        $permission->save();
                    }
                } else {
                    $permission = new Permission();
                    $permission->name = $name;
                    $permission->guard_name  = "web";
                    $permission->save();
                }
            }
            $permission = new Permission();
            $permission->name = $data["name"];
            $permission->guard_name = "web";
            $permission->save();
    
    
            return $permission;
        }
    
        public function update( $data, Model $resource ) {
            $resource->name = $data["name"];
            $resource->save();
            
            return $resource;
        }
    
        public function delete( Model $resource ) {
            $resource->delete();
        }
    }