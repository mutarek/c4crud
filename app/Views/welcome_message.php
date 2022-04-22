<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
<div>
	<?= form_open_multipart();?>

	<div>
		<input type="file" name="image">
		<br>
		<input type="submit">
	</div>

	<?= form_close();?>

	<?php if(isset($errors)):?>
		<span><?= $errors->listErrors(); ?></span>
		<?php endif; ?>
</div>


</body>
</html>