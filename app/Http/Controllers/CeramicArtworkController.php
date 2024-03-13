<?php

namespace App\Http\Controllers;

use App\Models\CeramicArtwork;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserArtwork;

class CeramicArtworkController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(){
        $ceramicArtworks = CeramicArtwork::with('user')->get();
        return view('ceramicArtworks.index', ['artworks' => $ceramicArtworks]);
    }

    public function create(){
        // get all users
        $users = User::all();
        // show the user in view
        return view('ceramicArtworks.create', ['users' => $users]);
        //return view('ceramicArtworks.create');
    }

    public function store(Request $request){
        // validations
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:255',
            'ceramic_technique' => 'required|in:Handbuilding,Wheel_throwing,Slab_building,Coiling',
            'creation_date' => 'nullable',
            'created_by' => 'required|max:125',
            'photo' => 'nullable|image|max:2048',
        ]);
        $title = ucwords(strtolower($request->input('title')));
        $description = ucwords(strtolower($request->input('description')));
        
        // save data
        $ceramicArtwork = new CeramicArtwork();
        $ceramicArtwork->title = $title;
        $ceramicArtwork->description = $description;
        $ceramicArtwork->ceramic_technique = $request->input('ceramic_technique');
        $ceramicArtwork->creation_date = $request->input('creation_date');
        $ceramicArtwork->created_by = $request->input('created_by');
       //$ceramicArtwork->photo = $request->input('photo');
        
        //save the picture as BOLOB in my db
        if ($request->hasFile('photo')) {
            $photoData = file_get_contents($request->file('photo')->getRealPath());
            $ceramicArtwork->photo = $photoData;
        }
        //save
        $ceramicArtwork->save(); 
        //create relation with userArtwork
        $userArtwork = new UserArtwork();
        $userArtwork->user_id = $request->input('created_by'); 
        $userArtwork->ceramic_artwork_id = $ceramicArtwork->id;
        $userArtwork->save();
    
        return view("ceramicArtworks.message", ['msg' => "Ceramic Artwork created successfully!"]);
    }

    public function show($id){

    }

    public function edit($id){
               //recibe el iddel artwork
               $ceramicArtwork = CeramicArtwork::find($id); //busque por el id
               $users = User::all();
               return view('ceramicArtworks.edit', ['ceramicArtwork' => $ceramicArtwork, 'users' => $users]);
    }

    public function update(Request $request, $id){
        // first find the record by id
        $ceramicArtwork = CeramicArtwork::findOrFail($id);
        
        // Validations
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:255',
            'ceramic_technique' => 'required|in:Handbuilding,Wheel_throwing,Slab_building,Coiling',
            'creation_date' => 'nullable',
            'created_by' => 'required|max:125',
            //'photo' => 'nullable|image|max:2048', This campus will be repair later
        ]);
        $title = ucwords(strtolower($request->input('title')));
        $description = ucwords(strtolower($request->input('description')));
    
        // Update data
        $ceramicArtwork->title = $title;
        $ceramicArtwork->description = $description;
        $ceramicArtwork->ceramic_technique = $request->input('ceramic_technique');
        $ceramicArtwork->creation_date = $request->input('creation_date');
        $ceramicArtwork->created_by = $request->input('created_by');
        //save
        $ceramicArtwork->save(); 
        
        //create relation with userArtwork
        $userId = $request->input('created_by');
        $userArtwork = UserArtwork::where('ceramic_artwork_id', $ceramicArtwork->id)->first();
        if ($userArtwork) {
            $userArtwork->user_id = $userId;
            $userArtwork->save();
        } else {
            $newUserArtwork = new UserArtwork();
            $newUserArtwork->user_id = $userId;
            $newUserArtwork->ceramic_artwork_id = $ceramicArtwork->id;
            $newUserArtwork->save();
        }
    
        return view("ceramicArtworks.message", ['msg' => "Ceramic Artwork updated successfully!"]);
    }

    public function destroy($id){
            $ceramicArtwork = CeramicArtwork::find($id); 
            //logic for delet from usearArtwork
            if ($ceramicArtwork) {
                $userArtwork = UserArtwork::where('ceramic_artwork_id', $ceramicArtwork->id)->first();
                if ($userArtwork) {
                    $userArtwork->delete();
                }
                $ceramicArtwork->delete();
                return view("ceramicArtworks.message", ['msg' => "Ceramic Artwork deleted successfully!"]);
            } else {
                return view("ceramicArtworks.message", ['msg' => "Ceramic Artwork not found!"]);
            }
    }
}
