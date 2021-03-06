<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyModel extends Model
{
    protected $fillable=[
        'name',
        'status'

];

    public function getTest(){
        $day = $this->dateDiffInDays(date("Y-m-d"), $this->end_of_term);
        if($day <0){
            $color = '#ff000078';
        }elseif ($day <= 3){
            $color = '#ff000078';
        }elseif ($day <= 10){
            $color = 'yellow';
        }else{
            $color = 'white';
        }
        return $color;
    }

    private  function dateDiffInDays($date1, $date2)
    {
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return (round($diff / 86400));
    }
}
