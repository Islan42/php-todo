<body>
	<h1>Registre-se</h1>
	<form action="/register" method="POST">
		<div>
			<label for="name">Nome:</label>
			<input type="text" name="name" id="name">
		</div>
		
		<div>
			<label for="email">Email:</label>
			<input type="email" name="email" id="email">
		</div>
		
		<div>
			<label for="password">Senha:</label>
			<input type="password" name="password" id="password">
		</div>
		
		<?php if(count($errors ?? [])):?>
			<div>
				<p><?= $errors['name'] ?? '' ?></p>
				<p><?= $errors['email'] ?? '' ?></p>
				<p><?= $errors['password'] ?? '' ?></p>
			</div>
		<?php endif?>
		
		<div>
			<button>Registrar</button>
		</div>
	</form>
</body>