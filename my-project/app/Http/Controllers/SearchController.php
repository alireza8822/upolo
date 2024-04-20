<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Company;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search for contacts or companies based on name.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for contacts with matching names
        $contacts = Contact::where('name', 'like', "%$query%")->get();

        // Search for companies with matching names
        $companies = Company::where('name', 'like', "%$query%")->get();

        return response()->json(['contacts' => $contacts, 'companies' => $companies]);
    }
}
