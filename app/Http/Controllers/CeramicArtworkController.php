<?php

namespace App\Http\Controllers;

use App\Models\CeramicArtwork;
use App\Models\User;
use Illuminate\Http\Request;

class CeramicArtworkController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ceramicArtworks = CeramicArtwork::all();
        return view('ceramicArtworks.index', ['artworks' => $ceramicArtworks]);

        //$ceramicArtworks = CeramicArtwork::all();

        //return view('ceramicArtworks.index');
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ceramicArtworks.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validations
        $request->validate([
            'title' => 'required|unique:ceramic_artworks|max:50',
            'description' => 'required|max:255',
            'ceramic_technique' => 'required|in:Handbuilding,Wheel_throwing,Slab_building,Coiling',
            'creation_date' => 'nullable',
            'created_by' => 'required|max:125',
            'photo' => 'nullable',
        ]);
    
        // save data
        $ceramicArtwork = new CeramicArtwork();
        $ceramicArtwork->title = $request->input('title');
        $ceramicArtwork->description = $request->input('description');
        $ceramicArtwork->ceramic_technique = $request->input('ceramic_technique');
        $ceramicArtwork->creation_date = $request->input('creation_date');
        $ceramicArtwork->created_by = $request->input('created_by');
        $ceramicArtwork->photo = $request->input('photo');
        //para guardar la foto en si:
        /*if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoData = file_get_contents($photo->getRealPath());
            $ceramicArtwork->photo = base64_encode($photoData);
        }*/
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
            $ceramicArtwork->photo = $photoPath;
        }

        $ceramicArtwork->save(); // lo guardamos
    
        return view("ceramicArtworks.message", ['msg' => "Ceramic Artwork created successfully!"]);
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
    public function edit($id)
    {
               //recibe el iddel alumno
               $ceramicArtwork = CeramicArtwork::find($id); //busque por el id
               return view('ceramicArtworks.edit', ['ceramicArtwork' => $ceramicArtwork]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //first found the id
        $ceramicArtwork = CeramicArtwork::findOrFail($id);
                // validations
                $request->validate([
                    'title' => 'required|unique:ceramic_artworks,title,'.$id.',id|max:50', //debera ignorar el unique porque esta editando el mismo elemento
                    'description' => 'required|max:255',
                    'ceramic_technique' => 'required|in:Handbuilding,Wheel_throwing,Slab_building,Coiling',
                    'creation_date' => 'nullable',
                    'created_by' => 'required|max:125',
                    'photo' => 'nullable',
                ]);
            
                // save data
                $ceramicArtwork->title = $request->input('title');
                $ceramicArtwork->description = $request->input('description');
                $ceramicArtwork->ceramic_technique = $request->input('ceramic_technique');
                $ceramicArtwork->creation_date = $request->input('creation_date');
                $ceramicArtwork->created_by = $request->input('created_by');
                $ceramicArtwork->photo = $request->input('photo');
                $ceramicArtwork->save(); // lo guardamos
            
                return view("ceramicArtworks.message", ['msg' => "Ceramic Artwork updated successfully!"]);
            }
    

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            
            $ceramicArtwork = CeramicArtwork::find($id); //buscamos por el id
            $ceramicArtwork->delete();
            return view("ceramicArtworks.message", ['msg' => "Ceramic Artwork deleted successfully!"]);
    }
}
