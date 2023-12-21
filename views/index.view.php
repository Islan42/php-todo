<?php
require base_path('views/partials/head.view.php');
require base_path('views/partials/header.view.php');
?>
	<h2 class="text-3xl mb-4">Homepage</h2>
	
	<?php if (! Core\Session::has('user')): ?>
		<p>Seja bem vindo à Homepage.</p>
	<?php else: ?>
		<p>Ben vindo, <?= Core\Session::get('user')['name'] ?>.</p>
		<p>Você pode acessar sua <a href="/todos" class="text-blue-500 hover:underline">lista de A Fazeres</a>.</p>
	<?php endif; ?>
	
	
<?php
require base_path('views/partials/footer.view.php');
?>