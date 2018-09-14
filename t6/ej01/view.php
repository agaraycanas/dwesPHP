
<!DOCTYPE h1 PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>
	<h1>Saludos del d&iacute;a</h1>
	<?php foreach ($modelData as $s): ?>
		<h4><?= $s['saludo'] ?></h4>
	<?php endforeach; ?>
</body>
</html>