<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreOrUpdateContact;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    // Retrieve all contacts
    public function index()
    {
        $contacts = Contact::all();

        return response()->json(['data' => $contacts]);
    }

// Retrieve a specific contact
    public function show(Contact $contact)
    {
        return response()->json(['data' => $contact]);
    }
// Create a new contact
    public function store(StoreOrUpdateContact $request, $company_id)
    {
        // Validate the request data
        $validatedData = $request->validated();

        $contacts = [];

        // Loop through the array of contacts
        foreach ($validatedData['contacts'] as $contactData) {
            // Create a new contact for each entry in the array
            $contact = Contact::create([
                'name' => $contactData['name'],
                'email' => $contactData['email'],
                'company_id' => $company_id, // Associate with the company
                // Add other fields as needed
            ]);

            $contacts[] = $contact;
        }

        return response()->json(['message' => 'Contacts created successfully', 'data' => $contacts], 201);
    }

// Update an existing contact
    public function update(StoreOrUpdateContact $request, Contact $contact)
    {
        $validatedData = $request->validated();

        $contacts = $validatedData['contacts'];

        if (!empty($contacts)) {
            $contactData = reset($contacts);
            $contact->update($contactData);
        }

        return response()->json(['message' => 'Contact updated successfully', 'data' => $contact]);
    }

// Update an existing contact to add a note
    public function addNote(Request $request, Contact $contact)
    {
        // Update the contact to add a note
        $contact->update([
            'note' => $request->input('note'),
        ]);

        return response()->json(['message' => 'Note added successfully']);
    }

}
