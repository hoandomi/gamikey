<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAccountStore extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'username',
        'password',
        'code',
        'used',
        'created_at',
        'updated_at',
        'used_by_email',
        'used_by_user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'used_by_user_id');
    }

}
