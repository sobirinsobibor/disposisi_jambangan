<?php

namespace App\Models;
use App\Models\DetailSM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detailsm(){
        return $this->hasMany(DetailSM::class, 'suratmasuk');
    }
}
