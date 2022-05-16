<?php

namespace App\Http\Controllers\API\v1\hr;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployee;
use App\Models\Company;
use App\Models\CompanyEmployee;
use App\Models\CompanyEmployeeLeave;
use App\Models\CompanyEmployeeSalary;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function allEmployees()
    {
//         $authUser = \Auth::guard('employee')->user();
        $data = CompanyEmployee::with(['dept', 'position', 'company', 'companyEmployeeData'])->orderBy("created_at",'desc')->where('company_id', '=', 5)->get();

        return response([
            'data' => $data,
//            'testing' => $authUser
        ], Response::HTTP_OK);
    }

    public function singleEmployee($id)
    {

        $data = CompanyEmployee::with(['dept', 'companyEmployeeSalary', 'companyEmployeeLeaves', 'position', 'companyEmployeeData'])->where('company_id', '=', 5)->where('id', '=', $id)->get();

        return response([
            'data' => $data
        ], Response::HTTP_OK);
    }

    public function createEmployee(CreateEmployee $request)
    {
        $request->validated();

        $employee = CompanyEmployee::create([
            'email' => $request['email'],
            'password' => $request['password'],
            'employeeNumber' => Str::random(10),
            'company_id' => 5,
            'position_id' => $request['position_id'],
            'dept_id' => $request['dept_id'],

        ])->companyEmployeeData()->create([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName']
        ]);

        CompanyEmployeeSalary::create([
            'company_employee_id' => $employee->id,
            'salary' => $request['salary'],
        ]);

        return response([
            'data' => $employee,
            'message' => 'Employee Created Successfully'
        ], Response::HTTP_OK);

    }

    public function toggleEmployeeStatus($id)
    {

        $employee = CompanyEmployee::find($id);

        $status = $employee->status;

        if ($status === 1) {
            $oppositeStatus = 0;
            $message = 'Deactivated';
        } else {
            $oppositeStatus = 1;
            $message = 'Activated';

        }

        $employee->update([
            'status' => $oppositeStatus,
        ]);

        return response([
            'data' => $employee,
            'message' => $message
        ], Response::HTTP_OK);
    }

    public function employeeCount(){

        $companyLeave = CompanyEmployee::where("company_id",5)->count();

        return response([
            'data' => $companyLeave,
        ], Response::HTTP_OK);

    }

    public function recentLeaves(){

//        TODO MAKE ACCURATE
        $companyLeave = CompanyEmployeeLeave::with('companyEmployee','leave')->inRandomOrder()->get()->take(3);

        return response([
            'data' => $companyLeave,
        ], Response::HTTP_OK);

    }

    public function deleteEmployee($id)
    {

        $employee = CompanyEmployee::find($id);

        $employee->delete();

        return response([
            'data' => $employee,
            'message' => "Employee Deleted Successfully"
        ], Response::HTTP_OK);
    }
}
