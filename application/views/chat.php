
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8"> 
	<title>Booda : Peace & Love</title>
	<link rel="stylesheet" href="<?php echo asset_url('style.css'); ?>" type="text/css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  	<script>
  		setInterval("get_messages();", 10000);
  		function get_messages() {
  			$('#content').load(location.href + ' #mes');
  		}
  	</script>
</head>
<body  class="page_homepage plain" style="background: rgb(255, 245, 228);">
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
	<div id="wrap" class="chat">
		<div class="lastConvs">
			<ul>
			<?php foreach ($conversations as $conv){
			$userId = ''; ?>
			<li>
				<a href="<?php echo site_url('chat/'.$conv['id']); ?>">
				<?php 
					if (strcmp($this->session->userdata('userId'), $conv['idUser1']) == 0)
						$userId = $conv['idUser2'];
					else
						$userId = $conv['idUser1'];
					foreach ($users as $u) {
						if (strcmp($u['id'], $userId) == 0) {
							echo $u['Pseudo'];
							break;
						}
					}
				?>
				</a>
			</li>
		<?php } ?>
		</div>
		<div class="currentConv">
			<div class="content">
				<div class="mes">
					<?php 
					if (isset($messages))
					{
							foreach ($messages as $message){
							$pseudo = '';
							foreach ($users as $u) {
								if (strcmp($u['id'], $message['idUser']) == 0)
								{
									$pseudo = $u['Pseudo'];
									break;
								}
							}
							 ?>
							<div class="msg <?php if (strcmp($this->session->userdata('userId'), $message['idUser']) == 0) echo 'mine'; else echo 'notmine'; ?>" >
								<div class="msg-head"><?php echo $pseudo; ?>
								</div>
								<div class="msg-content">
									<?php echo $message['message']; ?>
								</div>
							</div>
					<?php }
					} ?>
				</div>
			</div>
			<div class="postzone">
				<form method="post" action="">
					<textarea name="message" rows="4" cols="40" class="textarea"></textarea>
					<input type="submit" class="btn btn--lg btn--orange" value="Envoyer" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>