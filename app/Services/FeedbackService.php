<?php

    namespace App\Services;

    use App\Models\Feedback;
    use Illuminate\Database\Eloquent\Model;

    class FeedbackService implements IResourceService
    {

        public function store( $data ) {
            $feedback = new Feedback();
            $feedback->content = $data['content'];
            $feedback->problem_id = $data['problem'];
            $feedback->known_from = $data["known_from"] ?? "";
            $feedback->where_from = $data["where_from"] ?? "";
            $feedback->save();
            return $feedback;
        }

        public function update( $data, Model $resource ) {
            // TODO: Implement update() method.
            $resource->content = $data['content'];
            $resource->problem_id = $data['problem'];
            $resource->known_from = $data['known_from'];
            $resource->where_from = $data['where_from'];
            $resource->save();
            return $resource;
        }

        public function delete( Model $resource ) {
            // TODO: Implement delete() method.
            $resource->delete();
        }
    }
