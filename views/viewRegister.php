<?php $title = "Enregistrer un nouveau compte"; ?>

<?php ob_start(); ?>
				<div class="col-md-6 col-md-push-3">
            		<form action="register.php" method="post" id="fileForm" role="form">
	            		<fieldset>
	            			<legend class="text-center">Formulaire d'inscription</legend>
	            			<?php
	            			if((isset($errMsg) && $errMsg != '')): ?>
	            			<div class="alert alert-danger fade in">
							    <a href="#" class="close" data-dismiss="alert">&times;</a>
							    <strong>Erreur</strong> <?= $errMsg; ?>
							</div>
							<?php endif; ?>
	            			<div class="form-group">
								<label for="username" class="cols-sm-2 control-label">Identifiant</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="username" id="username" onkeyup="Validate(this)" placeholder="maximum 40 caractères alpha numériques" maxlength="40" required />
									</div>
									<div id="errLast"></div>
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="cols-sm-2 control-label">Mot de passe</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
										<input type="password" class="form-control  inputpass" name="password" id="password"  placeholder="Entrer un mot de passe" required />
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="confirm" class="cols-sm-2 control-label">Confirmer le mot de passe</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
										<input type="password" class="form-control inputpass" name="confirm" id="confirm"  placeholder="Confirmer le mot de passe" onkeyup="checkPass(); return false;" required />
									</div>
									<span id="confirmMessage" class="confirmMessage"></span>
								</div>
							</div>

	            			<div class="form-group ">
	            				<hr>
								<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Créer un compte</button>
							</div>
							<div class="login-register">
					            <a href="login.php">Identification</a>
					         </div>
	            		</fieldset>
            		</form><!-- ends register form -->
        		</div><!-- ends col-6 -->
<?php $content = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>