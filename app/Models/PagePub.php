<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Abonne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PagePub extends Model
{
    use HasFactory;
    protected $fillable = ["titre","description","page_id","admin_id"];
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function abonne()
    {
        return $this->hasOne(Abonne::class);
    }
}
