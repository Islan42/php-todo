
	<div class="max-w-3xl mx-auto">
		<h2 class="text-2xl mb-4 text-center"><?= $todo['name'] ?></h2>
		
		<div id="app" >
			<?= $todo['body'] ?>
		</div>
		
		<div class="flex items-stretch mt-4">
			<div class="">
				<a href="/todos" class="btn ml-0 inline-block">Voltar</a>
			</div>
			
			<div>
				<form action="/todo/delete" method="POST">
					<input type="hidden" name="todoid" value="<?= $todo['id'] ?>"> <!-- USAR JS PARA ADICIONAR UM CONFIRMADOR ONDE RESIDIRÁ DE VERDADE O FORM -->
					<div>
						<button class="btn">Deletar</button>
					</div>
				</form>
			</div>
			
			<div>
				<form action="/todo/update" method="GET">
					<input type="hidden" name="todoid" value="<?= $todo['id'] ?>">
					<div>
						<button class="btn">Editar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script  src="/static/show.js" type="module" defer ></script>
