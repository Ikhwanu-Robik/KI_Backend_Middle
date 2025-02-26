<form action="{{ route('api.login') }}" method="POST">
	@csrf
	<input type="email" name="email" placeholder="email"/>
	<input type="password" name="password" placeholder="password"/>
	<button type="submit">Log In</button>
</form>
