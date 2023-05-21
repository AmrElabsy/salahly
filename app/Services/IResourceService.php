<?php
    
    namespace App\Services;

    use Illuminate\Database\Eloquent\Model;

    interface IResourceService {
        public function store($data);
        
        public function update($data, Model $resource);
        
        public function delete(Model $resource);
    }