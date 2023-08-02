<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Abonne;
use App\Models\PagePub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ["admin_id","nom","description","slog","type"];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function pub()
    {
        return $this->hasMany(PagePub::class);
    }
    public function suivre()
    {
        return $this->hasMany(Abonne::class);
    }

}
