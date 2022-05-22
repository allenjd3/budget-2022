<?php

namespace Budget\Models;

use Authentication\Models\User;
use Database\Factories\BudgetMonthFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetMonth extends Model
{
    use HasFactory;

    protected $casts = [
        'month' => 'date',
    ];

    protected $guarded = [];

    public static function newFactory()
    {
        return new BudgetMonthFactory();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(BudgetCategory::class);
    }
}
