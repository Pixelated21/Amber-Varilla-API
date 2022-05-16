<?php

namespace App\Http\Controllers\API\v1\user;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function companies()
    {
        $data = Company::with('companyDetail')->get();

        return response([
            'data' => $data
        ], \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }

    public function singleCompany($id)
    {
        $data = Company::with('companyDetail','jobs')->withCount('jobs','companyEmployees','applications')->where('uuid','=',$id)->first();

        return response([
            'data' => $data
        ], \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }
}
