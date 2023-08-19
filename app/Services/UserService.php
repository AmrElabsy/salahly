<?php

    namespace App\Services;

    use App\Models\User;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Hash;
    use Spatie\Permission\Models\Role;

    class UserService implements IResourceService
    {

        public function store( $data, $addEmployee = false ) {
            $user = new User();

            $user->name = $data["name"];
            $user->email = $data["email"];
			$user->password = Hash::make( $data["password"] );
			$user->salary = $data["salary"] ?? null;
			$user->percentage = $data["percentage"] ?? null;
            $user->target = $data["target"] ?? null;
            $user->arrival_time = $data["arrival_time"] ?? null;


            $user->save();
            if (isset($data["roles"])) {
                $roles = Role::whereIn('name', $data["roles"])->get();
                $user->syncRoles($roles);
            }

            $user->branches()->sync($data["branches"] ?? null);

            return $user;
        }

        public function update( $data, Model $resource ) {
            $resource->name = $data["name"];
            $resource->email = $data["email"];
            if (isset($data["password"]) && $data["password"] != "") {
                $resource->password = Hash::make( $data["password"] );
            }
			$resource->salary = $data["salary"] ?? null;
			$resource->percentage = $data["percentage"] ?? null;
            $resource->target = $data["target"] ?? null;
            $resource->arrival_time = $data["arrival_time"] ?? null;

            $resource->save();

            if (isset($data["roles"])) {
                $roles = Role::whereIn('name', $data["roles"])->get();
                $resource->syncRoles($roles);
            }

            $resource->branches()->sync($data["branches"] ?? null);

            return $resource;
        }

        public function delete( Model $resource ) {
            // TODO: Implement delete() method.
        }
    }
