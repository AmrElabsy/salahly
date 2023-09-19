<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use DateTime;
use DateInterval;
use DatePeriod;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, HasRoles;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = ['name',
		'email',
		'password',
		"type"];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = ['password',
		'remember_token',];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = ['email_verified_at' => 'datetime',];

	public function branches()
	{
		return $this->belongsToMany(Branch::class)->withTimestamps()->withPivot("deleted_at");
	}

	public function attendances(): HasMany
	{
		return $this->hasMany(Attendance::class);
	}

	public function problems()
	{
		return $this->hasMany(Problem::class);
	}

	public function attended( $day )
	{
		return $this->attendances()->whereDate('created_at', $day)->where("type", 0)->exists();
	}

	public function minutesLate( $day )
	{
		if ( !$this->attended($day) ) {
			return 0;
		}

		$attendance = $this->attendances()->whereDate('created_at', $day)->where("type", 0)->first();
		$timeAttended = $attendance->created_at;

        $timeStart = Carbon::parse($this->arrival_time);
		if ( $timeAttended > $timeStart ) {
			return $timeStart->diffInMinutes($timeAttended);
		} else {
			return 0;
		}
	}

	public function isAbsent( $day )
	{
		if ( $this->isHoliday($day) ) {
			return false;
		}
		return !$this->attended($day);
	}

	public function absentDays( $month )
	{
		$year = Carbon::now()->year;

		$date = new Carbon($year . "-" . $month);

		$start = new DateTime($date->startOfMonth());
		$interval = new DateInterval('P1D');
		$end = $date->endOfMonth() < now() ? new DateTime($date->endOfMonth()) : Carbon::now();
		$days = new DatePeriod($start, $interval, $end);

		$count = 0;
		foreach ( $days as $day ) {
			if ( $this->isAbsent($day) ) {
				$count++;
			}
		}

		return $count;
	}

	public function minutesLateByMonth( $month )
	{
		$year = Carbon::now()->year;

		$date = new Carbon($year . "-" . $month);

		$start = new DateTime($date->startOfMonth());
		$interval = new DateInterval('P1D');
		$end = $date->endOfMonth() < now() ? new DateTime($date->endOfMonth()) : Carbon::now();
		$days = new DatePeriod($start, $interval, $end);

		$count = 0;
		foreach ( $days as $day ) {
			$count += $this->minutesLate($day);
		}

		return $count;
	}

	public function attendanceTime( $day )
	{
		return $this->attendances()->whereDate('created_at', $day)->where("type", 0)->first()->created_at->format("h:i:s A");
	}

    public function netSalary( $month ) {
        $salary = Salary::whereMonth('month', $month)->where('user_id', $this->id)->first();
        if ($salary) {
            return $salary->salary;
        }

        $salary = $this->salary;
        $target = $this->target ?? 0;
        $percentage = $this->percentage ?? 0;

        $problems = $this->problems()->whereMonth('delivered_at', $month)->get();

        $salary += $target * count($problems);
        $salary += $problems->sum("price") * $percentage / 100;

        if($this->minutesLateByMonth($month) > 15 * 60) {
            $daySalary = $this->salary / 30;
            $lateHours = $this->minutesLateByMonth($month) / 60;

            $subtract = $daySalary * $lateHours / (8 * 60);

            $salary -= $subtract;
        }

        return $salary;
    }

	public function left( $day )
	{
		return $this->attendances()->whereDate('created_at', $day)->where("type", 1)->exists();
	}

	public function leavingTime( $day )
	{
		return $this->attendances()->whereDate('created_at', $day)->where("type", 1)->first()->created_at->format("h:i:s A");
	}

	public function holidays()
	{
		return $this->belongsToMany(Holiday::class);
	}

	public function isHoliday( $day )
	{
		return Weekend::where('day', $day->format('l'))->exists() || $this->holidays()->whereDate('end', '>=', $day)->whereDate('start', '<=', $day)->exists();
	}

	public static function employees()
	{
		return self::role("employee");
	}
}
