<?php

namespace App\Models;
use App\Models\DetailSM;
use App\Models\SuratKeluar;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];

    public function detailsm(){
        return $this->hasMany(DetailSM::class, 'kasi');
    }

    public function sk(){
        return $this->hasMany(SuratKeluar::class, 'kasi');
    }
}
