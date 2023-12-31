<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('screens/create-employee');
    }

    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->employee_name = $request->name;
        $employee->save();

        return redirect()->to(route('index'));
    }
    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function getEmployees(Request $request)
    {
      
        if (isset($request->searchTerm) && !empty($request->searchTerm) && !ctype_space($request->searchTerm)) {
            $employees = Employee::where('employee_name', 'LIKE', '%' . $request->searchTerm . '%')->get();
        } else {
            $employees = Employee::all();
        }

        $response = [];

        foreach ($employees as $employee) {
            $response[] = array("id" => $employee->employee_id, "text" => $employee->employee_name);
        }

        return response()->json($response);
    }
}