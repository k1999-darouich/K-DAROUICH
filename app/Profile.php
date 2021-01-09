<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        return ($this->image)? '/storage/' . $this->image : '/storage/profile/fvYFwWk4zc6d0T6GbW5CfvIUur9c5Js4CiIC25RK.png';
    }

//    public function followers(){
//        return $this->belongsToMany(User::class);
//    }
public function profession()
{
    return $this->belongsTo(Profession::class);
}
    public function user()
        {
            return $this->belongsTo(User::class);
        }
}

