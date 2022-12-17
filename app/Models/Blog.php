<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    
    use HasFactory;
    use SoftDeletes;

protected $table = "blogs";


protected $fillable = [
    'title',
    'body',
    'user_id',
    
];

   function getPaginateByLimit(int $limit_count = 5)
{
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
public function user()
{
    return $this->belongsTo(Blog::class);
}
}

