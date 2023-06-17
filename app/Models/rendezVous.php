<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use App\Models\Residence;

class rendezVous extends Model
{
    use HasFactory;
    protected $fillable = ["nom","prénom","phone","projet_id","résidence_id","status"];
    public function projet(){
        return $this->belongsTo(Projet::class);
    }
    public function residence(){
        return $this->belongsTo(Residence::class,"résidence_id");
    }
}
