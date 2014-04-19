<div class="row">

	<div class="col-md-9">
	<h2><i class="glyphicon glyphicon-envelope"></i> Enviar Invitacion</h2>
	<p>Bienvenido al sistema de invitacion de <b>Slidle</b>. Lee cuidadosamente las recomendaciones que aparecen abajo del formulario.</p>
	<p>Escribe a conticuacion el email de la persona que deseas invitar a <b>slidle</b>.</p>
<br>	<form class="form-horizontal" id="changepasswd" method="post" action="index.php?view=processinvitation" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-9">
      <input type="email" class="form-control input-lg" required id="email" name="email" placeholder="Email del invitado">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Confirmar Email</label>
    <div class="col-lg-9">
      <input type="email" class="form-control input-lg" required id="email" name="email" placeholder="Confirmar Email del invitado">
    </div>
  </div>




  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-9">
      <button type="submit" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-envelope"></i> Enviar invitacion</button>
    </div>
  </div>
</form>
<br>	
<h2>Recomendaciones</h2>
<p><b>Slidle</b> es un sistema  de red social en el cual solo es posible obtener una cuenta mediante una invitacion. A cada usuario de <b>Slidle</b> se le otorga una invitacion para que invite a un amigo.</p>
 <p class="alert alert-warning">Esta caracteristica se activa al crear mas de 10 slidles</p>
<p>La invitacion solo esta activa por 20 dias, despues de ese periodo se rechaza el email para futuras invitaciones.</p>
<script>
$("#changepasswd").submit(function(e){
	if($("#password").val()=="" || $("#newpassword").val()=="" || $("#confirmnewpassword").val()==""){
		e.preventDefault();
		alert("No debes dejar espacios vacios.");

	}else{
		if($("#newpassword").val() == $("#confirmnewpassword").val()){
//			alert("Correcto");			
		}else{
			e.preventDefault();
			alert("Las nueva contraseña no coincide con la confirmacion.");
		}
	}
});

</script>
	</div>
</div>
<br><br><br><br><br><br><br><br><br>