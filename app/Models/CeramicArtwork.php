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
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by'); // Si el campo en la tabla de CeramicArtwork que hace referencia al usuario es 'created_by'
    }
    public function ceramicArtworks()
    {
        return $this->belongsToMany(CeramicArtwork::class, 'ceramicartworks'); //establece una relación muchos a muchos 
                                                                            
    }
    public function users()
{
    return $this->belongsToMany(User::class, 'user_artworks');
}


}
