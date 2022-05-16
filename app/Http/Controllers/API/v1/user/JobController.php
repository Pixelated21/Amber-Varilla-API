<?php

namespace App\Http\Controllers\API\v1\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    public function availableJobs(): \Illuminate\Http\Response|Application|ResponseFactory
    {
        $data = Job::with('jobDetail', 'company')->inRandomOrder()->get();

        return response([
            'data' => $data
        ], Response::HTTP_OK);
    }

    public function recentJobs(): \Illuminate\Http\Response|Application|ResponseFactory
    {
        $data = Job::orderBy('created_at', 'desc')->with('jobDetail', 'company')->where('isActive', 1)->get()->take(5);

        return response([
            'data' => $data
        ], Response::HTTP_OK);
    }

    public function singleJob($id): \Illuminate\Http\Response|Application|ResponseFactory
    {
        $data = Job::with('jobDetail', 'company')->find($id);

        return response([
            'data' => $data
        ], Response::HTTP_OK);
    }

    public function jobsAppliedFor(Request $request)
    {
        $user = $request->user();

        $data = User::with(['jobApplications'])->where('id',$user->id)->first();

        return response([
            'data' => $data->jobApplications,
            'user' => $user
        ], Response::HTTP_OK);
    }

    public function jobApplication(JobApplicationRequest $request): \Illuminate\Http\Response|Application|ResponseFactory
    {
        $validated = $request->validated();

        $exist = JobApplication::where('job_id', $validated['jobID'])->where('applicant_id', $validated['userID'])->first();

        if (!$exist) {

            JobApplication::create([
                'job_id' => $validated['jobID'],
                'applicant_id' => $validated['userID'],
            ]);

            $message = 'Application Sent';
        } else if ($exist->status === 3) {
            $message = 'Application Pending Review!';
            $status = 3;
        } elseif ($exist->status === 2) {
            $message = 'Application Declined!';
            $status = 2;
        } elseif ($exist->status === 1) {
            $message = 'Application Already Approved!';
        }

        return response([
            'message' => $message,
            'status' => $status
        ], Response::HTTP_OK);
    }
}
