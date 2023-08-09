<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $table = "product_review";

    protected $fillable=[
        'message',
        'score',
        'user_id',
        'product_id',
    ];
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
