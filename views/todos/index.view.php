<body>
	<h1>All you have ToDo</h1>

	<ul>
		<?php foreach ($todos as $todo) : ?>
			<li><a href="/todo?id=<?= $todo['id'] ?>"> <?= $todo['name'] ?> </a></li>
		<?php endforeach ; ?>
	</ul>
	
	<a href="/todos/create">Criar</a>
	
</body>


<!--
	<ul>
		<?php foreach (json_decode($todos[0]['body']) as $todo) : ?>
			<li><?= $todo ?></li>
		<?php endforeach ; ?>
	</ul>
-->
	