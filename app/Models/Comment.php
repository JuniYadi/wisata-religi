<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'nama',
        'email',
        'website',
        'content',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function profilePicture()
    {
        return 'https://ui-avatars.com/api/?name=' . $this->nama . '&color=7F9CF5&background=EBF4FF';
    }
}
