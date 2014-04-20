		<?php
include "core/autoload.php";
include "core/modules/slide/model/UserData.php";
include "core/modules/slide/model/PostData.php";
include "core/modules/slide/model/ThemeData.php";
include "core/modules/slide/model/LoveData.php";


	
//	$posts = PostData::getAllByUserId($_GET['uid']);
	$ref = $_GET['ref'];
	$posts = PostData::getAllFromXByUserId($_GET["from"], $_GET["uid"]);

		if(count($posts)>0){
			// si hay usuarios
			?>
			<?php
			$last_id=null;
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
			$last_id = $post->id;
			}

if(count($posts)>0){
	print "<div id='more-$ref'><button id='btn-more-$ref' class='btn btn-default btn-lg btn-block'><i class='glyphicon glyphicon-refresh'></i> Cargar mas ...</button></div>";
	$next = $ref+1;
	?>
<script>
	$("#btn-more-<?php echo $ref;?>").click(function(){
//		alert("wtf!");
		xhr = new XMLHttpRequest();
		xhr.open("GET","loadsldl.php?uid=<?php echo $_GET['uid'];?>&from=<?php echo $last_id; ?>&ref=<?php echo $next;?>",false);
		xhr.send();
		$("#more-<?php echo $ref;?>").html(xhr.responseText);
	});
</script>
	<?php
}


		}else{
			// no hay usuarios
			print "<p class='alert alert-warning'>Ya no hay slidles que cargar ...</p>";
		}
			?>
