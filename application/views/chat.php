<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
	<?php foreach ($users as $u): ?>
			<a href="<?php echo site_url('chat/new_conversation/'.$u['id']); ?>">
				<?php if (strcmp($u['id'], $this->session->userdata('userId')) != 0)
					echo $u['Pseudo'];
				?>
			</a>
		</br>
	<?php endforeach;
	foreach ($conversations as $conv):
		$userId = ''; ?>
		Conversation avec <a href="<?php echo site_url('chat/conversation/'.$conv['id']); ?>">
			<?php 
				if (strcmp($this->session->userdata('userId'), $conv['idUser1']) == 0)
					$userId = $conv['idUser2'];
				else
					$userId = $conv['idUser1'];
				foreach ($users as $u) {
					if (strcmp($u['id'], $userId) == 0) {
						echo $u['Pseudo'];
						break;
					}
				}
			?>
		</a>
		</br>
	<?php endforeach ?>
</body>
</html>