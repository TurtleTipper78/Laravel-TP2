<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); 
        return view('User.index', ['user' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    public function register(Request $request)
{
    // Handle user registration here

    // Redirect to the edit view after registration
    return redirect()->route('user.edit', ['user' => auth()->user()]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'nullable|string|max:191',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string|max:20',
            'email' => 'required|email',
            'date_de_naissance' => 'nullable|date',
            'ville_id' => 'nullable|integer',
            'password' => 'required|min:6|max:20',
        ]);

        $user = new User();
        
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        

        $user->save();

        return redirect()->route('user.info', $user->id)->with('success', 'User created successfully!');
    }

    public function info(User $user)
    {
        return view ('user.info', ['user' => $user]);
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required|string|max:191',
            'adresse' => 'required|string',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'date_de_naissance' => 'nullable|date',
            'ville_id' => 'nullable|integer'
        ]);
        

        $user->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect()->route('user.show', $user->id)->with('success', 'User updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}
