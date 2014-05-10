<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
	<div height="250" overflow="auto">
		<?php foreach ($messages as $message):
			echo ($message['idUser'] . ' : ' . $message['message']); ?>
		</br>
		<?php endforeach ?>
	</div>
	<form method="post" action="">
		<textarea name="message" rows="4" cols="40">
		</textarea>
		<input type="submit" value="Envoyer" />
	</form>
</body>
</html>