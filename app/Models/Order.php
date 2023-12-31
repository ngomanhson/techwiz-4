<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'company_name',
        'country',
        'street_address',
        'town_city',
        'postcode_zip',
        'phone',
        'message',
        'email',
        'total',
        'order_code',
        'payment_method',
        'shipping_method',
        "status",
        "is_paid",
    ];
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
