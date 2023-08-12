<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='blogs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'subtitle',
        'image',
        'category',
        'content',
    ];
    public function blogComments()
    {
        return $this->hasMany(BlogComment::class,'blog_id','id');
    }
    // Blog.php
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
