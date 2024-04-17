<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    protected $fillable = ["video_id", "video_name", "video_html_code", "video_views", "user_id"];
    public function user(){
        return $this->belongsTo("App\Models\User");
    }
}
