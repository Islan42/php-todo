<?php
require base_path('views/partials/head.view.php');
require base_path('views/partials/header.view.php');
?>

<body>	
	<div class="mx-auto my-4 max-w-lg bg-white p-4 rounded-md">
		<h2 class="text-2xl my-4 text-center font-semibold" >Faça Login</h2>
		
		<form action="/login" method="POST">
			<div class="mb-2">
				<label for="email">Email: </label>
				<input required type="email" name="email" id="email" value="<?= $old['email'] ?? '' ?>" class="block border w-full h-9 mt-2 p-2">
			</div>
			
			<div class="mb-2">
				<label for="password">Senha:</label>
				<input required type="password" name="password" id="password" class="block border w-full h-9 mt-2 p-2">
			</div>
			
			<?php if($errors ?? false):?>
				<div class="container bg-red-100 rounded-sm p-2 mt-2">
					<?php foreach($errors as $error): ?>
						<p class="text-sm text-red-600"><?= $error ?></p>
					<?php endforeach;?>
				</div>
			<?php endif?>
			
			<div>
				<button class="btn w-full h-9 mx-0 my-6 h-9 bg-indigo-400 hover:bg-indigo-500 text-center font-semibold">Login</button>
			</div>
		</form>
	</div>
</body>

<?php
require base_path('views/partials/footer.view.php');
?>