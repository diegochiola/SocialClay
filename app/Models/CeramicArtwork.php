<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeramicArtwork extends Model
{
    use HasFactory;
    protected $table = 'ceramic_artworks';
    protected $fillable = ['title', 'description', 'ceramic_technique', 'creadtion_date','photo'];
    public $timestamps = false;

    public function ceramicArtworks()
    {
        return $this->belongsToMany(CeramicArtwork::class, 'ceramicartworks'); //establece una relación muchos a muchos 
                                                                            
    }
    
  
    //protected $table= 'socialclay.ceramic_artworks';


    /*function to asign ceramicTechnique in case technique were a table ->next step to improve 
    public function ceramicTechnique(){
        return $this->belongsTo(CeramicTechnique::class,'ceramic_technique_id', 'id');//para saber como se relacionaran las tablas
    }*/

}
