
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
			<div class="sign-title" style="position:relative">
				<h1>Recherchez d'autres personnes</h1>
			</div>
			<div>
				<form method="post" class="form form-not-before" action="<?php echo site_url('dating/results'); ?>">
					<div class="form__row">
						<div class="form__label">
							<label for="sex">Sexe</label>
						</div>
						<div class="form__field" style="padding: 12px 10px;">
								<input type="radio" id="rad9" name="sex" value="Homme"
								<?php if ($this->session->userdata('sex') && $this->session->userdata('sex') == 'Homme') echo 'checked=checked'; ?>  />
								<label for="rad9">Homme</label>
								<input type="radio" id="rad10" name="sex" value="Femme"
								<?php if ($this->session->userdata('sex') && $this->session->userdata('sex') == 'Femme') echo 'checked=checked'; ?>  />
								<label for="rad10">Femme</label>
						</div>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="agemin">Age minimum</label>
						</div>
						<div class="form__field">
							<input type="number" class="input-text" style="width: 13%;" value="<?php if ($this->session->userdata('agemin')) echo $this->session->userdata("agemin"); ?>" name="agemin"/>
						</div>	
						<div class="form__label">
							<label for="agemax">Age maximum</label>
						</div>
						<div class="form__field">
							<input type="number" class="input-text" style="width: 13%;" value="<?php if ($this->session->userdata('agemax')) echo $this->session->userdata("agemax"); ?>" name="agemax"/>
						</div>	
					</div>	
					<div class="form__row">
						<div class="form__label">
							<label for="hobbies">Hobbies (séparez avec des virgules)</label>
						</div>
						<div class="form__field">
							<textarea class="textarea" name="hobbies" rows="4" cols="50"><?php if ($this->session->userdata("hobbies")) echo $this->session->userdata("hobbies"); ?></textarea>
						</div>
					</div>
					<div class="form__row">
						<div class="form__label">
							<label for="job">Travail</label>
						</div>
						<div class="form__field">
							<input type="text" class="input-text" value="<?php if ($this->session->userdata('job')) echo $this->session->userdata("job"); ?>" name="job"/>
						</div>	
					</div>
					
					<div class="form__row">
						<div class="form__label">
							<label for="interest">Intéressé par</label>
						</div>
						<div class="form__field" style="padding: 12px 10px;">
							<input type="radio" id="rad1" name="interest" value="Hommes" 
							<?php if ($this->session->userdata('interest') && $this->session->userdata('interest') == 'Hommes') echo 'checked=checked'; ?> />
							<label for="rad1">Hommes</label>
							<input type="radio" id="rad2" name="interest" value="Femmes" 
							<?php if ($this->session->userdata('interest') && $this->session->userdata('interest') == 'Femmes') echo 'checked=checked'; ?>/>
							<label for="rad2">Femmes</label>
							<input type="radio" id="rad3" name="interest" value="Les 2"
							<?php if ($this->session->userdata('interest') && $this->session->userdata('interest') == 'Les 2') echo 'checked=checked'; ?> />
							<label for="rad3">Les deux</label>
						</div>
					</div>
						
					<div class="form__row">
						<div class="form__label">
							<label for="situation">Situation</label>
						</div>
						<div class="form__field" style="padding: 12px 10px;">
							<input type="radio" id="rad4" name="situation" value="En couple" 
							<?php if ($this->session->userdata('situation') && $this->session->userdata('situation') == 'En couple') echo 'checked=checked'; ?> />
							<label for="rad4">En couple</label>
							<input type="radio" id="rad5" name="situation" value="Célibataire" 
							<?php if ($this->session->userdata('situation') && $this->session->userdata('situation') == 'Célibataire') echo 'checked=checked'; ?> />
							<label for="rad5">Célibataire</label>
						</div>
					</div>

					<div class="form__row">
						<div class="form__label">
							<label for="sexuality">Sexualité</label>
						</div>
						<div class="form__field" style="padding: 12px 10px;">
							<input type="radio" id="rad6" name="sexuality" value="Hétérosexuel" 
							<?php if ($this->session->userdata('sexuality') && $this->session->userdata('sexuality') == 'Hétérosexuel') echo 'checked=checked'; ?> />
							<label for="rad6">Hétérosexuel</label>
							<input type="radio" id="rad7" name="sexuality" value="Homosexuel"
							<?php if ($this->session->userdata('sexuality') && $this->session->userdata('sexuality') == 'Homosexuel') echo 'checked=checked'; ?>/>
							<label for="rad7">Homosexuel</label>
							<input type="radio" id="rad8" name="sexuality" value="Bisexuel"
							<?php if ($this->session->userdata('sexuality') && $this->session->userdata('sexuality') == 'Bisexuel') echo 'checked=checked'; ?> />
							<label for="rad8">Bisexuel</label>
						</div>
					</div>
					<input type="hidden" name="newsearch" value="1"/>
					<input type="submit" class="btn btn--orange btn--lg" value="Rechercher" />
					<a href="<?php echo site_url('dating/resetSearch'); ?>" class="btn btn--green btn--lg">
						Réinitialiser
					</a>

				</form>
			</div>
		</div>
	</div>
</body>
</html>