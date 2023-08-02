<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpianatra extends Model
{
    use HasFactory;
    protected $filliable = ["nom","prenom","email","matricule","description","img","niveau","filiere","admin_id","note_id"];
}
