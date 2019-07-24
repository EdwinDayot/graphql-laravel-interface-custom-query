<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class MorphModelA extends Model
{
    protected $guarded = [];

    /**
     * @return MorphOne
     */
    public function object(): MorphOne
    {
        return $this->morphOne(ObjectModel::class, 'morphable');
    }

    /**
     * @return HasMany
     */
    public function statistics(): HasMany
    {
        return $this->hasMany(StatisticA::class);
    }
}
