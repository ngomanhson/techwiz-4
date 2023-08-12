<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='products';
    protected $primaryKey = 'id';
    protected $guarded = [];



    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }

    // Trong mô hình Product
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function calculateAverageRating()
    {
        $totalScore = $this->reviews()->sum('score');
        $totalReviews = $this->reviews()->count();

        if ($totalReviews > 0) {
            return $totalScore / $totalReviews;
        }

        return 0;
    }


}
