<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
	<?php foreach ($users as $u): ?>
			<a href="<?php echo site_url('chat/new_conversation/'.$u['id']); ?>">
				<?php echo $u['Pseudo'];?>
			</a>
		</br>
	<?php endforeach;
	foreach ($conversations as $conv): ?>
			Conversation avec <a href="<?php echo site_url('chat/conversation/'.$conv['id']); ?>">
				<?php echo $conv['idUser2']; ?>
			</a>
		</br>
	<?php endforeach ?>
</body>
</html>