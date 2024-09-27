<?php

namespace App\Models;

use App\Models\Treatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = ['name', 'email', 'password'];

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }
}
