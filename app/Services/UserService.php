<?php
    
    namespace App\Services;
    
    use App\Models\Employee;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Hash;

    class UserService implements IResourceService
    {
    
        public function store( $data, $addEmployee = false ) {
            $user = new User();
    
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->password = Hash::make( $data["password"] );
            $user->type = $data["type"];
            
            $user->save();
            
            if ($addEmployee && $data["type"] == "employee") {
                $employee = new Employee();
                $employee->user_id = $user->id;
                $employee->save();
            }
            return $user;
        }
    
        public function update( $data, Model $resource ) {
            $resource->name = $data["name"];
            $resource->email = $data["email"];
            if (isset($data["password"]) && $data["password"] != "") {
                $resource->password = Hash::make( $data["password"] );
            }
            $resource->type = $data["type"];
    
            $resource->save();
            return $resource;
        }
    }