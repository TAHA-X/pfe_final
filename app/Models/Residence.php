<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;

use App\Models\Immeuble;
use App\Models\Achat;
use App\Models\rendezVous;
use App\Models\Client;
use App\Models\SettingProjetsPage;

class Residence extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'adresse',
        "user_id",
        "projet_id"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function projet(){
        return $this->belongsTo(Projet::class);
    }
    public function immeuble(){
        return $this->hasMany(Immeuble::class);
    }
    public function achat(){
        return $this->hasMany(Achat::class);
    }
    public function rendez_vous(){
        return $this->hasMany(rendezVous::class,"résidence_id");
    }
    public function client(){
        return $this->hasMany(Client::class);
    }
    public function SettingProjetsPage(){
        return $this->hasOne(SettingProjetsPage::class,"residence_id");
    }
}
