<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Posts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'status',
        'thumbnail',
        'user_id',
        'views'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getPostByUserLogin()
    {
        $user = Auth::user();
        return self::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
    }
}
