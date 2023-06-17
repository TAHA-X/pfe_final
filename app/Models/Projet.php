<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Residence;
use App\Models\Achat;
use App\Models\rendezVous;
class Projet extends Model
{
    protected $fillable = [
        'title',
        'adresse',
    ];
    use HasFactory;
    public function residence(){
        return $this->hasMany(Residence::class);
    }
    public function achat(){
        return $this->hasMany(Achat::class);
    }
    public function rendezVous(){
        return $this->hasMany(rendezVous::class);
    }
}
