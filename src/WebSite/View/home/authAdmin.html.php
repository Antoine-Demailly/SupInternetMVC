<?php
	require_once __DIR__.'/commonsHome.html.php';

	if (isset($_SESSION['flashBag'])) {
        echo '<div class="flashbag">';
        foreach ($_SESSION['flashBag'] as $type => $flash) {
            foreach ($flash as $key => $message) {
                echo '<div class="'.$type.'" role="'.$type.'" >'.$message.'</div>';
                // une fois affiché le message doit être supprimé
                unset($_SESSION['flashBag'][$type][$key]);
            }
        }
        echo '</div>';
    }
?>

	<div class="loginBlock">
		<h1 class="loginTitle">Connexion</h1>
		<form action="?p=user_login" method="POST">
			<div class="field field-first">
				<label for="email" class="field-label">Email</label>
				<input type="email" class="field-input" name="email">
			</div>
			<div class="field">
				<label for="password" class="field-label">Mot de passe</label>
				<input type="password" class="field-input" name="password">
			</div>
			<input type="submit" value="Connexion" class="submit">
		</form>
	</div>

	<script>
		$(function() {
			$('.field-input').focus(function() {
				$(this).parent().addClass('is-focused has-label');
			});

			$('.field-input').blur(function() {
				$parent = $(this).parent();
				if ($(this).val() == '') {
					$parent.removeClass('has-label');
				}
				$parent.removeClass('is-focused');
			});
		});
	</script>
<?php 
	require_once __DIR__.'/footerHome.html.php';
?>