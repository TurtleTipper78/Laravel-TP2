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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:191',
            'adresse' => 'required|string',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'date_de_naissance' => 'nullable|date',
            'ville_id' => 'nullable|integer',
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->adresse = $request->adresse;
        $user->telephone = $request->input('telephone');
        $user->email = $request->input('email');
        $user->date_de_naissance = $request->input('date_de_naissance');
        $user->ville_id = $request->input('ville_id');

        $user->save();

        return redirect()->route('user.show', $user->id)->with('success', 'User created successfully!');
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
