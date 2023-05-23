<?php
    
    namespace App\Services;
    
    use App\Models\Feedback;
    use Illuminate\Database\Eloquent\Model;

    class FeedbackService implements IResourceService
    {
    
        public function store( $data ) {
            $feedback = new Feedback;
            $feedback->content = $data['content'];
            $feedback->is_available = $data['is_available'];
            $feedback->problem_id = $data['problem'];
            $feedback->save();
        }
    
        public function update( $data, Model $resource ) {
            // TODO: Implement update() method.
        }
    
        public function delete( Model $resource ) {
            // TODO: Implement delete() method.
        }
    }