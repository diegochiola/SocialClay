<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeramicArtwork extends Model
{
    protected $table= 'CeramicArtworks';


    //function to asign ceramicTechnique
    public function ceramicTechnique(){
        return $this->belongsTo(CeramicTechnique::class,'ceramic_technique_id', 'id');//para saber como se relacionaran las tablas
    }
}
