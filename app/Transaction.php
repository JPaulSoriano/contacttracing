<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['name', 'office_id'];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
