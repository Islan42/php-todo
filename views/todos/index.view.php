<?php
require base_path('views/partials/head.view.php');
require base_path('views/partials/header.view.php');
?>

<body>
	<div class="max-w-3xl mx-auto">
		<h2 class="text-2xl mb-4">Seus A Fazeres</h2>
		
		<div class="my-4">
			<?php foreach ($todos as $todo) : ?>
				<p class="my-1">
					<a href="/todo?id=<?= $todo['id'] ?>" class="text-blue-500 hover:underline"> <?= $todo['name'] ?> </a>
				</p>
			<?php endforeach ; ?>
		</div>
		
		<div >
			<a href="/todos/create" class="btn ml-0">Criar</a>
		</div>
	</div>	
</body>

<?php
require base_path('views/partials/footer.view.php');
?>