<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class contactcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = contact::all();
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // $request->validate([
    //     'name' => 'required|max:255|string',
    //     'email' => 'required|string',
    //     'subject' => 'required|string',
    //     'message' => 'required|string',
    // ]);
    // $name = $request->name;
    // $email = $request->email;
    // $subject = $request->subject;
    // $message = $request->message;

    // $contacts = contact::create(["name"=>$name,'email'=>$email,'subject'=>$subject,"message"=>$message]);

    // return redirect()->route('layout.master');
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        // Create the contact entry
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Instead of returning a view, just return a simple response
        return redirect()->back()->with('success', 'Message sent successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contacts = contact::find($id);
        $contacts->delete();

        return redirect()->route('contact.index')->with('success', 'contact deleted successfully.');
    }
}
