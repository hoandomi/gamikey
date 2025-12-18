<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image",
        "category_id",
        "short_description",
        "long_description",
        "price",
        "status",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function productVariantItems()
    {
        return $this->hasMany(ProductVariantItem::class);
    }

    public function productAccountStore()
    {
        return $this->hasMany(ProductAccountStore::class);
    }

    public function productComments()
    {
        return $this->hasMany(ProductComment::class);
    }

    public function productReplyComments()
    {
        return $this->hasMany(ProductReplyComment::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
