<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracing extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'age',
        'email',
        'phone',
        'street',
        'city',
        'province',
        'purpose',
        'course',
        'stud_type',
        'est_date'
    ];

    public function timevisit()
    {
        return $this->hasMany(TimeVisit::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} {$this->middle_name}";
    }

    public function getFullAddressAttribute()
    {
        return "{$this->street}, {$this->city} {$this->province}";
    }

    public function setPurposeAttribute($value)
    {
        $this->attributes['purpose'] = json_encode($value);
    }

    public function getPurposeAttribute($value)
    {
        return $this->attributes['purpose'] = json_decode($value);
    }

}
