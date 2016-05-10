<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sienge Utils</title>

	
</head>
<body>

<div id="container">
	<center>
		<h1>Bem vindo</h1>
	</center>
	<div>
		<h4>Database: <?php echo $database; ?></h4>
	</div>
	<div>
		Tabelas vazias: <?php echo 1390 - count($tables); ?> <br>
		Tabelas populadas: <?php echo count($tables) ?> <br>
	</div>
	<div>
		<?php 
			foreach ($tables as $t => $v) {
				if($v > 100)
				echo $t . ' (' . $v . ') <br>';
			}
		 ?>
	</div>
</div>

</body>
</html>