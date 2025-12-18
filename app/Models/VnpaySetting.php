<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VnpaySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'mode',
        'terminal_id',
        'secret_key',
    ];
}
