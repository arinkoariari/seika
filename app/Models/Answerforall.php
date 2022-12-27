<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answerforall extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'title',
    'body',
];

    public function getPaginateByLimit(int $limit_count = 2)
{
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
public function questall()
{
    return $this->belongsTo(Questall::class);
}
}
