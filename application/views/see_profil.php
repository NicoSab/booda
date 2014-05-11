
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
		<div class="profile-page">
			<div>

				<h1>Profil de <?php if ($profil["Pseudo"]) echo $profil["Pseudo"]; ?> </h1>
			</div>
			</br>
			<label> Sexe</label>
			<span><?php if ($profil["Sexe"]) echo $profil["Sexe"]; ?></span>
			</br>
			<label> Age</label>
			<span><?php if ($profil["BirthDate"]) {
					$oDateNow = new DateTime();
					$oDateBirth = new DateTime($profil["BirthDate"]);
					$oDateIntervall = $oDateNow->diff($oDateBirth);
					echo $oDateNow->diff($oDateBirth)->format('%y ans');
				 } ?></span>
			</br>
			<label> Hobbies</label>
			<span>
			<?php if ($profil["Hobbies"]) echo $profil["Hobbies"]; ?></span>
			</br>

			<label> Intéressé par</label>
			<span><?php if ($profil["Interest"]) echo $profil["Interest"]; ?></span>
			</br>

			<label>Situation</label>
			<span><?php if ($profil["MaritalSituation"]) echo $profil["MaritalSituation"]; ?></span>
			</br>

			<label>Sexualité</label>
			<span><?php if ($profil["Sexuality"]) echo $profil["Sexuality"]; ?></span>
			</br>

			<label>Travail</label>
			<span><?php if ($profil["Job"]) echo $profil["Job"]; ?></span>
			</br>

			<label>Description</label>
			<span><?php if ($profil["Description"]) echo $profil["Description"]; ?></span>
			</br>
			<?php if ($this->session->userdata('userId') == $profil["idUser"])
			{ ?>
				<a href="<?php echo site_url('profil/update'); ?>" class="btn btn--orange btn--lg">Mettre à jour</a>
			<?php } ?>
			</div>
			<div class="profile-photos">
				<div>
					<h1 style="float: left;line-height: 55px;margin-right: 30px;">Photos</h1>
					<?php if ($this->session->userdata('userId') == $profil["idUser"])
					{ ?>
						<a href="<?php echo site_url('upload'); ?>" style="float:left" class="btn btn--orange btn--lg">Ajouter une photo</a>
					<?php } ?>
				</div>

				<div class="polaroid-images">
				<?php
				if ($pics)
				{
					foreach($pics as $data) { ?>
					<div style="position:relative">
						<a href="<?php echo site_url('profil/photo/'.$data->id); ?>" class="pol"><img height="200" src="<?php echo photo_url($data->name); ?>"/>
						</a>
						<?php if ($this->session->userdata('userId') == $profil["idUser"])
						{ ?>
						<a href="<?php echo site_url('profil/delete_photo/'.$data->id); ?>" class="suppr btn btn--orange">Supprimer</a>
						<?php } ?>
					</div>
				<?php } 
				} ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>