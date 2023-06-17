<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Immeuble;
use App\Models\Achat;

class Appartement extends Model
{
    use HasFactory;
    protected $fillable = [
        'num',
        'status',
        'immeuble_id'
    ];
    public function immeuble(){
        return $this->belongsTo(Immeuble::class);
    }
    public function achat(){
        return $this->hasOne(Achat::class);
    }
}
