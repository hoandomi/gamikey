<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReplyComment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productComment()
    {
        return $this->belongsTo(ProductComment::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
