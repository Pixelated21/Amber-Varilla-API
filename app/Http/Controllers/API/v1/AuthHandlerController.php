<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginHandlerRequest;
use App\Http\Requests\RegisterCompanyRequest;
use App\Http\Requests\RegisterHandlerRequest;
use App\Models\Company;
use App\Models\CompanyAdmin;
use App\Models\CompanyDetail;
use App\Models\CompanyEmployee;
use App\Models\User;
use App\Models\UserDetail;
use Auth;
use Cookie;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class AuthHandlerController extends Controller
{
//    Todo code needs to be clearer

    public function login(LoginHandlerRequest $loginHandlerRequest)
    {
        // Todo needs to be reviewed and polished

        $credentials = $loginHandlerRequest->validated();

        $user = User::with('userDetail')->where('email', '=', $credentials['email'])->first() ?? false;

        $companyAdmin = CompanyAdmin::with('userDetail')->where('email', '=', $credentials['email'])->first() ?? false;

        // $admin = CompanyAdmin::with('userDetail')->where('email', '=', $credentials['email'])->first() ?? false;
        $companyEmployee = CompanyEmployee::with('companyEmployeeAssignedRole')->where('email', '=', $credentials['email'])->first() ?? false;


        if ($user) {

            if (!Auth::guard('web')->attempt($credentials)) {
                return response([
                    'message' => "Invalid Credentials",
                ], ResponseAlias::HTTP_UNAUTHORIZED);
            }

            $token = $this->createToken($user);

            return response([
                'message' => 'Successfully Logged In',
                'userInfo' => Auth::guard('web')->user()->load(['userDetail']),
                'role' => "User",
                'token' => $token,
            ])->withCookie($this->createTokenCookie($token,1440));

        }

        if ($companyAdmin) {

            if (!Auth::guard('admin')->attempt($credentials)) {
                return response([
                    'message' => "Invalid Credentials",
                ], ResponseAlias::HTTP_UNAUTHORIZED);
            }

            $token = $this->createToken($companyAdmin);

            return response([
                'message' => 'Successfully Logged In',
                'userInfo' => Auth::guard('admin')->user()->load(['userDetail']),
                'role' => "cAdmin",
                'token' => $token,
            ])->withCookie($this->createTokenCookie($token,1440));

        }

        if ($companyEmployee) {

            $employeeRole = Collection::make($companyEmployee->companyEmployeeAssignedRole()->first())['company_roles']['companyRoleName'];

            if (!Auth::guard('employee')->attempt($credentials)) {
                return response([
                    'message' => "Invalid Credentials",
                ], ResponseAlias::HTTP_UNAUTHORIZED);
            }

            $token = $this->createToken($companyEmployee);


            return response([
                'message' => 'Successfully Logged In',
                'userInfo' => Auth::guard('employee')->user()->load(['companyEmployeeData','position','company']),
                'role' => $employeeRole,
                'token' => $token,
            ])->withCookie($this->createTokenCookie($token,1440));
        }

        return response([
        ], 401);


    }

    // Creates and returns a token from a given user.
    protected function createToken($userData,$name = 'token')
    {
        return $userData->createToken($name)->plainTextToken;
    }

    // Creates and returns a cookie from a given a name,token and minutes to expire.


    protected function createTokenCookie($token,$minutes,$name = 'jwt')
    {
        return cookie( $name, $token, $minutes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param RegisterHandlerRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function registerUser(RegisterHandlerRequest $registerHandlerRequest)
    {
//        Todo needs to be reviewed and polished
        // Stores Validated Request
        $credentials = $registerHandlerRequest->validated();

        // Creates User
        $user = User::create([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'uuid' => Str::uuid()
        ])->userDetail()->create([
            'firstName' => $credentials['firstName'],
            'lastName' => $credentials['lastName'],
            'birthDate' => $credentials['birthDate'],
            'sex' => $credentials['sex']
        ]);

        return response([
            'message' => 'Your Account Was Created Successfully! You May Now Login',
        ], ResponseAlias::HTTP_OK);
    }

    public function registerCompany(RegisterCompanyRequest $registerCompanyRequest)
    {
        // Stores Validated Request
        $validated = $registerCompanyRequest->validated();

        // Creates Company Admin
        $companyAdmin = CompanyAdmin::create([
            'email' => $validated['email'],
            'password' => $validated['password'],
            'uuid' => Str::uuid()
        ]);

        // Creates Company
        $company = Company::create([
            'company_admin_id' => $companyAdmin->id,
            'companyName' => $validated['companyName'],
            'uuid' => Str::uuid(),
            'isVerified' => now(),
        ]);

        // Creates Company Detail
        $companyDetails = CompanyDetail::create([
            'company_id' => $company->id,
            'companyEmail' => $validated['companyEmail'],
            'companyContact' => $validated['companyContact'],
            'companyAddress' => $validated['companyAddress'],
            'companyWebsite' => $validated['companyWebsite'],
            'companyCountry' => $validated['companyCountry'],
        ]);

        return response([
            'message' => 'Company Was Registered Successfully! You May Now Sign In',
        ], ResponseAlias::HTTP_OK);


    }

    public function logout(Request $request)
    {
//        Todo Needs to be modified to logout different users

        $request->user()->tokens()->delete();

        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'Successfully Logged Out'
        ])->withCookie($cookie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
//        TODO Needs To Work

        $updates = $request->validated();

        $account = $user->update([
            'email' => $updates['email'],
            'password' => $updates['password']
        ]);

        return response([
            'message' => 'Update Successful'
        ],ResponseAlias::HTTP_OK);
    }

    public function deleteEmployee(CompanyEmployee $companyEmployee)
    {
//        TODO needs to be be made functional

        $account = $companyEmployee;
        $account->delete();

        return response([
            'message' => $account->email . " " . "Was Deleted Successfully",
            'undoID' => $account->id
        ], ResponseAlias::HTTP_OK);
    }

    public function deleteUser(User $user)
    {
//        TODO needs to be be made functional

        $account = $user;
        $account->delete();

        return response([
            'message' => $account->email . " " . "Was Deleted Successfully",
            'undoID' => $account->id
        ], ResponseAlias::HTTP_OK);
    }

}
