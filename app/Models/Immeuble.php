<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Residence;
use App\Models\Appartement;
use App\Models\Achat;

class Immeuble extends Model
{
    use HasFactory;
    protected $fillable = [
        'entrée',
        'num',
        'status',
        'residence_id'
    ];
    public function residence(){
        return $this->belongsTo(Residence::class);
    }
    public function appartement(){
        return $this->hasMany(Appartement::class);
    }
    public function achat(){
        return $this->hasMany(achat::class);
    }
}
