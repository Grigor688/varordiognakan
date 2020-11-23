<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spasarkum extends Model
{
    const STATUS_YES = 1;
    const STATUS_NO = 0;


    public function getStatus($id){
        $statuses = [
          self::STATUS_NO => 'Ոչ',
          self::STATUS_YES => 'Այո'
        ];

        return !empty($statuses[$id]) ? $statuses[$id] : null;
    }
}
