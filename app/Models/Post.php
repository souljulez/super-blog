<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    public static array $categories = ['lifestyle', 'tech', 'sports', 'pop_culture', 'politics'];

    public $fillable = ['title', 'slug', 'author', 'updated', 'category', 'content'];

    protected static function booted()
    {
        static::creating(function ($post){
            $post->slug = static::createUniqueSlug($post->title);
        });
    }

    public static function createUniqueSlug(string $title)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function scopeLatest()
    // {
    //     $posts = Post::latest()->take(3)->get();

    //     return $posts;
    // }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters )
    {
        return $query->when($filters['category'] ?? null, function($query, $category){
            $query->where('category', $category)->orderBy('updated_at', 'desc');
        });
    }

    public function truncate(string $text)
    {
        $excerpt = Str::limit($text, 100);

        return $excerpt;
    }

    public static function getPostsCount()
    {
        $postCategoryCount = Post::query()
                                    ->whereNotNull('category')
                                    ->pluck('category')
                                    ->flatten()
                                    ->countBy();
        $postsCount = [
            $postCategoryCount,
            Post::all()->count()
        ];

        return $postsCount;
    }
}
