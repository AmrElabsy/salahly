<?php
    
    namespace App\Services;
    
    use App\Models\Employee;
    use Illuminate\Database\Eloquent\Model;

    class EmployeeService implements IResourceService
    {
    
        public function store( $data ) {
            $employee = new Employee();
            $employee->name = $data["name"];
            $employee->save();
            
            $employee->branches()->sync($data["branches"]);
            
            return $employee;
        }
    
        public function update( $data, Model $resource ) {
            $resource->name = $data["name"];
            $resource->branches()->sync($data["branches"]);
    
            $resource->save();
        }
    }