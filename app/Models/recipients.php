<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\schedule_recipients;
class recipients extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'recipients';
    protected $guarded=[];

    public function schedule_recipients()
     {
        return $this->hasMany(schedule_recipients::class);
     }
}
