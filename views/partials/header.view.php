		<header>
			<nav class="bg-red-300 px-2 flex items-stretch rounded text-lg font-medium">
				<div class="my-2 h-10  flex-1  flex  space-x-2 ">
					<div class="flex items-center  max-w-fit  hover:text-gray-500 hover:bg-red-900/10">
						<a href="/" class="px-2">Home</a>
					</div>
					<?php if( $_SESSION['user'] ?? false ): ?>
						<div class="flex items-center  hover:text-gray-500 hover:bg-red-900/10">
							<a href="/todos" class="px-2">ToDos</a>
						</div>
					<?php endif; ?>					
				</div>
				
				<div class="my-2  flex  space-x-2">
					<?php if( ! ($_SESSION['user'] ?? false) ): ?>
						<div class="h-full  flex items-center  hover:text-emerald-600 hover:bg-red-900/10">
							<a href="/register" class="mx-1">Registrar</a>
						</div>
						<div class="h-full  flex items-center  hover:text-indigo-500 hover:bg-red-900/10">
							<a href="/login" class="mx-1">Login</a>
						</div>
					<?php else: ?>
						<div class="h-full  px-2  flex items-center  hover:text-red-600 hover:bg-red-900/10">
							<form action="/logout" method="POST">
								<button type="submit" class="">Logout</button>
							</form>
						</div>
					<?php endif; ?>
				</div>
			</nav>
		</header>

		<main class="mt-2 bg-gray-100 p-2 flex-1">
