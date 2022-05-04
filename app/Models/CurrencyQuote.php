<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyQuote extends Model
{
    use HasFactory;

    public $fillable = [
        'value'
    ];

    public function Currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
