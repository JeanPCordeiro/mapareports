<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siteline extends Model
{
    use HasFactory;
    protected $fillable = [
        'domain','site', 'line', 'rate',
    ];
}
