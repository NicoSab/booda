
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
				<a href="<?php echo site_url('profil/'.$this->session->userdata('userId')); ?>" class="btn btn--orange">
					Mon profil
				</a>
				<a href="<?php echo site_url('auth/logout'); ?>" class="btn btn--orange">
					Déconnexion
				</a>
			</span>
			</div>
		</div>
		<div class="menu fl_r">
			<a href=<?php echo site_url('dating'); ?> class="dating">
				<img src="<?php echo asset_url('img/persons.png'); ?>"/>
				&nbsp;&nbsp;Personnes
			</a>
			<a href=<?php echo site_url('dating'); ?> class="dating">
				<img src="<?php echo asset_url('img/messages.png'); ?>"/>
				&nbsp;&nbsp;Tchat
			</a>
		</div>
	</div>
	<div id="wrap">
		<div class="sign-page signup-page">
			<div class="sign-title">
				<h1>Mettez à jour votre profil</h1>
			</div>
			<div>
				<form method="post" class="form form-not-before" action="">
					<div class="form__row">
						<div class="form__label">
							<label for="hobbies">Hobbies</label>
						</div>
						<div class="form__field">
							<textarea class="textarea" name="hobbies" rows="4" cols="50"><?php if (isset($Hobbies)) echo $Hobbies; ?></textarea>
						</div>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="job">Travail</label>
						</div>
						<div class="form__field">
							<input type="text" class="input-text"  name="job" value="<?php if (isset($Job)) echo $Job; ?>"/>
						</div>	
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="description">Description</label>
						</div>
						<div class="form__field">
							<textarea class="textarea" name="description" rows="4" cols="50"><?php if (isset($Description)) echo $Description; ?></textarea>
						</div>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="interest">Intéressé par</label>
						</div>
						<div class="form__field" style="padding: 12px 10px;">
							<input type="radio" id="rad1" name="interest" value="Hommes" <?php if (isset($Interest) && $Interest == 'Hommes') echo 'checked=checked'; ?>/>
							<label for="rad1">Hommes</label>
							<input type="radio" id="rad2" name="interest" value="Femmes" <?php if (isset($Interest) && $Interest == 'Femmes') echo 'checked=checked'; ?>/>
							<label for="rad2">Femmes</label>
							<input type="radio" id="rad3" name="interest" value="Les 2" <?php if (isset($Interest) && $Interest == 'Les 2') echo 'checked=checked'; ?>/>
							<label for="rad3">Les deux</label>
						</div>
					</div>
						
					<div class="form__row">
						<div class="form__label">
							<label for="situation">Situation</label>
						</div>
						<div class="form__field" style="padding: 12px 10px;">
							<input type="radio" id="rad4" name="situation" value="En couple" <?php if (isset($MaritalSituation) && $MaritalSituation == 'En couple') echo 'checked=checked'; ?> />
							<label for="rad4">En couple</label>
							<input type="radio" id="rad5" name="situation" value="Célibataire" <?php if (isset($MaritalSituation) && $MaritalSituation == 'Célibataire') echo 'checked=checked'; ?> />
							<label for="rad5">Célibataire</label>
						</div>
					</div>

					<div class="form__row">
						<div class="form__label">
							<label for="sexuality">Sexualité</label>
						</div>
						<div class="form__field" style="padding: 12px 10px;">
							<input type="radio" id="rad6" name="sexuality" value="Hétérosexuel" <?php if (isset($Sexuality) && $Sexuality == 'Hétérosexuel') echo 'checked=checked'; ?> />
							<label for="rad6">Hétérosexuel</label>
							<input type="radio" id="rad7" name="sexuality" value="Homosexuel" <?php if (isset($Sexuality) && $Sexuality == 'Homosexuel') echo 'checked=checked'; ?>/>
							<label for="rad7">Homosexuel</label>
							<input type="radio" id="rad8" name="sexuality" value="Bisexuel" <?php if (isset($Sexuality) && $Sexuality == 'Bisexuel') echo 'checked=checked'; ?>/>
							<label for="rad8">Bisexuel</label>
						</div>
					</div>

					<input type="submit" class="btn btn--orange btn--lg" value="Mettre à jour" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>