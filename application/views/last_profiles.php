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
				<a href="connexion" class="btn btn--orange">
					Identifie-toi
				</a>
			</div>
		</div>
	</div>
	<div id="wrap">
		<div class="sign-page signup-page">
			<div class="sign-title">
				<h1>Mot de passe oublié ?</h1>
			</div>
			<div>
				<form action="" method="post" class="form">
					<div class="form__row">
						<div class="form__label">
							<label for="mail">Email</label>
						</div>
						<div class="form__field">
							<input type="text" name="mail" class="input-text" />
						</div>
						<?php echo form_error('mail'); ?>
					</div>
		
					
						<input type="submit" class="btn btn--orange btn--lg" value="Recevoir un nouveau mot de passe" />
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
