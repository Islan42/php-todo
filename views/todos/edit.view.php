<?php
require base_path('views/partials/head.view.php');
require base_path('views/partials/header.view.php');
?>

<body>
	<div class="max-w-3xl mx-auto">
		<h2 class="text-2xl text-center mb-2"><?= $todo['name'] ?></h2>
	
		<form action="/todo/update" method="POST">
			<input type="hidden" name="todoid" value="<?= $todo['id'] ?>">
			<div>
				<textarea name="body" id="body"><?= $todo['body'] ?? '' ?></textarea>
			</div>
			
			<div>
				<button class="btn ml-0 mt-2">Salvar</button>
			</div>
		</form>
	</div>
</body>

<?php
require base_path('views/partials/footer.view.php');
?>