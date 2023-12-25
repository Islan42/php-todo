
	<div class="mx-auto my-4 max-w-lg bg-white p-4 rounded-md">
		<h2 class="text-2xl my-4 font-semibold text-center">Registre-se</h2>
		
		<form action="/register" method="POST">
			<div class="my-2">
				<label for="name">Nome:</label>
				<input required type="text" name="name" id="name" value="<?= $old['name'] ?? '' ?>" class="block border w-full h-9 mt-2 p-2">
			</div>
			
			<div class="my-2">
				<label for="email">Email:</label>
				<input required type="email" name="email" id="email" value="<?= $old['email'] ?? '' ?>" class="block border w-full h-9 mt-2 p-2">
			</div>
			
			<div class="my-2">
				<label for="password">Senha:</label>
				<input required type="password" name="password" id="password" class="block border w-full h-9 mt-2 p-2">
			</div>
			
			<?php if(count($errors ?? [])):?>
				<div class="container bg-red-100 rounded-sm p-2 mt-2">
					<?php foreach($errors as $error): ?>
						<p class="text-sm text-red-600"><?= $error ?></p>
					<?php endforeach;?>
				</div>
			<?php endif?>
			
			<div>
				<button class="btn mx-0 my-4 w-full h-9 font-semibold bg-emerald-400 hover:bg-emerald-500">Registrar</button>
			</div>
		</form>
	</div>
