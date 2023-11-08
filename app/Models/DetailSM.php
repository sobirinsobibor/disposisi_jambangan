<?php

namespace App\Models;
use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSM extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class, 'kasi');
    }

    public function sm(){
        return $this->belongsTo(SuratMasuk::class, 'suratmasuk');
    }
}
