<?php

namespace App\Http\Controllers\API\v1\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaveRequest;
use App\Models\CompanyEmployee;
use App\Models\CompanyEmployeeLeave;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{

    public function leaveRequest(LeaveRequest $request){

        $validated = $request->validated();

        $leave = CompanyEmployeeLeave::create([
            'company_employee_id' => $validated['employeeID'],
            'leave_id' => $validated['leaveID'],
            'startDate' => $validated['startDate'],
            'endDate' => $validated['endDate']
        ]);


        return response([
            'data' => $leave,
            'message' => 'Leave Requested'
        ],Response::HTTP_OK);
    }
        public function companyTeamMember(){

        $data = CompanyEmployee::with(['companyEmployeeData','position','dept'])->where('company_id',5)->get();

        return response([
            'data' => $data,
        ],Response::HTTP_OK);
    }

}
