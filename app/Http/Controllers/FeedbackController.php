<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Problem;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks=Feedback::all();
        return view('feedbacks.index',compact('feedbacks'));
    }

    public function create()
    {
        $problems = Problem::all();
        return view('feedbacks.create',compact('problems'));
    }

    public function store(StoreFeedbackRequest $request)
    {
        $feedback = new Feedback;
        $feedback->content = $request->input('content');
        $feedback->is_available = $request->input('is_available', true);
        $feedback->problem_id = $request->input('problem');
        $feedback->save();


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
        //
    }

    public function destroy(Feedback $feedback)
    {
        //
    }
}
