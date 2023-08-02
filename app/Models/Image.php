<?php

namespace App\Models;

use App\Models\Notif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ["image","image_page","notifs_id","url","pagepub_id"];
    public function notifs()
    {
        return $this->belongsTo(Notif::class);
    }
}
