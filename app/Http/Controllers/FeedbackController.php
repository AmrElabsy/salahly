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
        $feedbacks = Feedback::all();
        return view('feedbacks.index',compact('feedbacks'));
    }

    public function create()
    {
        $problems = Problem::all();

        return view('feedbacks.create',compact('problems'));
    }

    public function store(StoreFeedbackRequest $request)
    {
        try {
            $this->service->store($request->all());
        } catch (\Exception $e) {
        
        }
        return redirect()->route('feedback.index')->withStatus(__("titles.feedback_added"));
    }

    public function show(Feedback $feedback)
    {
        //
    }

    public function edit(Feedback $feedback)
    {
        //
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
        //
    }
}
