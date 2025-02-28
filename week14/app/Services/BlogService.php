<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogService
{
    /**
     * Create a new class instance.
     */
    public function __construct(Request $request)
    {
	    $this->request = $request;
    }

    public function getBlogs() {
	    $blogs = Blog::all();
	    return $blogs;
    }

    public function create($blog_data) {
	    $image_path = $this->request->file('image')->store('blog_images');

	    Blog::create([
		    'user_id' => $this->request->user()->id,
		    'title' => $blog_data['title'],
		    'slug' => Str::slug($blog_data['title'], '-'),
		    'description' => $blog_data['description'],
		    'image' => $image_path
	    ]);
    }

    public function show($blog) {
	    return $blog;
    }

    public function update($blog_data, $blog) {
	    Storage::delete($blog->image);
	    $image_path = $this->request->file('image')->store('blog_images');

	    $blog->title = $blog_data['title'];
	    $blog->slug = Str::slug($blog_data['title']);
	    $blog->description = $blog_data['description'];
	    $blog->image = $image_path;

	    $blog->save();
    }

    public function delete($blog) {
	    Storage::delete($blog->image);

	    $blog->delete();
    }
}
