
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
		<div class="profile-page">
			<div>
				<h1>Votre profil</h1>
			</div>
			<label> Hobbies</label>
			<span>
			<?php if (isset($Hobbies)) echo $Hobbies; ?></span>
			</br>

			<label> Intéressé par</label>
			<span><?php if (isset($Interest)) echo $Interest; ?></span>
			</br>

			<label>Situation</label>
			<span><?php if (isset($MaritalSituation)) echo $MaritalSituation; ?></span>
			</br>

			<label>Sexualité</label>
			<span><?php if (isset($Sexuality)) echo $Sexuality; ?></span>
			</br>

			<label>Travail</label>
			<span><?php if (isset($Job)) echo $Job; ?></span>
			</br>

			<label>Description</label>
			<span><?php if (isset($Description)) echo $Description; ?></span>
			</br>
				<a href="<?php echo site_url('profil/update'); ?>" class="btn btn--orange btn--lg">Le mettre à jour</a>

		</div>
		</div>
	</div>
</body>
</html>