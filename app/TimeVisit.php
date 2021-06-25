<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeVisit extends Model
{
    public function tracing()
    {
        return $this->belongsTo(Tracing::class);
    }
}
