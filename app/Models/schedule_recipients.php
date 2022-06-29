<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\schedule_notes;
use App\Models\recipients;
class schedule_recipients extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $guarded=[];

    public function schedule_notes()
    {
        return $this->belongsTo(schedule_notes::class);
    }
    public function recipients()
    {
        return $this->belongsTo(recipients::class);
    }
}
