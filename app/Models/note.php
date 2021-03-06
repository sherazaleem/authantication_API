<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class note extends Model
{
    use HasFactory, SoftDeletes;
      protected $guarded = [];
      protected $primaryKey = 'id';
      protected $fillable  = ['user_id','title','description','voice_note','video_note','is_text_note','is_voice_note','is_video_note','status'];

    public function recipients()
    {
        return $this->hasMany(recipients::class);
    }
}
