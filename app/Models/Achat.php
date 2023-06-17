<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use App\Models\Residence;
use App\Models\Immeuble;
use App\Models\Appartement;
use App\Models\Client;

class Achat extends Model
{
    use HasFactory;
    protected $fillable = ["projet_id","residence_id","immeuble_id","appartement_id","client_id"];
    public function projet(){
        return $this->belongsTo(Projet::class);
    }
    public function residence(){
        return $this->belongsTo(Residence::class);
    }
    public function immeuble(){
        return $this->belongsTo(Immeuble::class);
    }
    public function appartement(){
        return $this->belongsTo(Appartement::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
