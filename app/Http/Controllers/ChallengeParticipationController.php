<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CeramicChallenge;
use App\Models\User;
use App\Models\ChallengeParticipation;
use Illuminate\Support\Facades\Auth;
 
class ChallengeParticipationController extends Controller
{
    //
        public function create($id) {
            
            $ceramicChallenge = CeramicChallenge::find($id);
            if (!$ceramicChallenge) {
                return view("ceramicChallenges.message", ['msg' => "Ceramic Challenge not found."]);
            }
            $users = User::all();
            $ceramicArtworks = Auth::user()->ceramicArtworks;
            return view("challengeParticipation.create", ['ceramicChallenge' => $ceramicChallenge, 'users' => $users, 'ceramicArtworks' => $ceramicArtworks]);
        }
    

    public function store(Request $request, $id){
        // Validar los datos del formulario
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'ceramic_artwork_id' => 'required|exists:ceramic_artworks,id',
        ]);

        // Crear una nueva participación
        ChallengeParticipation::create([
            'user_id' => $request->user_id,
            'ceramic_challenge_id' => $id,
            'ceramic_artwork_id' => $request->input('ceramic_artwork_id'),
            //'ceramic_artwork_id' => $request->ceramic_artwork_id, 

        ]);

        return view("challengeParticipation.message", ['msg' => "Participation created successfully!"]);
        //return redirect()->route('ceramicChallenges.index')->with('success', 'Participation created successfully!');
    }

}


