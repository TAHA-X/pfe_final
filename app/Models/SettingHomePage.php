<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingHomePage extends Model
{
    use HasFactory;
    public $fillable = ["img1","img2","img3","video"];
}
