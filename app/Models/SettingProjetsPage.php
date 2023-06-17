<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InformationProjet;
use App\Models\PlanProjet;
use App\Models\Residence;

class SettingProjetsPage extends Model
{
    use HasFactory;
    public $fillable = ["img","title","description","residence_id","ville"];
    public function InformationProjet(){
        return $this->hasOne(InformationProjet::class,"projet_id");
    }
    public function PlanProjet(){
        return $this->hasOne(PlanProjet::class,"projet_id");
    }
    public function Residence(){
        return $this->belongsTo(Residence::class,"residence_id");
    }
}
