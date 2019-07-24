<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ObjectModel extends Model
{
    protected $guarded = [];

    /**
     * @return MorphTo
     */
    public function morphable(): MorphTo
    {
        return $this->morphTo('morphable');
    }
}
