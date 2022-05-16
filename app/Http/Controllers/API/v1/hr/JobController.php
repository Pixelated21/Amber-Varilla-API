<?php

namespace App\Http\Controllers\API\v1\hr;

use App\Http\Controllers\Controller;
use App\Http\Requests\HRJobRequest;
use App\Models\Category;
use App\Models\CompanyEmployee;
use App\Models\Job;
use App\Models\JobDetail;
use Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class JobController extends Controller
{
    public function listedJobs()
    {
//        $authUser = Auth::user()->company_id;
//        return $authUser;
        $data = Job::with('jobDetail', 'company')->where('company_id', 5)->withCount('jobApplications')->get();

        return response([
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public function singleListedJobs($id)
    {

//        $authUser = Auth::user()->company_id;
//        return $authUser;
        $data = Job::with('jobDetail', 'company', 'jobApplications')->where('company_id', 5)->where('id', '=', $id)->get();

        return response([
            'data' => $data
        ], Response::HTTP_OK);
    }

    public function createJob(HRJobRequest $request)
    {
//        $authUser = Auth::user()->company_id;
        $validated = $request->validated();

        $job = Job::create([
            'category_id' => $validated['category_id'],
            'company_id' => 5,
            'uuid' => Str::uuid()
        ])->jobDetail()->create([
            'jobTitle' => $validated['jobTitle'],
            'jobDescription' => $validated['jobDescription'],
            'jobSalary' => $validated['jobSalary'],
            'jobModality' => $validated['jobModality'],
            'jobType' => $validated['jobType'],
            'negotiable' => $validated['negotiable']
        ]);

        return response([
            'data' => $job,
            'message' => $validated['jobTitle'].' Created Successfully'
        ], Response::HTTP_OK);
    }


    public function updateJob($id, HRJobRequest $request)
    {
//        $authUser = Auth::user()->company_id;
        $validated = $request->validated();


        $job = Job::find($id);
        $jobDetail = JobDetail::where('job_id', $job->id);

        $job->update([
            'category_id' => $validated['category_id'],
            'company_id' => 5,
        ]);

        $jobDetail->update([
            'jobTitle' => $validated['jobTitle'],
            'jobDescription' => $validated['jobDescription'],
            'jobSalary' => $validated['jobSalary'],
            'jobModality' => $validated['jobModality'],
            'jobType' => $validated['jobType'],
            'negotiable' => $validated['negotiable']
        ]);

        return response([
            'data' => $jobDetail,
            'message' => 'Job Created Successfully'
        ], Response::HTTP_OK);
    }

    public function deleteJob($id)
    {
//        $authUser = Auth::guard('employee')->user();

        $data = Job::findOrFail($id);

        $data->delete();

        return response([
            'data' => $data->id
        ], Response::HTTP_OK);
    }

    public function toggleJobStatus($id){

        $job = Job::find($id);

        $status = $job->isActive;

        if ($status === true){
            $oppositeStatus = false;
            $message = 'Deactivated';
        }
        else{
            $oppositeStatus = true;
            $message = 'Activated';

        }

        $job->update([
            'isActive' => $oppositeStatus,
        ]);

        return response([
            'data' => $job,
            'message' => $message
        ], Response::HTTP_OK);
    }

}



