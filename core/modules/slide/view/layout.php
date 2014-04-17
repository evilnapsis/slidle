<html>
<head>
<meta charset="utf8">
<title>Pretty slides in Sliddle</title>
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

</style>
</head>
<?php if(!isset($_GET['view']) || $_GET["view"]=="login"):?>
<body style="background:url(res/images/akihabara.jpg) no-repeat fixed;background-size:cover;">
<?php else:?>
<?php endif; ?>

<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Slidle</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
<?php if(Session::getUID()!=""):?>
      <ul class="nav navbar-nav">
          <li><a href="index.php?view=home"><i class="glyphicon glyphicon-th-large"></i> Mis Slidles</a></li>
          <li><a href="index.php?view=newpost"><i class="glyphicon glyphicon-file"></i> Nuevo</a></li>
      </ul>
<?php endif; ?>


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

<script src="res/jquery.min.js"></script>
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