<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8"> 
	<title>Booda : Peace & Love</title>
	<link rel="stylesheet" href="<?php echo asset_url('style.css'); ?>" type="text/css">
</head>
<body  class="page_homepage plain">
	<div class="header" style="background: url(<?php echo asset_url('img/header-bg.png'); ?>) repeat-x 0 100% #fff;">
		<div class="center">
			<div id="logo">
				<img src="<?php echo asset_url('img/logo.png'); ?>" class="logoimg" width="100" height="29">
			</div>
			<div class="submit-buttons fl_r" id="join">
				<span class="btn-or">
					Déjà membre ?</span>
					<a href="#" class="btn btn--orange">
						Identifie-toi
					</a>
				</div>
			</div>
		</div>
	</body>
</html>


	<form method="post" action="">
		<label for="connexion">Deja inscrit ?</label>
		<input type="submit" name="connexion" value="Connectez-vous !"/>
		</br>

		<label for="pseudo">Pseudo : </label>
		<input type="text" name="pseudo" value="<?php echo set_value('pseudo'); ?>" />
		<?php echo form_error('pseudo'); ?>
		</br>

		<label for="mdp">Mot de passe :</label>
		<input type="password" name="mdp" value="" />
		<?php echo form_error('mdp'); ?>
		</br>

		<label for="name">Nom :</label>
		<input type="text" name="name" value="" />
		</br>

		<label for="firstname">Prenom :</label>
		<input type="text" name="firstname" value="" />
		</br>

		<label for="sex">Sexe :</label>
		<input type="radio" id="rad1" name="sex" value="Male" />
		<label for="rad1">M</label>
		<input type="radio" id="rad2" name="sex" value="Female" />
		<label for="rad2">F</label>
		<?php echo form_error('sex'); ?>
		</br>

		<label for="BD">Date de naissance :</label>
		<input type="date" name="BD" value="" />
		<?php echo form_error('BD'); ?>
		</br>

		<label for="city">Ville :</label>
		<input type="text" name="city" value=""/>
		<?php echo form_error('city'); ?>
		</br>

		<label for="mail">E-mail :</label>
		<input type="text" name="mail" value=""/>
		<?php echo form_error('mail'); ?>
		</br>

		<input type="submit" value="Envoyer" />
	</form>
</body>
</html>