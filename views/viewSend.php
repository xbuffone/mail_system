<?php $title = "Envoyer un message";  $page = "send";?>

<?php ob_start(); ?>
            <div class="col-md-10 col-md-push-1">
            		<form role="form" id="contact-form" class="contact-form" action="send.php"  method="post">
            		<fieldset>
                <legend class="text-center"><?= $title; ?></legend>
                <?php
                    if((isset($errMsg) && $errMsg != '')): ?>
                    <div class="alert alert-danger fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong>Erreur</strong> <?= $errMsg; ?>
              </div>
              <?php endif; ?>

              <?php
                    if((isset($successMsg) && $successMsg != '')): ?>
                    <div class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong><?= $successMsg; ?></strong>
              </div>
              <?php endif; ?>
                    <div class="row">
                		<div class="col-md-6">
	                  		<div class="form-group">
	                            <input type="text" class="form-control" name="destinataire" autocomplete="off" id="destinataire" placeholder="Entrer l'identifiant du destinataire" maxlength="40" required />
	                            <input type="hidden" name="expediteur" value="<?= $login; ?>">
	                  		</div>
	                  	</div>
                  	</div>
                  	<div class="row">
                  		<div class="col-md-12">
                  		<div class="form-group">
                            <textarea class="textarea col-md-12" rows="5" name="message" id="message" placeholder="Message"></textarea>
                  		</div>
                  	</div>
                    </div>
                    <div class="form-group ">
                      <hr>
                      <button type="submit" class="btn btn-primary btn-lg btn-block ">Envoyer</button>
                    </div>
                  </fieldset>
                </form><!-- ends register form -->
        		</div><!-- ends col-10 -->
<?php $content = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>