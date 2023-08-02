<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Image;
use App\Models\Favori;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notif extends Model
{
    use HasFactory;
    protected $fillable = ["titre","recupe","description","admins_id"];
    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
    public function image()
    {
        return $this->hasOne(Image::class,"notifs_id");
    }
    public function favoris()
    {
        return $this->hasMany(Favori::class);
    }
    public function commentaire()
    {
        return $this->hasMany(Comment::class);
    }
}
