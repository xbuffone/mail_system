<?php $title = "Messages"; $page = "read"; ?>

<?php ob_start(); ?>

                        <div class="col-md-10  col-md-push-1">
                                <fieldset>
                                <legend class="text-center">Messagerie</legend>
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
                                <ul>
                		<li><strong>Quota :</strong> <?= round($ratio, 2); ?>% <?= round($msgSize, 2); ?>ko/100ko</li>

                		<li><strong>Nombre de messages :</strong> <?= count($messages); ?></li>
                                </ul>
                		<!-- Messages -->
                                <section id="messages">
                                <?php if(count($messages) > 0) : ?>
                		      <?php foreach ($messages as $msg): ?>
        			     <article>
        			        <h4><?php echo $msg['expediteur'] ?></h4>
        			        <p><?php echo $msg['body'] ?></p>
        			    </article>
        			    <?php endforeach; ?>
                                <?php else: ?>
                                        <article>Pas de messages.</article>
                                <?php endif; ?>

                		<!-- Fin des messages -->
                                <div class="row">
                                        <div class="col-md-12">
                        		      <a href="delMsg.php" class="btn btn-warning">Effacer les messages</a>
                                        </div>
                                </div>
                                </section>
                                </fieldset>
        		</div><!-- ends col-10 -->
<?php $content = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>