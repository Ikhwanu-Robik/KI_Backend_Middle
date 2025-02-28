<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Resources\BlogResource;
use App\JSONAPIResponse;
use App\Http\Requests\BlogRequest;
use App\Services\BlogService;

class BlogController extends Controller
{
	use JSONAPIResponse;	

	public function index(BlogService $services) {
		$blogs = $services->getBlogs();
		return $this->success(BlogResource::collection($blogs));
	}	

    public function store(BlogRequest $request, BlogService $services)
    {
	    $services->create($request->validated());

	    return $this->success(message: 'Successfully created blog');
    }

    public function show(Blog $blog, BlogService $services, $slug = null)
    {
	    $blog = $services->show($blog);
	return $this->success(new BlogResource($blog));
    }

    public function update(BlogRequest $request, Blog $blog, BlogService $services)
    {
	    //access this method with POST method request with _method=PUT
	    $services->update($request->validated(), $blog);

	    return $this->success(message: "Successfully updated the specified blog");
    }

    public function destroy(Blog $blog, BlogService $services)
    {
	    $services->delete($blog);

	    return $this->success(message: 'Blog successfully deleted');
    }
}
