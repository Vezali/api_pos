<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
       protected $fillable = ['name','description','age', 'users_id'];

       
    public function users() {
        return $this->belongsTo(User::class);
    }
}
