<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['date_start', 'date_stop'];

    protected $fillable = [
        'name',
        'description',
        'event_image',
        'date_start',
        'date_stop',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getEventImageAttribute($value){

        $word = "lorempixel";
        
        if(strpos($value,$word) !== false){
            return asset($value);}
        // only lorempixel image will display
        else{
            return asset('storage/'.$value);
        } 
    }
}
