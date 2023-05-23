<?php
    
    namespace App\Services;
    
    use App\Models\Branch;
    use Illuminate\Database\Eloquent\Model;

    class BranchService implements IResourceService
    {
    
        public function store( $data ) {
            $branch = new Branch();
            $branch->name = $data["name"];
            $branch->save();
            
            return $branch;
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