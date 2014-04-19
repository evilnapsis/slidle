<?php
if(isset($_SESSION["email"]) && isset($_SESSION["secret"])){
	if($_SESSION["email"]!="" && $_SESSION["secret"]!=""){
		print "Procesando usuario $_SESSION[email] ...";

		$us = UserData::getByMail($_SESSION["email"]);
		if(count($us)==0){
			$user = new UserData();
			$user->name = $_POST["name"];
			$user->lastname = $_POST["lastname"];
			$user->email = $_SESSION["email"];
			$user->password = sha1(md5($_POST["password"]));
			$user->add();
			setcookie("action","useradded");
			setcookie("email",$_SESSION["email"]);
			$inv = InvitationData::getByEK($_SESSION["email"],$_SESSION["secret"]);
			$inv->is_used = 1;
			$inv->update();
			unset($_SESSION["email"]);
			unset($_SESSION["secret"]);



			print "<script>window.location='index.php?view=login';</script>";


		}else{
					print "<script>window.location='index.php?error=userexist';</script>";

		}


	}
}else{
	print "<script>window.location='index.php';</script>";
}
?>