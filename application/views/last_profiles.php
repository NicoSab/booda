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
				<a href="<?php echo site_url('auth/logout'); ?>" class="btn btn--orange">
					Déconnexion
				</a>
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
				<h1>Derniers bouddhistes inscrits</h1>
			</div>
			<div>
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
									<a href="#" class="user-name app"><?php echo $data->Pseudo; ?></a>
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
