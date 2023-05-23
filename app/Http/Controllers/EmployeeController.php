<?php

namespace App\Http\Controllers;

use App\Models\User;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::role("employee")->get();
        return view("employees.index", compact("employees"));
    }
}
