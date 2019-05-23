<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySpending extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Spending::class);
    }
}