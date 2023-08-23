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
        $problems = Problem::all();
        return view('feedbacks.edit',compact('problems','feedback'));
    }
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        try {
            $this->service->update($request->all(), $feedback);
            return redirect()->route('feedback.index')->withStatus(__("titles.feedback_updated"));

        } catch (\Exception $e) {
            return redirect()->back();

        }

    }

    public function destroy(Feedback $feedback)
    {
        $this->authorize("delete feedback");
        $this->service->delete($feedback);
        return redirect()->route("feedback.index")->withStatus(__("titles.feedback_deleted"));

    }
}
