<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    public $table = 'advices';
    public $fillable = ['spasarkums_id', 'advice', 'image'];

    public function spasarkum(){
        return $this->belongsTo('App\Models\Spasarkum', 'spasarkums_id', 'id');
    }
}
