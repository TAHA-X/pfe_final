<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SettingProjetsPage;

class PlanProjet extends Model
{
    use HasFactory;
    public $fillable = ["chambre","salon","sall_bain","cuisine","balcon","projet_id"];
    public function SettingProjetsPage(){
        return $this->belognsTo(SettingProjetsPage::class);
    }
}
