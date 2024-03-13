<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'date_of_birth',
        'email',
        'password',
        'phone_number',
        'role',
        'location',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'users'); //establece una relación muchos a muchos                                                                        
    }
    public function ceramicArtworks(){
        return $this->belongsToMany(CeramicArtwork::class, 'challenge_participations')->withTimestamps();
    }
    public function challenges(){
        return $this->belongsToMany(CeramicChallenge::class, 'challenge_participations')->withTimestamps();
    }
    public function ceramicArtworksForChallenge($challengeId){
        return $this->ceramicArtworks()->where('ceramic_challenge_id', $challengeId)->get();
    }
}
