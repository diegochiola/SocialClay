<?php

namespace App\Http\Controllers;

use App\Models\CeramicChallenge;
use App\Models\User;
use Illuminate\Http\Request;

class CeramicChallengeController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(){
        $ceramicChallenges = CeramicChallenge::all();
        return view('ceramicChallenges.index', ['ceramicChallenges' => $ceramicChallenges]);

        //$ceramicChallenges = ceramicCh$ceramicChallenge::all();

        //return view('ceramicChallenges.index');
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create(){
        //$users = User::all();
        //$ceramicChallenge = new CeramicChallenge();
        //return view('ceramicChallenges.participate', ['users' => $users, 'ceramicChallenge' => $ceramicChallenge]);
        return view('ceramicChallenges.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // validations
        $request->validate([
            'title' => 'required|unique:ceramic_challenges|max:50',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            
        ]);
    
        // save data
        $ceramicChallenge = new CeramicChallenge();
        $ceramicChallenge->title = $request->input('title');
        $ceramicChallenge->description = $request->input('description');
        $ceramicChallenge->start_date = $request->input('start_date');
        $ceramicChallenge->end_date = $request->input('end_date');
        $ceramicChallenge->save(); 
        return view("ceramicChallenges.message", ['msg' => "Ceramic Challenge created successfully!"]);
    }

    /*
     * Display the specified resource.
     */
    public function show($id){

    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit($id){
               //recibe el iddel artwork
               $ceramicChallenge = ceramicChallenge::find($id); //busque por el id
               return view('ceramicChallenges.edit', ['ceramicChallenge' => $ceramicChallenge]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        //first found the id
        $ceramicChallenge = CeramicChallenge::findOrFail($id);
                // validations
                $request->validate([
                    'title' => 'required|unique:ceramic_challenges,title,'.$id.',id|max:50', //debera ignorar el unique porque esta editando el mismo elemento
                    'description' => 'required|max:255',
                    'start_date' => 'required',
                    'end_date' => 'required',
       
                ]);
            
                // save data
                $ceramicChallenge->title = $request->input('title');
                $ceramicChallenge->description = $request->input('description');
                $ceramicChallenge->start_date = $request->input('start_date');
                $ceramicChallenge->end_date = $request->input('end_date');
                $ceramicChallenge->save(); // lo guardamos
                //return redirect()->route('ceramicChallenges.show', $ceramicChallenge->id)->with('success', 'Ceramic challenge updated successfully!');

                return view("ceramicChallenges.message", ['msg' => "Ceramic challenge updated successfully!"]);
            }
    

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id){
            
            $ceramicChallenge = CeramicChallenge::find($id); //buscamos por el id
            $ceramicChallenge->delete();
            return view("ceramicChallenges.message", ['msg' => "Ceramic Challenge deleted successfully!"]);
    }

   /* public function participate(Request $request, $id){
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
    
        // Buscar el desafío de cerámica
        $ceramicChallenge = CeramicChallenge::findOrFail($id);
    
        // Obtener todos los usuarios
        $users = User::all();
    
        // Verificar si el desafío de cerámica y los usuarios están disponibles
        if (!$ceramicChallenge) {
            return view("ceramicChallenges.message", ['msg' => "Ceramic Challenge not found!"]);
        }
    
        if ($users->isEmpty()) {
            return view("ceramicChallenges.message", ['msg' => "No users available!"]);
        }
    
        // Obtener el ID del usuario del formulario
        $userId = $request->input('user_id');
    
        // Adjuntar el usuario al desafío de cerámica
        $ceramicChallenge->users()->attach($userId);
        return view('ceramicChallenges.participate', ['ceramicChallenge' => $ceramicChallenge, 'users' => $users]);
        //return view("ceramicChallenges.message", ['msg' => "User added to the challenge successfully!"]);
    }
   */
  public function participate(Request $request, $id){
    // Validaciones
    $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);

    // Buscar el desafío de cerámica
    $ceramicChallenge = CeramicChallenge::findOrFail($id);

    // Obtener el ID del usuario del formulario
    $userId = $request->input('user_id');

    // Adjuntar el usuario al desafío de cerámica
    $ceramicChallenge->users()->attach($userId);

    // Redirigir al usuario a la vista de éxito o a otra vista adecuada
    return redirect()->route('ceramicChallenges.participate', $ceramicChallenge->id)->with('success', 'User added to the challenge successfully!');
}
}



