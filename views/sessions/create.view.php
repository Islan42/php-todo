<body>
	<h1>Faça Login</h1>
	<form action="/login" method="POST">
		<div>
			<label for="email">Email: </label>
			<input type="text" name="email" id="email" value="<?= $old['email'] ?? '' ?>">
		</div>
		
		<div>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
		</div>
		
		<?php if(count($errors ?? [])):?>
			<div>
				<p><?= $errors['email'] ?? '' ?></p>
				<p><?= $errors['password'] ?? '' ?></p>
				<p><?= $errors['auth'] ?? '' ?></p>
			</div>
		<?php endif?>
		<div>
			<button>Login</button>
		</div>
		
	</form>
</body>