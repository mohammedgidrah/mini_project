<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;


class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'username' => 'required|max:255',
        //     // 'email' => 'required|max:255',
        // ]);
        // dd($request);
        $name = $request->name;
        $password = $request->password;
        // $firstname = $request->firstname;
        // $lastname = $request->lastname;
        $email = $request->email;

       $user = User::create(["name"=>$name,'email'=>$email,'password'=>$password]);
        // Profile::create(["firstname"=>$firstname,"lastname"=>$lastname,"user_id"=>$user->id]);

    
        return redirect()->route('user.index')->with('success', 'Users added successfully.');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    
    {
        // $username = $request->username;
        // $firstname = $request->firstname;
        // $lastname = $request->lastname;
        // $email = $request->email;
        

        // $users = User::onlyTrashed()->get();
        // $users = Profile::onlyTrashed()->get();
        // return view('Users.softdelete' , compact('users'));


        
            // Retrieve only soft-deleted users and their associated soft-deleted profiles
            $users = User::onlyTrashed()->with(['profile' => function ($query) {
                $query->onlyTrashed();
            }])->get();
        
            return view('Users.softdelete', compact('users'));
        
        
        
    }
//     public function show(string $id)
// {
//     // Retrieve the user along with the associated profile using eager loading
//     $user = User::with('profile')->findOrFail($id);

//     // Check if the user has an associated profile
//     if (!$user->profile) {
//         // Handle the case where the profile does not exist
//         return redirect()->back()->with('error', 'Profile not found.');
//     }

//     // Pass the user to the view
//     return view('Users.softdelete', compact('user'));
// }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $user = User::find($id);
        // return view('Users.edit', compact('user'));   
         }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
        ]);
    
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Update user attributes
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->save();
    
        // Update profile attributes
        if ($user->profile) {
            $user->profile->firstname = $request->input('firstname');
            $user->profile->lastname = $request->input('lastname');
            $user->profile->save();
        }
    
        // Redirect back to the users index with a success message
        return redirect()->route('Users.index')->with('success', 'User updated successfully.');
    }
    
    
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        // $user->profile()->delete();
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}