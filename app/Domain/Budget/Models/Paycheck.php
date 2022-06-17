<?php

namespace Budget\Models;

use Database\Factories\PaycheckFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paycheck extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'payday' => 'datetime',
    ];

    protected static function newFactory(): PaycheckFactory
    {
        return new PaycheckFactory();
    }
}
