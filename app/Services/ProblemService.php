<?php
    
    namespace App\Services;
    
    use App\Models\Material;
    use App\Models\Problem;
    use Illuminate\Database\Eloquent\Model;

    class ProblemService implements IResourceService
    {
    
        public function store( $data ) {
            $problem = new Problem();
            $problem->description = $data["description"];
            $problem->price = $data["price"];
            $problem->paid = $data["paid"];
            $problem->due_time = $data["due_time"];
            $problem->status_id = $data["status"];
            $problem->branch_id = $data["branch"];
            
            if ( isset($data["is_new_device"]) && $data["is_new_device"] == "on" ) {
                $deviceService = new DeviceService();
                $device = $deviceService->store($data);
                $problem->device_id = $device->id;
            } else {
                $problem->device_id = $data["device_id"];
            }
            $problem->save();
            
            $materials = $this->getMaterialsData($data["materials"]);
            
            $problem->materials()->sync($materials);
            return $problem;
        }
    
        public function update( $data, Model $resource ) {
            $resource->description = $data["description"];
            $resource->price = $data["price"];
            $resource->paid = $data["paid"];
            $resource->due_time = $data["due_time"];
            $resource->status_id = $data["status"];
            $resource->branch_id = $data["branch"];
    
            $materials = $this->getMaterialsData($data["materials"]);
            $resource->materials()->sync($materials);
            
            $resource->save();
        }
        
        private function getMaterialsData($materials = null) {
            $result = [];
            foreach ($materials as $material) {
                $material = Material::find($material);
                $result[$material->id] = ["price" => $material->price];
            }
            
            return $result;
        }
    }