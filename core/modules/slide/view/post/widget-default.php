<?php

$post = PostData::getById($_GET['id']);
$theme = null;
if($post!=null){$theme = ThemeData::getById($post->theme_id);}
if($post==null){
    $post = new PostData();
    $post->title = "404 Not Found";
    $post->content = "El post que esta buscando no existe.";
    $theme = ThemeData::getById(7);
}

// print $ret;
if($post!=null):
$post->content = preg_replace("/(#\w+)/", "<b><a href='index.php?view=tag&tag=$1' style='color:$theme->body_text_color' target=''>$1</a></b>", $post->content);

?>
<div class="fullslidle" style="height:100%;">
<div class="header" style="background:<?php echo $theme->header_background_color;?>;color:<?php echo $theme->header_text_color;?>;">
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="header" style="padding:30px;">
			<div style="font-size:36px;"><?php echo $post->title; ?></div>
		</div>		
	</div>
</div>
</div>
</div>
<div class="bodx" style="background:<?php echo $theme->body_background_color;?>;color:<?php echo $theme->body_text_color;?>;font-size:24px;">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="body" style="padding:30px;">
<?php if($post->image==""):?>
			<p><?php echo $post->content; ?></p>
<?php else:
    		$url="storage/user/".$post->user_id."/slidle/image/".$post->image;
?>
	<div class="row">
		<div class="col-md-4">
			<img src="<?php echo $url;?>" class="img-responsive">
		</div>
		<div class="col-md-8">
			<p><?php echo $post->content; ?></p>
		</div>
	</div>
<?php endif;?>				
			</div>
		</div>
	</div>
	</div>
</div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=383508155123666";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="" style="background:#f0f0f0">
<br><div class="container">
	<div class="row">
		<div class="col-md-4">
		<h3>Acerca del Autor</h3>
<?php $author = UserData::getById($post->user_id); ?>
<div class="row">
	<div class="col-md-3">
		
	</div>
	<div class="col-md-9">
		<h2><?php echo $author->name." ".$author->lastname;?></h2>
<div class="row">
	<div class="col-md-6">
				<a href="index.php?view=user&id=<?php echo $post->user_id; ?>" class="btn btn-default btn-lg btn-block">Perfil</a>
	</div>
	<div class="col-md-6">
				<a href="" class="btn btn-default btn-lg btn-block">Seguir</a>
	</div>
</div>
	</div>
</div>
		</div>
		<div class="col-md-4">
		<br>
			<a href="" class="btn btn-lg btn-default btn-block"><i class="glyphicon glyphicon-heart-empty"></i> Love It!</a>
			<a href="" class="btn btn-lg btn-default btn-block"><i class="glyphicon glyphicon-th-large"></i> Reslidle It!</a>
			<a href="" class="btn btn-lg btn-default btn-block"><i class="glyphicon glyphicon-share"></i> Share</a>

		</div>

		<div class="col-md-4">
		<h2>Compartir</h2>
			<div class="fb-share-button" data-href="http://www.slidle.com/index.php?viepost&id=<?php echo $post->id; ?>" data-type="button_count"></div>
		</div>


	</div>
</div>
<br><br><br>
</div>

<?php if(Session::getUID()!=""):

?>
<div class="" style="background:#f0f0f0">
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1>Slidle your life !!</h1>
			
			<p><p><?php $user = UserData::getById(Session::getUID()); echo "<a href='index.php?view=home'><b>".$user->name." ".$user->lastname."</b></a>"; ?> - <b>Deja tu comentario</b></p>
			<textarea class="form-control"></textarea>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<br><br><br><br>

</div>
<?php 

endif; ?>
<?php else:?>
	<h1>404 Post Not Found !!</h1>
<?php endif;


// $l  = new LoveData();
// $l->user_id = Session::getUID();
// $l->slide_id = $_GET["id"];
// $l->add();






 ?>
 </div>
