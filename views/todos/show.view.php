<body>
	<h1><?= $todo['name'] ?></h1>
	
	<ul>
		<?php foreach($todo['body'] as $task): ?>
			<li><?= $task ?></li>
		<?php endforeach; ?>
	</ul>
	
	<a href="/todos">Voltar</a>
	
	<form action="/todo/delete" method="POST">
		<input type="hidden" name="todoid" value="<?= $todo['id'] ?>"> <!-- USAR JS PARA ADICIONAR UM CONFIRMADOR ONDE RESIDIRÁ DE VERDADE O FORM -->
		<div>
			<button>Deletar</button>
		</div>
	</form>
	
	<form action="/todo/update" method="GET">
		<input type="hidden" name="todoid" value="<?= $todo['id'] ?>">
		<div>
			<button>Editar</button>
		</div>
	</form>
</body>