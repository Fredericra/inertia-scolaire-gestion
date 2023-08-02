<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Notif;
use App\Models\PagePub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ["commentaire","page_pub_id","notif_id","admin_id","favori","commentaire_page"];
    public function notif()
    {
        return $this->belongsTo(Notif::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function pagepub()
    {
        return $this->belongsTo(PagePub::class);
    }
}
