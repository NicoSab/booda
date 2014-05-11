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
			<a href=<?php echo site_url('chat'); ?> class="dating">
				<img src="<?php echo asset_url('img/messages.png'); ?>"/>
				&nbsp;&nbsp;Tchat
			</a>
		</div>
	</div>
	<div id="wrap">
		<div class="sign-page signup-page">
			<div class="sign-title">
				<h1 style="float: left; line-height: 44px;">Derniers bouddhistes inscrits</h1>
				<a href="<?php echo site_url('dating/search'); ?>" class="btn btn--orange" style="float:left; margin-left: 15px;">
					Approfondir votre recherche
				</a>
				<?php if ($this->session->userdata("searchExists")) { ?>
				<a href="<?php echo site_url('dating/results'); ?>" class="btn btn--green" style="float:left; margin-left: 15px;">
					Voir votre dernière recherche
				</a>
				<?php } ?>
			</div>
			<div style="float:left;">
				<p><?php echo $links; ?></p>
				<div class="search-wrap">
					<div id="search">
						<div class="search">
							<?php
							foreach($results as $data) {?>
							<div class="user-card">
								<div class="user-card__photo">
									<div class="user-photo">
										<img src="<?php if (isset($data->profilepic)) { echo $data->profilepic; } 
										else if ($data->Sexe == 'Male') { echo asset_url('img/blank_male.png'); }
										else if ($data->Sexe == 'Female') { echo asset_url('img/blank_female.png'); }?>"
										 class="photo" width="180" height="151"/>
									</div>
								</div>
								<div class="user-card__section">
									<a href="<?php echo site_url('profil/'.$data->id); ?>" class="user-name app"><?php echo $data->Pseudo; ?></a>
									<span class="age"><?php $oDateNow = new DateTime();
															$oDateBirth = new DateTime($data->BirthDate);
															$oDateIntervall = $oDateNow->diff($oDateBirth);
															echo $oDateNow->diff($oDateBirth)->format('%y ans'); ?></span>
								</div>
							</div>
							<?php }
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
