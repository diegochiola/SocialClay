<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        //show users table
        //$users = User::all();
        return view('users.create');
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        //Agregamos validaciones
        $request->validate([
            'name' => 'required|unique:users|max:120',
            'surname' => 'required|max:120',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'password' => 'required',
            'phone_number' => 'required|max:20',
            'role' => 'required|in:artist,enthusiast,administrator',
            'location' => 'required|max:250',
            'photo' => 'nullable',
        ]);
        //save data
        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone_number = $request->input('phone_number');
        $user->role = $request->input('role');
        $user->location = $request->input('location');
        $user->photo = $request->input('photo');
        $user->save(); //save

        return view("users.message", ['msg'=> 'User successfully created!']); //show view with message
    }

    /*
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
