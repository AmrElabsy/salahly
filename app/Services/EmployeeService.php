<?php
    
    namespace App\Services;
    
    use App\Models\Employee;
    use Illuminate\Database\Eloquent\Model;

    class EmployeeService implements IResourceService
    {
    
        public function store( $data ) {
            $employee = new Employee();
            $data["type"] = "employee";
            $userService = new UserService();
            $user = $userService->store($data);
            $employee->user_id = $user->id;
            $employee->save();
            
            $employee->branches()->sync($data["branches"] ?? null);
            
            return $employee;
        }
    
        public function update( $data, Model $resource ) {
            $resource->user->name = $data["name"];
            $resource->branches()->sync($data["branches"] ?? null);
    
            $resource->save();
        }
    }