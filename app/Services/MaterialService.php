<?php
    
    namespace App\Services;
    
    use App\Models\Material;
    use Illuminate\Database\Eloquent\Model;

    class MaterialService implements IResourceService
    {
    
        public function store( $data ) {
            $material = new Material();
            $material->name = $data["name"];
            $material->price = $data["price"];
    
            $material->save();
            
            return $material;
        }
    
        public function update( $data, Model $resource ) {
            $resource->name = $data["name"];
            $resource->price = $data["price"];
            $resource->save();
            
            return $resource;
        }
    
        public function delete( Model $resource ) {
            $resource->delete();
        }
    }