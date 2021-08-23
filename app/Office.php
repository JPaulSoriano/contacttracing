<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name'];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
