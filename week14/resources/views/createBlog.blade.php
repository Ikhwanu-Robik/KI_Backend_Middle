<form action="{{ route('blogs.create') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="text" name="title" placeholder="title"/>
	<textarea name="description" placeholder="description"></textarea>
	<input type="file" name"image"/>
	<button type="Submit">Make Blog</button>
</form>
