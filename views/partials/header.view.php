		<header>
			<nav class="bg-red-300 px-2 py-2 flex rounded text-lg font-medium">
				<div class="flex-1 mx-2">
					<a href="/" class="mx-1">Home</a>
					<?php if( $_SESSION['user'] ?? false ): ?>
						<a href="/todos" class="mx-1">ToDos</a>
					<?php endif; ?>					
				</div>
				
				<div class="flex-1 max-w-max mx-2">
					<?php if( ! ($_SESSION['user'] ?? false) ): ?>
						<a href="/register" class="mx-1">Registrar</a>
						<a href="/login" class="mx-1">Login</a>
					<?php else: ?>
						<form action="/logout" method="POST">
							<button type="submit">Logout</button>
						</form>
					<?php endif; ?>
				</div>
			</nav>
		</header>

		<main class="mt-2 bg-gray-100 p-2 flex-1">
