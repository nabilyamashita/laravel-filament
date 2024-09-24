<?php

namespace App\Models;

use App\Models\Patient;
use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    use HasFactory;

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    protected $casts = [
        'price' => MoneyCast::class,
    ];


}
