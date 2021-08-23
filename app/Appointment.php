<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['user_id','transaction_id','proposed_date','proposed_time','appointed_date','appointed_time','status'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->user->last_name}, {$this->user->first_name} {$this->user->middle_name}";
    }

}
