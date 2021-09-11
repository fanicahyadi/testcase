<?php

namespace App;

use App\Room;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }    

   
}
