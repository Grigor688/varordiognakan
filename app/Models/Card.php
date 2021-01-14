<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable=[
        'status'
    ];

    public function getTest(){
        $day = $this->dateDiffInDays(date("Y-m-d"), $this->end_of_term);
        if($day <0){
            $color = 'white';
        }elseif ($day <= 3){
            $color = 'red';
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
