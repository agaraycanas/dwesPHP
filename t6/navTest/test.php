<!-- En HTML5 no hay DTD asociado -->
<!DOCTYPE html >

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="test.css">
</head>
<body>
	<nav>
	<ul id="navigation">
		<li><a href="">Buscadores</a>
			<ul>
				<li><a href="http://www.google.com">Gúguel</a></li>
				<li><a href="http://www.bing.com">Binj</a></li>
				<li><a href="">Otros >></a>
					<ul>
						<li><a href="http://www.chungo.com">Chungo</a></li>
						<li><a href="http://www.bing.com">Cutre</a></li>
					</ul>
				</li>
			</ul>
		</li>
		
		<li><a href="">Diccionarios</a>
			<ul>
				<li><a href="http://www.rae.es">La RAE</a></li>
				<li><a href="http://translate.google.com">Trasleit de gúguel</a></li>
			</ul></li>
	</ul>
<?= isset($d)?3:2 ?>
	</nav>
</body>
</html>