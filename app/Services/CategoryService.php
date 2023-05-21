<?php
    
    namespace App\Services;
    
    use Illuminate\Database\Eloquent\Model;
    use App\Models\Category;
    
    class CategoryService implements IResourceService
    {
        public function store($data)
        {
            $category = new Category();
            $category->name = $data['name'];
            $category->save();
            
            return $category;
        }
        
        public function update($data, Model $resource)
        {
            $resource->name = $data['name'];
            $resource->save();
            
            return $resource;
        }
    
        public function delete( Model $resource ) {
            $resource->problems()->sync([]);
            $resource->delete();
        }
    }
