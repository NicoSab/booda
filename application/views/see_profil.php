<!DOCTYPE html>
<html lang="en">

<head></head>

<body>

	<label> Hobbies :</label>
	<?php echo $Hobbies; ?>
	</br>

	<label> Interesse par :</label>
	<?php echo $Interest; ?>
	</br>

	<label>Situation :</label>
	<?php echo $MaritalSituation; ?>
	</br>

	<label>Sexualite :</label>
	<?php echo $Sexuality; ?>
	</br>

	<label>Job :</label>
	<?php echo $Job; ?>
	</br>

	<label>Description :</label>
	<?php echo $Description; ?>
	</br>

	<a href="<?php echo site_url('profil/update_profil'); ?>">
		Modifier profil</a>
</body>
</html>