<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ["logo","facebook","instagram","linkedin","contactImg","projetsImg","localisation","phone","email","adresse"];
}
