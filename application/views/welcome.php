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
					Pas encore membre ?</span>
					<a href="<?php echo site_url('auth/inscription'); ?>" class="btn btn--orange">
						Rejoindre Booda
					</a>
				</div>
			</div>
		</div>
		<div class="homepage-header">
			<div id="homepage-form-header" class="homepage-form-header" style="background: url(<?php echo asset_url('img/welcome.jpg'); ?>) repeat-x 0 50% #3d8ca9">
				<div class="center">
					<div class="homepage-col">
						<h1 class="homepage-title">
							Rencontre de nouvelles personnes bouddhistes
						</h1>
						<p class="homepage-text">
							Fait connaissance avec des personnes partageant ton état d'esprit et plus encore
						</p>
					</div>
					<!-- -->
					<div class="homepage-col">
						<div class="sign-form sign-form--light fl_r js-homepage-top-form">
							<div>
								<form action="<?php echo site_url('auth/connexion'); ?>" method="post" class="no_autoloader form js-signin" novalidate>
									<h2>
										Identifie-toi sur Booda</h2>
										<?php if( isset($info)): ?>
										<div class="alert alert-success">
											<?php echo($info) ?>
										</div>
										<?php elseif( isset($error)): ?>
										<div class="alert alert-error">
											<?php echo($error) ?>
										</div>
										<?php endif; ?>
										<div class="form__row">
											<div class="form__label">
												<label for="pseudo">
													Pseudo</label>
												</div>
												<div class="form__field">
													<input type="text" name="pseudo" id="pseudo" class="input-text autofocus">
												</div>
											</div>
											<div class="form__row">
												<div class="form__label">
													<label for="password">Mot de passe</label>
													</div>
													<div class="form__field">
														<input type="password" name="password" id="password1" class="input-password" value="">
													</div>
												</div>
												<div class="form__row sign-form__remember">
													<div class="form__field">
														<span class="checkbox">
															<input type="checkbox" name="remember" id="remember" value="1" checked="checked">
															<label for="remember">
																Se souvenir de moi</label>
															</span>
														</div>
													</div>
													<div class="form__row">
														<div class="form__field">

															<button class="btn btn--lg btn--orange" type="submit" name="post">
																Se connecter !</button>

																<ins class="loading_to_button">
																	<span class="waiting">
																	</span>
																</ins>
															</div>

														</div>

														<div class="form__row sign-form__forgot">
															<div class="form__field">

																<a href="<?php echo site_url('auth/forgotpassword'); ?>">
																	Mot de passe oublié ?</a>
																</div>

															</div>
															<div class="formfade">
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</body>
						</html>