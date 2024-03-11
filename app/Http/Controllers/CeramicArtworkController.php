<?php

namespace App\Http\Controllers;

use App\Models\CeramicArtwork;
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
            'photo' => 'nullable|image|max:2048',
        ]);
    
        // save data
        $ceramicArtwork = new CeramicArtwork();
        $ceramicArtwork->title = $request->input('title');
        $ceramicArtwork->description = $request->input('description');
        $ceramicArtwork->ceramic_technique = $request->input('ceramic_technique');
        $ceramicArtwork->creation_date = $request->input('creation_date');
        $ceramicArtwork->created_by = $request->input('created_by');
       //$ceramicArtwork->photo = $request->input('photo');
        
        //save the picture as BOLOB in my db
        if ($request->hasFile('photo')) {
            $photoData = file_get_contents($request->file('photo')->getRealPath());
            $ceramicArtwork->photo = $photoData;
        }

        $ceramicArtwork->save(); // lo guardamos
    
        return view("ceramicArtworks.message", ['msg' => "Ceramic Artwork created successfully!"]);
    }

    /*
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
               //recibe el iddel artwork
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
                    //'photo' => 'nullable|image|max:2048',
                ]);
            
                // save data

                $ceramicArtwork->title = $request->input('title');
                $ceramicArtwork->description = $request->input('description');
                $ceramicArtwork->ceramic_technique = $request->input('ceramic_technique');
                $ceramicArtwork->creation_date = $request->input('creation_date');
                $ceramicArtwork->created_by = $request->input('created_by');
               /*
              //save the picture as BOLOB in my db
                // Verificar si el archivo es válido como imagen
                if ($request->file('photo')->isValid()) {
                    // Guardar la nueva foto como BLOB en la base de datos
                    $photoData = file_get_contents($request->file('photo')->getRealPath());
                    $ceramicArtwork->photo = $photoData;
                } else {
                    // Enviar mensaje de error con más detalles sobre por qué el archivo no es una imagen válida
                    return back()->withErrors(['photo' => 'The photo must be a valid image.'])->withInput()->withErrors([$request->file('photo')->getErrorMessage()]);
                }
                */

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
