<body>
	<h1>Criar ToDo</h1>
	<form action="/todos" method="POST">
		<div>
			<label for="name">Nome dos A Fazeres:</label>
			<input type="text" name="name" id="name" value="<?= $old['name'] ?? '' ?>">
		</div>
		
		<?php if($errors ?? false): ?>
			<div>
				<p><?= $errors['name'] ?? '' ?></p>
			</div>
		<?php endif; ?>
		
		<div>
			<button>Adicionar</button>
		</div>
	</form>
	<a href="/todos">Voltar</a>
</body>