<?php

use App\Http\Controllers\API\v1\AuthHandlerController;
use App\Http\Controllers\API\v1\hr\EmployeeController;
use App\Http\Controllers\API\v1\hr\JobController as HrJobController;
use App\Http\Controllers\API\v1\employee\EmployeeController as EmpEmployeeController;
use App\Http\Controllers\API\v1\user\CompanyController;
use App\Http\Controllers\API\v1\admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\API\v1\user\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'user'], function () {

    Route::group(['middleware' => 'auth:sanctum'], static function () {

        Route::post('/jobApplication', [JobController::class, 'jobApplication'])->name('user.on_apply');
        Route::get('/jobApplied', [JobController::class, 'jobsAppliedFor'])->name('user.applied');

   });


    Route::get('/jobs', [JobController::class, 'availableJobs'])->name('user.jobs');
    Route::get('/recentJobs', [JobController::class, 'recentJobs'])->name('user.recent_jobs');
    Route::get('/jobs/{id}', [JobController::class, 'singleJob'])->name('user.single_job');

    Route::get('/company', [CompanyController::class, 'companies'])->name('user.companies');
    Route::get('/company/{id}', [CompanyController::class, 'singleCompany'])->name('user.single_company');



});

Route::group(['prefix' => 'hr'], static function () {

    Route::get('/employee/recentLeaves', [EmployeeController::class, 'recentLeaves'])->name('hr.employee_recent_leaves');
    Route::get('/employee/count', [EmployeeController::class, 'employeeCount'])->name('hr.employee_count');
    Route::post('/employee/toggle/{id}', [EmployeeController::class, 'toggleEmployeeStatus'])->name('hr.toggle_employee');
    Route::post('/jobs/toggle/{id}', [HrJobController::class, 'toggleJobStatus'])->name('hr.toggle_job');


    Route::get('/jobs', [HrJobController::class, 'listedJobs'])->name('hr.jobs');
    Route::get('/jobs/{id}', [HrJobController::class, 'singleListedJobs'])->name('hr.single_job');
    Route::post('/jobs', [HrJobController::class, 'createJob'])->name('hr.update_job');
    Route::patch('/jobs/{id}', [HrJobController::class, 'updateJob'])->name('hr.update_job');
    Route::delete('/jobs/{id}', [HrJobController::class, 'deleteJob'])->name('hr.delete_job');

    Route::get('/employee', [EmployeeController::class, 'allEmployees']);
    Route::post('/employee', [EmployeeController::class, 'createEmployee']);
    Route::get('/employee/{id}', [EmployeeController::class, 'singleEmployee']);
    Route::delete('/employee/{id}', [EmployeeController::class, 'deleteEmployee']);


});

Route::group(['prefix' => 'emp'], static function () {

    Route::post('/leaveRequest', [EmpEmployeeController::class, 'leaveRequest']);
    Route::get('/directory', [EmpEmployeeController::class, 'companyTeamMember']);

});


Route::group(['prefix' => 'admin'], static function () {

    Route::get('/companies', [AdminCompanyController::class, 'allCompanies'])->name('admin.companies');
    Route::get('/directory', [EmpEmployeeController::class, 'companyTeamMember']);

});


Route::group(['prefix' => 'cadmin'], static function () {

    Route::post('/admin/companies', [EmpEmployeeController::class, 'leaveRequest']);
    Route::get('/directory', [EmpEmployeeController::class, 'companyTeamMember']);

});


Route::post('/login', [AuthHandlerController::class, 'login'])->name('login');
Route::post('/register', [AuthHandlerController::class, 'registerUser'])->name('register-user');
Route::post('/company/onboarding', [AuthHandlerController::class, 'registerCompany'])->name('register-company');
Route::delete('/delete/{user}', [AuthHandlerController::class, 'deleteUser'])->name('delete-user');
Route::delete('/delete/{employee}', [AuthHandlerController::class, 'deleteEmployee'])->name('delete-employee');


