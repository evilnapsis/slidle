	<?php 
	$u = UserData::getById(Session::getUID());
	$posts = PostData::getAllByUserId(Session::getUID());
	Slidle::$user = $u;
	Slidle::$posts = $posts;
	?>

<div class="row">
	<div class="col-md-4">
	<?php
		Slidle::renderUserCard();
	?>	
	<br>
		<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">&nbsp;</h3>
            </div>
        	<div class="list-group">
					<a href='index.php' class='list-group-item'><i class="glyphicon glyphicon-chevron-right"></i> Mis Slidles</a>
					<a href='index.php?view=sent' class='list-group-item'><i class="glyphicon glyphicon-chevron-right"></i> Enviados</a>
					<a href='index.php?view=received' class='list-group-item'><i class="glyphicon glyphicon-chevron-right"></i> Recividos</a>
			</div>
        </div>

			<div class="panel panel-warning">
			  <div class="panel-heading"><b>Invita a un amigo !!</b></div>
			  <div class="panel-body">
			    <p><b>Slidle</b> te regala una invitacion para que se la regales a tu mejor amigo, tu hermano, novia, etc. <b>Slidle</b> solo funciona con invitacion. </p>
			    <a href="index.php?view=invite" class="btn btn-warning btn-block"><i class="glyphicon glyphicon-star"></i> Invitar un amigo</a>
			  </div>
			</div>


	</div>
	<div class="col-md-8">
		<br>
		<?php echo Slidle::renderSlidles(); ?>

	</div>
</div>
<br><br><br><br><br><br><br><br><br>