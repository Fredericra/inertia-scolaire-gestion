<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Notif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favori extends Model
{
    use HasFactory;
    protected $fillable = ["suivre","admin_id","notif_id","pagepub_id"];
    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
    public function notifs()
    {
        return $this->belongsTo(Notif::class);
    }
}
