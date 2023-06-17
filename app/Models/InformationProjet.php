<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SettingProjetsPage;

class InformationProjet extends Model
{
    use HasFactory;
    public $fillable = ["email","phone","adress","localisation","projet_id"];
    public function SettingProjetsPage(){
        return $this->belognsTo(SettingProjetsPage::class);
    }
}
