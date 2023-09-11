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
            $problem->comment = $data["comment"];

            $problem->price = $data["price"];
            $problem->paid = $data["paid"];
            $problem->due_time = $data["due_time"];
            $problem->status_id = $data["status"];
            $problem->branch_id = $data["branch"];
            $problem->user_id = $data["user"] ?? null;

            if ( isset($data["is_new_device"]) && $data["is_new_device"] == "on" ) {
                $deviceService = new DeviceService();
                $device = $deviceService->store($data);
                $problem->device_id = $device->id;
            } else {
                $problem->device_id = $data["device_id"];
            }
            $problem->save();

            $materials = $this->getMaterialsData($data["materials"] ?? []);

            $problem->materials()->sync($materials ?? []);
            $problem->categories()->sync($data["categories"] ?? []);
            return $problem;
        }


        public function update( $data, Model $resource ) {
            $resource->description = $data["description"];
            $resource->comment = $data["comment"];
            $resource->price = $data["price"];
            $resource->paid = $data["paid"];
            $resource->due_time = $data["due_time"];
            $resource->status_id = $data["status"];
            $resource->branch_id = $data["branch"];
            $resource->user_id = $data["user"] ?? null;

            $materials = $this->getMaterialsData($data["materials"] ?? []);
            $resource->materials()->sync($materials);

            if ($resource->isDirty(['status_id']) && $resource->status_id == 5) {
                $resource->delivered_at = now();
            }

            $resource->save();
        }

        private function getMaterialsData($materials = []) {
            $result = [];
            foreach ($materials as $material) {
                $material = Material::find($material);
                $result[$material->id] = ["price" => $material->price?->price ?? 0];
            }

            return $result;
        }

        public function delete( Model $resource ) {
            // TODO: Implement delete() method.
        }
    }
