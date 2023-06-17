<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Achat;
use App\Models\Residence;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ["prénom","nom","email","phone","sex","age","résidence_id"];
    public function achat(){
        return $this->hasMany(Achat::class);
    }
    public function residence(){
        return $this->belongsTo(Residence::class,"résidence_id");
    }
}
