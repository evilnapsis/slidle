<?php
$is_post = false;
$post = null;
$theme = null;
if(isset($_GET["view"]) && $_GET["view"]=="post" && isset($_GET["id"])){
  $post = PostData::getById($_GET["id"]);
  if($post!=null){
  $is_post = true; 
  $theme = ThemeData::getById($post->theme_id);
}else{
    $is_post = true; 
    $post = new PostData();
    $post->title = "404 Not Found";
    $post->content = "El post que esta buscando no existe.";
  $theme = ThemeData::getById(7);
}
}
 ?>
<html>
<head>

<meta charset="utf8">
<?php if($is_post==true):?>
<title><?php echo $post->title; ?> - en un Slidle</title>
<?php else:?>
<title>Tu vida en un Slidle - Slidle your life</title>
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="res/bootstrap3/css/bootstrap.min.css">
<style>
  .squaret {
    background: rgba(0,0,0,0.7);
    color: white;
    padding:40px;
    -webkit-transition : 0.3s background linear;
    -moz-transition : 0.3s background linear;
    -o-transition : 0.3s background linear;
    transition : 0.3s background linear;
  }

  .squaret:hover {
    background: rgba(0,0,0,0.9);
  }

  .squaret h3{
    font-size: 40px;
    font-weight: none;
  }

  .squaret p {
    font-size: 20px;
    font-weight: none;
  }

  .sl-title {
    transition: 0.3s background linear;
  }

  .sl-title input {
    border:none;
    outline: none;
  }

  .sl-content {
    transition: 0.3s background linear;
  }
  .sl-content textarea {
    border:none;
    outline: none;
  }


</style>
<script src="res/jquery.min.js"></script>
</head>



<?php if(!isset($_GET['view']) || $_GET["view"]=="login"):?>
<body style="background:url(res/images/akihabara.jpg) no-repeat fixed;background-size:cover;">
<?php elseif(isset($_GET['view']) && $_GET["view"]=="post"):?>
<body style="background:<?php echo $theme->body_background_color; ?> no-repeat fixed;background-size:cover;">
<?php else:?>
  <body style="background:#f0f0f0">
<?php endif; ?>
<?php if(!$is_post):?>
<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Slidle <sup><span class="label label-danger">BETA</span></sup> </a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
<?php if(Session::getUID()!=""):?>
      <ul class="nav navbar-nav">
          <li><a href="index.php?view=home"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
          <li><a href="index.php?view=home"><i class="glyphicon glyphicon-user"></i> Personas</a></li>
          <li><a href="index.php?view=newpost"><i class="glyphicon glyphicon-file"></i> Nuevo</a></li>
      </ul>
<?php endif; ?>
<ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

<?php 
$user = "Iniciar Sesion";
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
        <?php echo $user; ?> <b class="caret"></b>


        </a>
        <ul class="dropdown-menu">
<?php if(Session::getUID()!=""):?>
          <li><a href="index.php?view=configuration">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
<?php else:?>
          <li><a href="index.php?view=login">Iniciar Sesion</a></li>
<?php endif; ?>
        </ul>
      </li>
    </ul>

    </nav>
  </div>
</header><br><br><br>

<div class='container'>
<div class="row">
<div class="col-md-12">
<?php 
  View::load("index");
?>
</div>
</div>
</div>

<?php else: ?>
<?php 
  View::load("index");
?>

<?php endif; ?>

<div class="" style="color:white;background:#000;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
      <br>
        <h1>Slidle<sup><span class="label label-danger" style="font-size:10px;">BETA</span></sup>, Inc.</h1>
        <p>Otro proyecto de <a href="http://neowelder.com/" style="color:white;"><b>NeoWelder Labs</b></a></p>
        <br><br>
      </div>
      <div class="col-md-3">
        <h2>Siguenos</h2>
        <br>
        <a href="https://twitter.com/slidleit" style="color:white;">@slidleit</a>
      </div>
    </div>
  </div>
  <br><br>
</div>

<script src="res/bootstrap3/js/bootstrap.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50075942-1', 'slidle.com');
  ga('send', 'pageview');

</script>
</body>

</html>