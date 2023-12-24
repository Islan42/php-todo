
	<div class="max-w-3xl mx-auto">
		<h2 class="text-2xl mb-2 px-1">Criar ToDo</h2>
		
		<form action="/todos" method="POST" id="createForm">
			<div class="flex items-stretch">
				<div class="self-center">
					<label for="name" class="px-1">Nome dos A Fazeres:</label>
				</div>
				
				<div class="mx-2 flex-1">
					<input type="text" name="name" id="name" value="<?= $old['name'] ?? '' ?>" class="w-full h-9 border p-2">
				</div>
				
				<div>
					<button class="btn mx-0 h-full">Adicionar</button>
				</div>
			</div>
			
			<?php if($errors ?? false): ?>
				<div class="container bg-red-100 rounded-sm p-2 mt-2">
					<ul>
						<li class="text-red-600 text-sm"><?= $errors['name'] ?? '' ?></li>
					</ul>
				</div>
			<?php endif; ?>
		</form>
		
		<div class="mt-2">
			<a href="/todos" class="btn ml-0 max-w-max">Voltar</a>
		</div>
	</div>
