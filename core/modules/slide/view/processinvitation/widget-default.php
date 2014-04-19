<?php
print_r($_POST);
if(count($_POST)>0){
	$us = UserData::getByMail($_POST["email"]);
	if(count($us)==0){

	$invitation  = InvitationData::getByMail($_POST["email"]);
	if($invitation!=null){
		$_SESSION["email"] = $invitation->email;
		$_SESSION["secret"] = $invitation->the_key;
		print "<script>window.location='index.php?view=newuser';</script>";

	}else {
		// el email no tiene asociado ninguna invitacion.
	}

	}else{
		print "<script>window.location='index.php?error=userexist';</script>";
	}


}

?>