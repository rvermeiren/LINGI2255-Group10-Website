<?php
//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Check to make sure that the subject field is not empty
	if(trim($_POST['subject']) == '') {
		$hasError = true;
	} else {
		$subject = trim($_POST['subject']);
	}
	
	//Check to make sure that the validation field is correct and not empty
	if(trim($_POST['validation']) == '') {
		$hasError = true;
	} elseif(trim($_POST['validation']) != 13) {
		$hasError = true;
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = get_settings('admin_email');
		$body = '<html><body bgcolor="#CCCCCC" text="#333333">';
		$body .= '<table cellspacing="0" align="center" width="650" style="font: 11px Arial, Helvetica, sans-serif; line-height:14px;">';
		$body .= '<tr><td height="50" width="650" style="padding:10px; background-color:#3c9028;"><h1 style="text-transform:uppercase; font-size:17px; margin:5px 0 0 0; color:#FFFFFF;">Des Prêtres pour Toutes les Nations</h1><h2 style="font-size:13px; margin:2px 0 5px 0; color:#FFFFFF; font-weight:normal;">Formulaire de contact</h2></td></tr>';
		$body .= '<tr><td width="650" style="padding:20px 10px; background-color:#FFFFFF;">'.nl2br($message).'<p><strong>'.$name.'</strong></p></td></tr>';
		$body .= '<tr><td width="650" heght="50" style="background-color:#3c9028; padding:10px; color:#FFFFFF;">Copyright &copy; 2013 Des Prêtres pour Toutes les Nations<br />Avenue du Castel 90/11 | 1200 Bruxelles | +32 (0)477 24 63 43<br />Site web: <a style="color:#FFFFFF; text-decoration:none;" href="http://www.dptn.be/" title="Cliquez ici pour vous rendre sur le site de DPTN Belgique">www.dptn.be</a></td></tr></table></html>';
		$headers = 'From: '.get_settings('blogname').' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'Content-Type: text/html; charset=UTF-8';

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
?>


<?php

/*
Template Name: Contact
*/

?>

<?php get_header(); ?>

<section class="main page">
	<div class="post">
		<h1 class="post-title"><?php the_title(); ?></h1>
		<div class="post-content">
		
		<?php if(isset($hasError)) { //If errors are found ?>
			<p class="error">Vérifier que vous avez correctement rempli tous les champs puis réessayez ! Merci</p>
		<?php } ?>

		<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
			<div class="success">
				<p><strong>Votre email a été correctement envoyé !</strong></p>
				<p>Nous vous remerçions pour votre message <strong><?php echo $name;?></strong> ! Nous tenterons de vous répondre dans les plus brefs délais.</p>
			</div>
		<?php } ?>

		<form method="post" action="" id="contactform">
			<div id="left">
				<div class="stage">
					<label for="name"><strong>Name <em>*</em></strong></label><br />
					<input type="text" name="contactname" id="contactname" value="" class="required" role="input" aria-required="true" />
				</div>

				<div class="stage">
					<label for="email"><strong>Email <em>*</em></strong></label><br />
					<input type="text" name="email" id="email" value="" class="required" role="input" aria-required="true" />
				</div>

				<div class="stage">
					<label for="subject"><strong>Subject <em>*</em></strong></label><br />
					<input type="text" name="subject" id="subject" value="" class="required" role="input" aria-required="true" />
				</div>
				
				<div class="stage">
					<label for="validation"><strong>Combien font cinq + 8 ? <em>*</em></strong></label><br />
					<input type="text" name="validation" id="validation" value="" class="required" role="input" aria-required="true" />
				</div>
				
			</div>
			
			<div id="right">
				<div class="stage">
					<label for="message"><strong>Message <em>*</em></strong></label><br />
					<textarea rows="8" name="message" id="message" class="required" role="textbox" aria-required="true"></textarea>
				</div>
				
				<p class="requiredNote"><em>* Champs obligatoires.</em></p>
				
				<input type="submit" value="Envoyer le message" name="submit" id="submitButton" title="Cliquez ici pour envoyer votre message !" />
				
			</div>

		</form>
		
		</div>
	</div>
    
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>