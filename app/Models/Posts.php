<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function generateSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (self::where('slug', $slug)
            ->when($id, function ($query) use ($id) {
                return $query->where('id', '!=', $id);
            })->exists()
        ) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public static function getPostByUserLogin()
    {
        $user = Auth::user();
        return self::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public static function boot()
    {
        parent::boot();

        self::updating(function ($model) {
            $model->slug = self::generateSlug($model->title, $model->id);
        });
    }
}
