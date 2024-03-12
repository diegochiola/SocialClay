<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeParticipation extends Model
{
    protected $table= 'challenge_participations';
    protected $fillable = ['user_id', 'ceramic_challenge_id', 'ceramic_artwork_id'];
}
