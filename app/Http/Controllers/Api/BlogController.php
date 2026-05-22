<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;

class BlogController extends Controller
{
    private function formatBlog(Blog $blog): array
    {
        return [
            'id'         => $blog->id,
            'slug'       => $blog->slug,
            'title'      => $blog->title,
            'excerpt'    => $blog->excerpt,
            'content'    => $blog->content,
            'image'      => $blog->image_url,
            'author'     => $blog->author,
            'authorRole' => $blog->author_role,
            'date'       => $blog->published_at?->format('F j, Y') ?? $blog->created_at->format('F j, Y'),
            'readTime'   => $blog->read_time,
            'category'   => $blog->category?->name,
            'tags'       => $blog->tags->pluck('name')->toArray(),
            'featured'   => $blog->featured,
        ];
    }

    public function index()
    {
        $blogs      = Blog::active()->with(['category', 'tags'])->get()->map(fn($b) => $this->formatBlog($b));
        $categories = BlogCategory::active()->withCount(['blogs' => fn($q) => $q->where('is_active', true)])->get()->map(fn($c) => [
            'id'    => $c->id,
            'name'  => $c->name,
            'slug'  => $c->slug,
            'count' => $c->blogs_count,
        ]);
        $tags = BlogTag::active()->has('blogs')->orderBy('name')->pluck('name');

        return response()->json([
            'success' => true,
            'data'    => compact('blogs', 'categories', 'tags'),
        ]);
    }

    public function show(string $slug)
    {
        $blog = Blog::active()->with(['category', 'tags'])->where('slug', $slug)->firstOrFail();
        $recent = Blog::active()->with(['category'])
            ->where('id', '!=', $blog->id)
            ->orderByDesc('published_at')
            ->limit(3)
            ->get()
            ->map(fn($b) => [
                'id'    => $b->id,
                'slug'  => $b->slug,
                'title' => $b->title,
                'image' => $b->image_url,
                'date'  => $b->published_at?->format('F j, Y') ?? $b->created_at->format('F j, Y'),
            ]);

        return response()->json([
            'success' => true,
            'data'    => ['blog' => $this->formatBlog($blog), 'recentBlogs' => $recent],
        ]);
    }

    public function byCategory(string $slug)
    {
        $category = BlogCategory::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $blogs    = Blog::active()->with(['category', 'tags'])->where('blog_category_id', $category->id)->get()->map(fn($b) => $this->formatBlog($b));

        return response()->json([
            'success' => true,
            'data'    => ['category' => ['id' => $category->id, 'name' => $category->name, 'slug' => $category->slug], 'blogs' => $blogs],
        ]);
    }

    public function byTag(string $slug)
    {
        $tag   = BlogTag::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $blogs = Blog::active()->with(['category', 'tags'])->whereHas('tags', fn($q) => $q->where('slug', $slug))->get()->map(fn($b) => $this->formatBlog($b));

        return response()->json([
            'success' => true,
            'data'    => ['tag' => $tag->name, 'blogs' => $blogs],
        ]);
    }

    public function slugs()
    {
        $blogSlugs     = Blog::active()->pluck('slug');
        $categorySlugs = BlogCategory::active()->pluck('slug');
        $tagSlugs      = BlogTag::active()->has('blogs')->pluck('slug');

        return response()->json([
            'success' => true,
            'data'    => compact('blogSlugs', 'categorySlugs', 'tagSlugs'),
        ]);
    }
}
