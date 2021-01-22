<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public static function add($email)
    {
        $sub = new static;
        $sub->email=$email;
        $sub->save();

        return $sub;
    }
    
    public function generateToken()
    {        
        $this->token=Str::random(100);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }
}
