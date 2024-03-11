<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeramicChallenge extends Model
{
    use HasFactory;
    protected $table= 'ceramic_challenges';

    protected $fillable = ['title', 'description', 'start_date', 'end_date','photo'];
    public $timestamps = false;

    public function ceramicChallenges()
    {
        return $this->belongsToMany(CeramicChallenge::class, 'ceramicChallenges'); //establece una relación muchos a muchos 
                                                                            
    }


}
