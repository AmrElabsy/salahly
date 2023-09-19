<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Device;
use App\Models\Feedback;
use App\Models\Material;
use App\Models\Problem;
use App\Http\Requests\StoreProblemRequest;
use App\Http\Requests\UpdateProblemRequest;
use App\Models\Status;
use App\Models\User;
use App\Services\ProblemService;

class ProblemController extends Controller
{
	public function __construct( public ProblemService $service ) {}

	public function index()
	{
		$this->authorize("show problem");

		$problems = $this->filter();
		$statuses = Status::all();
		$branches = $this->getBranches();
		$employees = User::role("employee")->get();
		$customers = Customer::all();

		return view("problems.index", compact("problems", "statuses", "branches", "employees", "customers"));
	}

	public function create()
	{
		$this->authorize("add problem");

		$devices = Device::all();
		$statuses = Status::all();
		$customers = Customer::all();
		$branches = $this->getBranches();
		$materials = Material::all();
		$categories = Category::all();
		$employees = User::role("employee")->get();
        $feedbacks = Feedback::all();

		return view("problems.create", compact("devices", "statuses", "customers", "branches", "materials", "employees", "categories","feedbacks"));
	}

	public function store( StoreProblemRequest $request )
	{
		$this->service->store($request->all());
		return redirect()->route("problem.index")->withStatus(__("titles.problem_added"));
	}

	public function show( Problem $problem )
	{
		return view('problems.show', compact('problem'));
	}

	public function edit( Problem $problem )
	{
		$this->authorize("edit problem");

		$devices = Device::all();
		$statuses = Status::all();
		$branches = $this->getBranches();
		$materials = Material::all();
		$employees = User::role("employee")->get();

		return view("problems.edit", compact("problem", "devices", "statuses", "branches", "materials", "employees"));
	}

	public function update( UpdateProblemRequest $request, Problem $problem )
	{
		$this->service->update($request->all(), $problem);
		return redirect()->route("problem.index")->withStatus(__("titles.problem_updated"));
	}

	public function destroy( Problem $problem )
	{
		$this->authorize("delete problem");

		$problem->delete();
		return redirect()->route("problem.index")->withStatus(__("titles.problem_deleted"));
	}

    public function feedback(Problem $problem) {
        $problems = Problem::all();
        return view('feedbacks.create', ['p' => $problem, 'problems' => $problems]);
    }

	private function filter()
	{
		$problems = Problem::query();
		$branch = request("branch");
		$status = request("status");
		$employee = request("employee");
		$customer = request("customer");

		if ( $branch ) {
			$problems = $problems->where("branch_id", $branch);
		}

		if ( $status ) {
			$problems = $problems->where("status_id", $status);
		}

		if ( $employee ) {
			$problems = $problems->where("user_id", $employee);
		}

		if ( $customer ) {
			$devices = Device::where("customer_id", $customer)->get();
			$ids = [];
			foreach ( $devices as $device ) {
				$ids[] = $device->id;
			}
			$problems = $problems->whereIn("device_id", $ids);
		}

		if ( auth()->user()->hasRole("Employee") && !auth()->user()->hasRole("Admin") ) {
			$branches = auth()->user()->branches()->pluck('branches.id')->toArray();
			$problems = $problems->whereIn("branch_id", $branches);

			$problems = $problems->whereNot("status_id", Status::DONE);
		}
		return $problems->get();
	}

	private function getBranches()
	{
		if ( $this->employeeNotAdmin() ) {
			$branches = auth()->user()->branches()->pluck('branches.id')->toArray();
			$branches = Branch::whereIn("id", $branches)->get();
		} else {
			$branches = Branch::all();
		}

		return $branches;
	}
}
