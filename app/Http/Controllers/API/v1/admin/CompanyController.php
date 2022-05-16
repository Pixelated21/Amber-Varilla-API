<?php

namespace App\Http\Controllers\API\v1\admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Symfony\Component\HttpFoundation\Response as Response;

class CompanyController extends Controller
{
    // Returns all the active companies
    public function allCompanies()
    {
        $data = Company::with('companyDetail')->where('company_admin_id', 1)->where('isVerified','!=',null)->get();

        return response([
            'data' => $data
        ], Response::HTTP_OK);
    }

}
