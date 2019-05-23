<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    protected $guarded = [];

    public function Category()
    {
        return $this->belongsTo(CategorySpending::class);
    }
}