<?php

namespace App;
use App\Item;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    public function item()
    {
        return $this->hasMany(Item::class);
    }  
   
}
