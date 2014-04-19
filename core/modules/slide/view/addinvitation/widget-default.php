<?php
if(isset($_POST)){

print $email = $_POST["email"];
$users = UserData::getByMail($email);
if(count($users)==0){

	$invis = InvitationData::getByMail($email);
	if(count($invis)==0){
		// no hay ningun usuario registrado ocupando ese email
		// tampoco hay alguna invitacion pendiente para el usuario
		$invitation = new InvitationData();
		$invitation->email = $email;
		$invitation->user_id = Session::getUID();

		// ----------------------------------------
		$vowel = "aeiuoAEIOU";
		$lower = "bcdfghjklmnpqrstvwxyz";
		$upper = strtoupper("bcdfghjklmnpqrstvwxyz");
		$nums = "1234567890";
		$all = Array($vowel,$lower,$upper,$nums);
		$code = "";
		for($i=0;$i<10;$i++){
			$n =  rand(0,3);
			$take = $all[$n];
			$m = rand(0,strlen($take)-1);
			$c = $take[$m];
			$code .= $c;
		}

		print "<br>".$code;
		// ------------------------------------------
		$invitation->the_key= $code;
		$invitation->add();
		print "<script>window.location='index.php?view=invite';</script>";

	}else{
		// otro usuario ya le ha enviado invitacion a este usuario.
		print "<script>window.location='index.php?view=invite&error=invitationexist';</script>";

	}



}else {
	// ya hay un usuario registrado con ese email
		print "<script>window.location='index.php?view=invite&error=userexist';</script>";
}


}
?>