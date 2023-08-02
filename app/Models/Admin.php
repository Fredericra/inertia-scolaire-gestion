<?php

namespace App\Models;

use App\Models\Notif;
use App\Models\Favori;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as Authorisation;

class Admin extends Model implements Authorisation
{
    use HasFactory,Authenticatable;
    protected $fillable = ["pseudo","email","verify","password"];
    public function notifs()
    {
        return $this->hasMany(Notif::class);
    }
    public function favoris()
    {
        return $this->hasMany(Favori::class);
    }
}
