<div class="col-md-12">
	<h1 style="color:white;font-size:50px;">Slidle your Life !!</h1>

<br>
	<div class="squaret">
		
		<h3 style="color:white">Plataforma Slidle</h3>
		<p>Guarda tus momentos especiales en un <b>Slidle</b> y compartelo con tus amigos. Encuentra en Slidle informacion sobre autos, deportes, musica y mucho mas.</p>
		<a href="https://www.facebook.com/pages/Slidle/287215638107638" class="btn pull-right btn-primary btn-lg">Buscanos en Facebook</a>
		<div class="clearfix"></div>
	</div>
<br><br><br><br><br><br>

	<div class="squaret">


		<h3 style="color:white">Ya tienes Invitacion a Slidle</h3>
		<p>Si ya tienes una invitacion a  Slidle inserta tu Correo Electronico y tu Codigo Secreto en el siguiente formulario.</p>
<form method="post" action="index.php?view=processinvitation" id="start">
<div class="row">
  <div class="col-lg-6">
    <input type="email" class="form-control input-lg" id="start_email" placeholder="Tu correo electronico">
  </div>
  <div class="col-lg-4">
    <input type="password" class="form-control input-lg" id="secret_code" placeholder="Codigo Secreto">
  </div>

  <div class="col-lg-2">
  <button class="btn btn-block btn-success btn-lg">Iniciar</button>
  <br>
  </div>
</div>
</form>	
<script>
	$("#start").submit(function(e){
		if($("#start_email").val()=="" && $("#secret_code").val()=="" ){
			e.preventDefault();
			alert("No debes dejar campos vacios");
		}else{
			if($("#secret_code").val().length==10){
				// ok
			}else{
				e.preventDefault();
			alert("El codigo secreto no tiene el formato correspondiente.");
			}

		}
	});
</script>
	</div>

<br><br><br><br><br><br>

	<div class="squaret">


		<h3 style="color:white">Solicita una invitacion a Slidle</h3>
		<p>La aplicacion slidle funciona con un sistema de invitaciones. Solicita tu invitacion.</p>
<div class="row">
  <div class="col-lg-8">
    <input type="text" class="form-control input-lg" placeholder="Solicita tu invitacion">
  </div>
  <div class="col-lg-4">
  <button class="btn btn-block btn-info btn-lg">Solicitar Invitacion</button>
  <br>
  </div>
</div>
		
	</div>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>