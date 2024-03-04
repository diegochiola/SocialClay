<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArtwork extends Model
{
    use HasFactory;
    protected $table = 'user_artworks';

    //foreign keys to connect intermidate table
    public function user(){
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function ceramicArtwork(){
        return $this->belongsTo(CeramicArtwork::class, 'ceramic_artwork_id'); 
    }




}
