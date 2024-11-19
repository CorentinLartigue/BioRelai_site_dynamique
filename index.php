<?php 
require 'lib/AutoLoader.php';
session_start()?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>BioRelai</title>
		
		<style type="text/css">
			@import url(styles/bioRelai.css);
		</style>
		
	</head>
	<body>
		<?php
			require_once 'controleurs/controleurPrincipal.php';
		?>
	</body>
</html>