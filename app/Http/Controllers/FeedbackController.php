<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Problem;
use App\Services\FeedbackService;

class FeedbackController extends Controller
{
    public function __construct(
        public FeedbackService $service
    ) {}
    public function index()
    {
        $this->authorize("show feedback");
    
        $feedbacks = Feedback::all();
        return view('feedbacks.index',compact('feedbacks'));
    }

    public function create()
    {
        $this->authorize("add feedback");
        
        $problems = Problem::all();
        
        // @TODO: Add Inputs

        return view('feedbacks.create',compact('problems'));
    }

    public function store(StoreFeedbackRequest $request)
    {
        $this->service->store($request->all());

        return redirect()->route('feedback.index')->withStatus(__("titles.feedback_added"));
    }

    public function show(Feedback $feedback)
    {
        //
    }

    public function edit(Feedback $feedback)
    {
        $this->authorize("edit feedback");
    
        // @TODO: Implement Edit Feedback
    }

    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        try {
            $this->service->update($request->all(), $feedback);
        } catch (\Exception $e) {
        
        }
    
    }

    public function destroy(Feedback $feedback)
    {
        $this->authorize("delete feedback");
    
        // @TODO: Implement Delete Feedback
    }
}
