<form action="{{ route('api.signup') }}" method="POST">
	@csrf
	<input type="text" name="name" placeholder="name"/>
	<input type="email" name="email" placeholder="email"/>
	<input type="password" name="password" placeholder="password"/>
	<button type="submit">Sign Up</button>
</form>
