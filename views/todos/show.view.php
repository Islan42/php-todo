<body>
	<h1><?= $todo['name'] ?></h1>
	
	<ul>
		<?php foreach($todo['body'] as $task): ?>
			<li><?= $task ?></li>
		<?php endforeach; ?>
	</ul>
</body>