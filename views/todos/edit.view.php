<body>
	<h1><?= $todo['name'] ?></h1>
	<form action="/todo/update" method="POST">
		<input type="hidden" name="todoid" value="<?= $todo['id'] ?>">
		<div>
			<textarea name="body" id="body"><?= $todo['body'] ?? '' ?></textarea>
		</div>
		
		<div>
			<button>Salvar</button>
		</div>
	</form>
</body>