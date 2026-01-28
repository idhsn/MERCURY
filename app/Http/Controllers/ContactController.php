<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $contacts = Contact::with('group')->get();
    return view('contacts.index', compact('contacts'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $groups = Group::all();
    return view('contacts.create', compact('groups'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:20',
            'group_id' => 'required|exists:groups,id'
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        $groups = Group::all();
        return view('contacts.edit', compact('contact', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,'.$id, // Ignore current contact email
            'phone' => 'required|string|max:20',
            'group_id' => 'required|exists:groups,id'
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
    /**
     * Dynamic Search stuff ts
     */
    public function search(Request $request)
{
    $search = $request->input('search');
    
    if($search != '') {
        $contacts = Contact::where('name', 'like', '%'.$search.'%')
                            ->orWhere('email', 'like', '%'.$search.'%')
                            ->with('group')
                            ->get();
    } else {
        $contacts = Contact::with('group')->get();
    }
    
    // Return ONLY the HTML (no extra whitespace)
    return view('contacts.partials.list', compact('contacts'));
}



}
