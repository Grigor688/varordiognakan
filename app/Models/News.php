<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $table = 'newss';
    public $fillable = ['spasarkums_id', 'newses', 'image'];

    public function spasarkum(){
        return $this->belongsTo('App\Models\Spasarkum', 'spasarkums_id', 'id');
    }
}
