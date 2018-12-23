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
        $employees =  Employee::all();
        return response()->json($employees,201);
    }

    /**
     * @param Employee $employee
     * @return Employee
     */
    public function show(Employee $employee, $id)
    {
        $employee = Employee::find($id);
        return response()->json($employee,201);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $employee = new Employee($request->all());
        $employee->save();
        return response()->json($employee,201);
    }

    /**
     * @param Request $request
     * @param Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {

        $employee = Employee::find($request->id);

        $employee->update($request->all());

        return response()->json(['status'=>1,'message'=>'Udało się zaktualizować dane pracownika '.$employee->getFullName()]);
    }


    /**
     * @param Employee $employee
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Request $request, $id)
    {


        $employee = Employee::find($id);
        $employee->delete();

        return response()->json(null, 204);
    }
}
