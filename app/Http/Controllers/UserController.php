<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Branch;
use App\Models\Salary;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DateInterval;
use DatePeriod;
use DateTime;

class UserController extends Controller
{
	public function __construct( public UserService $service ) {}

	public function index()
	{
		$this->authorize("show user");

		$users = User::all();
		return view("users.index", compact("users"));
	}

	public function create()
	{
		$this->authorize("add user");

		$roles = Role::all();
		$branches = Branch::all();

		return view("users.create", compact("roles", "branches"));
	}

	public function store( StoreUserRequest $request )
	{
		$this->service->store($request->all(), true);

		return redirect()->route("user.index")->withStatus(__("titles.user_added"));
	}

	public function show( User $user, int $year = null, int $month = null )
	{
		$this->authorize("show user");

		if ( $user->hasRole("Employee") ) {
			$year = $year ?? Carbon::now()->year;
			$month = $month ?? Carbon::now()->month;

			$problems = $user->problems()->whereMonth("created_at", $month)->get();

			$date = new Carbon($year . "-" . $month );

			$start = new DateTime($date->startOfMonth());
			$interval = new DateInterval('P1D');
			$end = $date->endOfMonth() < now() ? new DateTime($date->endOfMonth()) : Carbon::now();
			$days = new DatePeriod($start, $interval, $end);

			$jan = new DateTime(Carbon::now()->firstOfYear());
			$interval = new DateInterval("P1M");
			$currentMonth = Carbon::now()->lastOfMonth();

			$months = new DatePeriod($jan, $interval, $currentMonth);
			$_month = $month;

			return view("users.show", compact('user', "problems", "days", "months", "_month"));
		}
    }

	public function edit( User $user )
	{
		$this->authorize("edit user");

		$roles = Role::all();
		$branches = Branch::all();

		return view("users.edit", compact("user", "roles", "branches"));
	}

	public function update( UpdateUserRequest $request, User $user )
	{
		$this->service->update($request->all(), $user);

		return redirect()->route("user.index")->withStatus(__("titles.user_updated"));
	}

	public function destroy( User $user )
	{
		$this->authorize("delete user");

		$user->delete();
		return redirect()->route("user.index")->withStatus(__("titles.user_deleted"));
	}

	public function deleted()
	{
		$users = User::onlyTrashed()->get();
		return view("users.deleted", compact("users"));
	}

	public function restore( $user )
	{
		User::withTrashed()->find($user)->restore();
		return redirect()->back()->withStatus(__("titles.user_restored"));
	}

	public function forceDelete( $user )
	{
		User::withTrashed()->find($user)->forceDelete();
		return redirect()->back()->withStatus(__("titles.user_deleted"));
	}
    
    public function salary(Request $request) {
        $year = $request->year;
        $month = $request->month;
        $date = new Carbon($year . "-" . $month);
        
        $salary = Salary::whereMonth('month',$date)->where('user_id', $request->id)->first();
        if ($salary) {
            $salary->salary = $request->value;
        } else {
            $salary = new Salary();
    
            $salary->user_id = $request->id;
            $salary->salary = $request->value;
            $salary->month = $date;
        }
        
        $salary->save();
        
        return $salary->salary;
    }
}
