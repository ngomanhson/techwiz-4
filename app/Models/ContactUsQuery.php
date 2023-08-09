<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsQuery extends Model
{
    use HasFactory;
    protected $table ='contactusquery';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'message',
    ];
}
