<body>
	<h1>Homepage</h1>
	<?php if (! Core\Session::has('user')): ?>
		<p>Welcome to the Homepage.</p>
	<?php else: ?>
		<p>Hello there, <?= Core\Session::get('user')['name'] ?>.</p>
	<?php endif; ?>

	<p><a href="/todos">Todos</a></p>
	
	<?php if (! Core\Session::has('user')): ?>
		<p><a href="/register">Register</a></p>
		<p><a href="/login">Login</a></p>
	<?php else: ?>
		<form action="/logout" method="POST">
			<button>Logout</button>
		</form>
	<?php endif; ?>
</body>