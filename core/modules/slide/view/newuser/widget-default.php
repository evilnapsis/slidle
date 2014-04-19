<?php

if(isset($_SESSION["email"]) && isset($_SESSION["secret"])){
	if($_SESSION["email"]!="" && $_SESSION["secret"]!=""){
?>
<div class="row">
<div class="col-md-6">
<h2>Agregar Cuenta</h2>
<br>
<form class="form-horizontal" id="adduser" method="post" action="index.php?view=adduser" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control"  id="name" name="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido</label>
    <div class="col-lg-10">
      <input type="text" class="form-control"  id="lastname" name="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="email" class="form-control"  readonly="" value="<?php echo $_SESSION['email'];?>" id="inputEmail1" placeholder="Email">
    </div>
  </div>



  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Contraseña</label>
    <div class="col-lg-10">
      <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Confirmar Contraseña</label>
    <div class="col-lg-10">
      <input type="password" class="form-control" id="confirmpassword" placeholder="Confirmar Contraseña">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-lg btn-primary">Crear Cuenta</button>
    </div>
  </div>
</form>
<script>
	$("#adduser").submit(function(e){
		if($("#name").val()=="" || $("#lastname").val()=="" || $("#password").val()=="" || $("#confirmpassword").val()==""){
			e.preventDefault();
			alert("No debes dejar campos vacios.");
		}else{
			if($("#password").val()== $("#confirmpassword").val()){
				// las contras coinciden
			}else{
			e.preventDefault();
			alert("Las Contraseñas no coinciden.");

			}

		}
	});
</script>
<br><br><br>
</div>
</div>
<?php
	}
}else {
	// no sesion
	print "<script>window.location='index.php';</script>";
}

?>