<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Resources\BlogResource;
use App\JSONAPIResponse;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	use JSONAPIResponse;	

	public function index() {
		$blogs = Blog::all();
		return $this->success(BlogResource::collection($blogs));
	}	

    public function store(BlogRequest $request)
    {
	    return "store";
	    $blog_data = $request->validated();

	    $image_path = $request->file('image')->store('blog_images');

	    Blog::create([
		    'user_id' => $request->user()->id,
		    'title' => $blog_data['title'],
		    'slug' => Str::slug($blog_data['title'], '-'),
		    'description' => $blog_data['description'],
		    'image' => $image_path
	    ]);

	    return $this->success(message: 'Successfully created blog');
    }

    public function show(Blog $blog, $slug = null)
    {
	return $this->success(new BlogResource($blog));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
	    //access this method with POST method request with _method=PUT
	    $data = $request->validated();

	    Storage::delete($blog->image);
	    $path = $request->file('image')->store('blog_images');

	    $blog->title = $data['title'];
	    $blog->slug = Str::slug($data['title']);
	    $blog->description = $data['description'];
	    $blog->image = $path;

	    $blog->save();

	    return $this->success(message: "Successfully updated the specified blog");
    }

    public function destroy(Blog $blog)
    {
	    Storage::delete($blog->image);

	    $blog->delete();
	    
	    return $this->success(message: 'Blog successfully deleted');
    }
}
