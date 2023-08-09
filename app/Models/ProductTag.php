<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='product_tag';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class,'tag_id','id');
    }
}
