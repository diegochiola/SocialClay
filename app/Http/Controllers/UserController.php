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
        $users = User::all();
        return view('users.index',['users' => $users]);
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
            'date_of_birth' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'), //para que sea mayor de edad
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/', //validacion de contraseña
            'phone_number' => 'required|max:20',
            'role' => 'required|in:artist,enthusiast,administrator',
            'location' => 'required|max:250',
            'photo' => 'nullable|image|max:2048',
        ]);
        $name = ucwords(strtolower($request->input('name')));
        $surname = ucwords(strtolower($request->input('surname')));
        $location = ucwords(strtolower($request->input('location')));
        //save data
        $user = new User();
        $user->name = $name;
        $user->surname = $surname;
        $user->date_of_birth = $request->input('date_of_birth');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone_number = $request->input('phone_number');
        $user->role = $request->input('role');
        $user->location = $location;
        
         //save the picture as BOLOB in my db
         if ($request->hasFile('photo')) {
            $photoData = file_get_contents($request->file('photo')->getRealPath());
            $user->photo = $photoData;
        }
        $user->save(); //save

        return view("users.message", ['msg'=> 'User successfully created!']); //show view with message
    }

    /*
     * Display the specified resource.
     */
    public function show($id)
    {
        $user= User::find($id);
        return view('users.show', ['user' => $user]);
        
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
           //recibe el iddel alumno
           $user = User::find($id); //busque por el id
           return view('users.edit', ['user' => $user]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id); //busque por el id
        //Agregamos validaciones
        $request->validate([
            'name' => 'required|unique:users,name,'.$id.',id|max:120',
            'surname' => 'required|max:120',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'password' => 'required',
            'phone_number' => 'required|max:20',
            'role' => 'required|in:artist,enthusiast,administrator',
            'location' => 'required|max:250',
            //'photo' => 'nullable|image|max:2048',
        ]);
        $name = ucwords(strtolower($request->input('name')));
        $surname = ucwords(strtolower($request->input('surname')));
        $location = ucwords(strtolower($request->input('location')));
        // save data
         $user->name = $name;
        $user->surname = $surname;
        $user->date_of_birth = $request->input('date_of_birth');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone_number = $request->input('phone_number');
        $user->role = $request->input('role');
        $user->location = $location;
        //next version update photo

        $user->save(); // lo guardamos
            
        return view("users.message", ['msg' => "User updated successfully!"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id); //buscamos por el id
            $user->delete();
            return view("users.message", ['msg' => "User deleted successfully!"]);
    }
}
