<div class="row">
	<div class="col-md-4">
	<?php 

	$u = UserData::getById(Session::getUID());
	$posts = PostData::getAllByUserId(Session::getUID());

	echo "<h2>".$u->name." ".$u->lastname."</h2>"; ?>
	<a href="index.php?view=newpost" class="btn btn-lg btn-block btn-default"><i class='glyphicon glyphicon-file'></i> Nuevo Slide</a>
<br><table class="table table-bordered" style="background:white;">
	<tr>
		<td colspan="4" style="background:#333;color:white;font-weight:bold;">Estadisticas</td>
	</tr>
	<tr>
		<td>Slidles
		<center><h2><?php echo count($posts); ?></h2></center>
		</td>
		<td>Loved
		<center><h2><?php echo count(LoveData::getAllByUserId(Session::getUID())); ?></h2></center>
		</td>
		<td>Siguendo</td>
		<td>Seguidores</td>
	</tr>
</table>
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
		<?php

		if(count($posts)>0){
			// si hay usuarios
			?>
			<?php
			foreach($posts as $post){
				?>
<?php $theme = ThemeData::getById($post->theme_id); ?>

<div class="row">
	<div class="col-md-12">
	<div class="slide" style="box-shadow:-1px 1px 10px #999;">
		<div class="header" style="background:<?php echo $theme->header_background_color;?>;color:<?php echo $theme->header_text_color;?>;padding:10px;">
<!-- Single button -->
<div class="btn-group pull-right">
  <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
<i class="glyphicon glyphicon-chevron-down"></i>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="index.php?view=post&id=<?php echo $post->id; ?>" target="_blank"><i class="glyphicon glyphicon-eye-open"></i> Ver</a></li>
    <li><a href="index.php?view=editpost&id=<?php echo $post->id; ?>"><i class="glyphicon glyphicon-pencil"></i> Editar</a></li>
    <li class="divider"></li>
    <li><a href="#"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>
  </ul>
</div>
			<div style="font-size:26px;"><?php echo $post->title; ?></div>
		</div>
		<div class="body" style="background:<?php echo $theme->body_background_color;?>;color:<?php echo $theme->body_text_color;?>;padding:10px;font-size:18px;font-wieght:none;">
<?php if($post->image==""):?>
			<p><?php echo $post->content; ?></p>
<?php else:
    		$url="storage/user/".$post->user_id."/slidle/image/".$post->image;
?>
	<div class="row">
		<div class="col-md-3">
			<img src="<?php echo $url;?>" class="img-responsive">
		</div>
		<div class="col-md-9">
			<p><?php echo $post->content; ?></p>
		</div>

	</div>

<?php endif; ?>
			<div class="pull-right">
				<button id="reslidle-<?php echo $post->id; ?>" class="btn btn-default "><i class="glyphicon glyphicon-th-large"></i> Reslidle It</button>

<?php if(!LoveData::LoveId($post->id)):?>
				<button id="loveit-<?php echo $post->id; ?>" class="btn btn-default "><i class="glyphicon glyphicon-heart"></i> Love It</button>
<script>
$("#loveit-"+"<?php echo $post->id; ?>").click(function(){
	xhr = new XMLHttpRequest();
	xhr.open("POST","index.php?view=loveit"+"&postid=<?php echo $post->id;?>",false);
	xhr.send();
	console.log(xhr.responseText);
	$("#loveit-"+"<?php echo $post->id; ?>").removeClass("btn-default");
	$("#loveit-"+"<?php echo $post->id; ?>").addClass("btn-danger");
});
</script>
<?php else:?>
		<button class="btn btn-danger"><i class="glyphicon glyphicon-heart"></i> Love It</button>
<?php endif; ?>


			</div>


			<p style="color:#555;font-size:12px;">por <b><a style="color:#555;" href=""><?php echo UserData::getById($post->user_id)->name." ".UserData::getById($post->user_id)->lastname; ?></a></b> </p>
			<div class="clearfix"></div>
		</div>
		<p></p>
	</div>
	</div>
</div>
			<?php

			}



		}else{
			// no hay usuarios
			?>

<div class="jumbotron">
	<h2>No hay slidles</h2>
	<p>Al parecer no has agregado ningun Slidle.Te recomendamos agregar uno.</p>
</div>

			<?php
		}


		?>


	</div>
</div>
<br><br><br><br><br><br><br><br><br>