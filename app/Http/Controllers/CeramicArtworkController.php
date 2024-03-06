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
        $artworks = CeramicArtwork::all();

        return view('ceramicArtworks.index');
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
            'ceramic_technique' => 'required|in:Handbuilding,Wheel throwing,Slab building,Coiling',
            'creation_date' => 'nullable',
            'photo' => 'nullable',
        ]);
    
        // save data
        $ceramicArtwork = new CeramicArtwork();
        $ceramicArtwork->title = $request->input('title');
        $ceramicArtwork->description = $request->input('description');
        $ceramicArtwork->ceramic_technique = $request->input('ceramic_technique');
        $ceramicArtwork->creation_date = $request->input('creation_date');
        $ceramicArtwork->photo = $request->input('photo');
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

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
