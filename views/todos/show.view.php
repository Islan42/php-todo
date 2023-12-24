
	<div class="max-w-3xl mx-auto relative">
		<h2 class="text-2xl mb-4 text-center"><?= $todo['name'] ?></h2>
		
		<div id="app" >
			<?= $todo['body'] ?>
		</div>
		
		<div class="flex items-stretch mt-4">
			<div class="">
				<a href="/todos" class="btn ml-0 inline-block">Voltar</a>
			</div>
			
			<div>
				<form action="/todo/delete" method="POST" id="form-delete-todo">
					<input type="hidden" name="todoid" value="<?= $todo['id'] ?>"> <!-- USAR JS PARA ADICIONAR UM CONFIRMADOR ONDE RESIDIRÁ DE VERDADE O FORM -->
					<div>
						<button class="btn" id="btn-delete-todo" type="button">Deletar</button>
					</div>
				</form>
			</div>
			
			<div>
				<form action="/todo/update" method="POST">
					<input type="hidden" name="todoid" value="<?= $todo['id'] ?>">
					<textarea name="body" id="saveInput" hidden><?= $todo['body'] ?></textarea>
					<div>
						<button class="btn">Salvar</button>
					</div>
				</form>
			</div>
		</div>
		
		<div id="aviso-root"></div>
	</div>
	<script  src="/static/show.js" type="module" defer ></script>
	<script src="/static/show-delete.js" type="module" defer></script>
