<!DOCTYPE html>
<html lang="en">

<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  	<script>
  		setInterval("get_messages();", 10000);
  		function get_messages() {
  			$('#content').load(location.href + ' #mes');
  		}
  	</script>
</head>

<body>
	<div id="content" height="250" overflow="auto">
		<div id="mes">
			<?php foreach ($messages as $message):
				echo ($message['idUser'] . ' : ' . $message['message']); ?>
			</br>
			<?php endforeach ?>
		</div>
	</div>
	<form method="post" action="">
		<textarea name="message" rows="4" cols="40">
		</textarea>
		<input type="submit" value="Envoyer" />
	</form>
</body>
</html>