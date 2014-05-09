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
	<div id="wrap">
		<div class="sign-page signup-page">
			<div class="sign-title">
				<h1>Inscrit toi sur Booda</h1>
			</div>
			<div>
				<form action="" method="post" class="form">
					<div class="form__row">
						<div class="form__label">
							<label for="pseudo">Pseudo</label>
						</div>
						<div class="form__field">
							<input type="text" name="pseudo" class="input-text" value="<?php echo set_value('pseudo'); ?>" />
						</div>
						<?php echo form_error('pseudo'); ?>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="mdp">Mot de passe</label>
						</div>
						<div class="form__field">
							<input type="password" class="input-password" name="mdp" value="" />
						</div>
						<?php echo form_error('mdp'); ?>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="name">Nom</label>
						</div>
						<div class="form__field">
							<input type="text" class="input-text" name="name" value="" />
						</div>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="firstname">Prenom</label>
						</div>
						<div class="form__field">
							<input type="text" class="input-text" name="firstname" value="" />
						</div>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="BD">Date de naissance</label>
						</div>
						<div class="form__field">
							<input type="date" class="input-text" name="BD" value="" />
						</div>
						<?php echo form_error('BD'); ?>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="city">Ville</label>
						</div>
						<div class="form__field">
							<input type="text" class="input-text" name="city" value=""/>
						</div>
						<?php echo form_error('city'); ?>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="sex">Sexe</label>
						</div>
						<div class="form__field" style="padding: 12px 10px;">
								<label for="rad1">Homme</label>
								<input type="radio" id="rad1" name="sex" value="Male" />
								<label for="rad2">Femme</label>
								<input type="radio" id="rad2" name="sex" value="Female" />
						</div>
						<?php echo form_error('sex'); ?>
					</div>
		
					
						<input type="submit" class="btn btn--orange btn--lg" value="Envoyer" />
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
