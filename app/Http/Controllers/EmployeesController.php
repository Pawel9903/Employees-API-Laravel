<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * @return Employee[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * @param Employee $employee
     * @return Employee
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json($employee,201);
    }

    /**
     * @param Request $request
     * @param Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        return response()->json($employee,200);
    }


    /**
     * @param Employee $employee
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Employee $employee)
    {
        $employee->delete();

        return response()->json(null, 204);
    }
}
