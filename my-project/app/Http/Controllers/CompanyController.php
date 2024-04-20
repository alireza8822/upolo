<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreOrUpdateCompany;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Retrieve all companies
    public function index()
    {
        $companies = Company::paginate(10);

        return response()->json(['data' => $companies]);
    }

    // Retrieve contacts of a specific company
    public function contacts(Company $company)
    {
        $contacts = $company->contacts()->paginate(10);

        return response()->json(['data' => $contacts]);
    }

    // Store a new company
    public function store(StoreOrUpdateCompany $request)
    {
        $validatedData = $request->validated();

        $company = Company::create($validatedData);


        return response()->json(['message' => 'Company created successfully', 'data' => $company], 201);
    }
}
